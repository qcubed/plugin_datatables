<?php
/**
 * QDataTableBase.class.php
 * See QDataTable.class.php for general usage documentation.
 *
 */

	class QDataTable_SourceEvent extends QEvent {
		const EventName = 'QDataTable_SourceEvent';
	}
		
	/**
	 * @property-read string $Filter
	 * @property-read QQLimitInfo $LimitInfo
	 * @property-read QQClause[] $Clauses
	 * @property int $FilteredItemCount
	 * @property int $TotalItemCount
	 * @property array $FixedColumns Array of options for fixed column plugin. FixedColumns gives you
	 *  a way to do something very similar to Freeze Panes in Excel. If you are only freezing the 
	 *  headers, datatables recommends using the FixedHeaders plugin instead.
	 * 	Can contain the following key/value pairs:
	 * 		iLeftColumns=>number of left side columns to fix (1 is default)
	 * 		iRightColumns=>number of right side columns to fix (0 is default)
	 * 		sLeftWidth=>"fixed"|"relative" the algorithm used to compute width of left column
	 * 		iLeftWidth=>number representing width of left column. If "fixed", this is a pixel value.
	 * 			if "relative", this is a percent
	 * 		sRightWidth=>"fixed"|"relative" the algorithm used to compute width of right column
	 * 		iRightWidth=>number representing width of right column. If "fixed", this is a pixel value.
	 * 			if "relative", this is a percent
	 * $property boolean $UseMData used in conjuction with ajax rendering and column ids or names, this
	 *   will cause the mData mechanism to be used to tie particular columns to the data for the column.
	 *   This is particularly required when using the ColReorder plugin, because the user may reorder the columns
	 *   and the order of the data will no longer match the order of the columns. MData also lets you pass back
	 *   additional data that will not be displayed, but that can be used in other ways, like styling or scripts
	 */
	class QDataTableBase extends QDataTableGen {
		protected $objLimitInfo;
		protected $objOrderByClause;
		protected $intDrawCount = null;
		protected $intTotalItemCount = 0;
		protected $intFilteredItemCount = 0;
		protected $aFixedColumns = null;
		protected $blnUseMData = false;

		public function  __construct($objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);

			$this->JQueryUI = true;
			$this->UseWrapper = true;	// required since additional dom elements may be inserted above the table
			
			// default to use ajax
			$this->UseAjax = false;
		}

		protected function GetWrapperStyleAttributes($blnIsBlockElement=false) {
			$strStyle = parent::GetWrapperStyleAttributes($blnIsBlockElement);
			$strStyle .= 'visibility:hidden;';
			return $strStyle;
		}


		public function SetupAjaxBinding() {
			$this->blnUseAjax = true;
			$this->ServerSide = true;
			$this->blnModified = true;

			
			$strBody = '';
			$strJsReturnParam = 'oData'; // put all of data and settings into the action parameter
			
			$objAction = new QAjaxControlAction($this, '_GetAjaxData', 'default', null, $strJsReturnParam);
			
			// use the ajax action to generate an ajax script for us, but 
			// since this is an option of the control, we can't actually 'bind' it, so we instead use an
			// empty action to tie the action to the data binder method name
			$objEvent = new QAutocomplete_SourceEvent();
			$objAction->Event = $objEvent;
			$strBody = "\n" .
				sprintf('$j("#%s").data("dtResponse",callback);', $this->getJqControlId())
				. "\n";	// fnCallback is a javascript closure, and we have to save it to use it later.
						//$strBody = 'var aNewData; aoData.each(function(a){aNewData[a["name"]] = a["value"]}); ' . "\n"; // fix quirky format of aoData
			$strBody .= $objAction->RenderScript($this);
			$this->Ajax = new QJsClosure($strBody, array('oData', 'callback', 'oSettings'));
					
			$this->RemoveAllActions(QAutocomplete_SourceEvent::EventName);
			$objAction = new QNoScriptAjaxAction($objAction);
			parent::AddAction($objEvent, $objAction);
		}


		/**
		 * Respond to a data request and return the data object
		 * Will include row id and row class if those are provided.
		 * @param string $strFormId
		 * @param string $strControlId
		 * @param string $strParameter
		 */
		public function _GetAjaxData($strFormId, $strControlId, $strParameter) {
			$this->objOrderByClause = null;
			$this->intDrawCount = null;


			$data = $strParameter;

			// Set limit info for partial data requests
			if (isset ($data['start']) &&
					isset ($data['length']) &&
					$data['length'] != '-1') {
				$this->intDisplayStart = QType::Cast($data['start'], QType::Integer);
				$this->intPageLength = QType::Cast($data['length'], QType::Integer);
				$this->objLimitInfo = QQ::LimitInfo($this->intPageLength, $this->intDisplayStart);
			}
			if (isset($data['order'])) {
				$sortCols = $data['order'];
				$intSortColsCount = count($sortCols);
				// We only support ordering by one column at this point
				//for ($i = 0; $i < $intSortColsCount; $i++) {
					$i = 0;
					$intSortColIdx = QType::Cast($sortCols[$i]['column'], QType::Integer);
					$objColumn = $this->GetColumn($intSortColIdx);
					$strSortDir = QType::Cast($sortCols[$i]['dir'], QType::String);
					if (strtolower($strSortDir) == 'desc') {
						if ($objColumn->ReverseOrderByClause) {
							$this->objOrderByClause = $objColumn->ReverseOrderByClause;
						}
					} else {
						if ($objColumn->OrderByClause) {
							$this->objOrderByClause = $objColumn->OrderByClause;
						}
					}

					// Save so that if table is redrawn, order will be preserved.
					$this->arrOrder = [];
					$this->arrOrder[] = [$intSortColIdx, $strSortDir];
				//}
			}
			if (isset($data['search']['value'])) {
				// TODO: Support RegEx searching. Will require implementing regex in database adapters. Will take work.
				if (!is_array($this->mixSearch)) {
					$this->mixSearch = [];
				}
				$this->mixSearch['search'] = QType::Cast($data['search']['value'], QType::String);
			}

			// If column level searching is enabled, save off values
			$this->arrSearchCols = null;
			if (!empty($data['columns'])) {
				$this->arrSearchCols = [];
				foreach ($data['columns'] as $key=>$values) {
					if (!empty($values['searchable'])) {
						$this->arrSearchCols[$key]['search'] = $values['search']['value'];
						// TODO: Deal with the regex flag
					} else {
						$this->arrSearchCols[$key]['search'] = null;
					}
				}
			}

			if (isset($data['draw'])) {
				$this->intDrawCount = QType::Cast($data['draw'], QType::Integer);
			}
		
			// Get the data and send it back to the control
			if (!is_null($this->intDrawCount)) {		// Required drawing count, aids in helping control keep track of ajax responses
				$this->DataBind();
				$mixDataArray = array();
				if ($this->objDataSource) {
					$rowIndex = 0;
					if (isset($intOffset)) {
						$rowIndex = $intOffset;
					}
					foreach ($this->objDataSource as $objObject) {
						$row = $this->AjaxGetRowData ($objObject, $rowIndex);
						$rowIndex++;
						$mixDataArray[] = $row;
					}
				}
				$filteredCount = $this->mixSearch ? $this->FilteredItemCount : $this->TotalItemCount;
				if (!$filteredCount || $filteredCount < count($mixDataArray)) {
					$filteredCount = count($mixDataArray);
				}
				$output = array(
					"draw" => $this->intDrawCount,
					"recordsTotal" => $this->TotalItemCount,
					"recordsFiltered" => $filteredCount,
					"data" => $mixDataArray
				);
				
				$output = JavaScriptHelper::toJsObject($output);
				$strJS = sprintf('$j("#%s").data("dtResponse")(%s);', $this->ControlId, $output);
				QApplication::ExecuteJavaScript($strJS,QJsPriority::Exclusive);
				$this->objDataSource = null;
				$this->intDrawCount = null;
			}
		}

		public function DataBind() {
			if ($this->blnUseAjax && !$this->intDrawCount) {
				return;	// only draw when asked to draw by the datatable
			}
			parent::DataBind();
		}
		
		public function GetControlJavaScript() {
			$strJS = parent::GetControlJavaScript();

            $strJS .= $this->RenderPlugins();

			$strJS .= sprintf('jQuery("#%s_wrapper").css("visibility","visible"); ',
				$this->getJqControlId());	// show the table, to prevent data flashing

			return $strJS;
		}

        /**
         * Render plugin javascript
         * @return string
         */
        public function RenderPlugins() {
            $strJS = '';

            if (!empty ($this->aFixedColumns)) {
                $this->AddPluginJavascriptFile("datatables", __PLUGIN_ASSETS__ . "/datatables/extras/FixedColumns/js/dataTables.fixedColumns.js");
                $strJS .= sprintf("{var oTable = jQuery('#%s').%s();\n", $this->getJqControlId(), $this->getJqSetupFunction());
                $strJS .= 'new $j.fn.DataTable.FixedColumns( oTable, ' . JavaScriptHelper::toJsObject($this->aFixedColumns) . '); };';
            }
            return $strJS;
        }

		/**
		 * Return an array containing the data for a row. The default matches the default datatables, but there
		 * is a lot of customization you can do.
		 * @return array
		 */
		public function AjaxGetRowData($objObject, $rowIndex) {
			$row = array();
			foreach ($this->objColumnArray as $objColumn) {
				$data = $objColumn->FetchCellValue($objObject);
				if ($this->blnUseMData) {
					$strId = $this->GetColumnIdentifier($objColumn);
					$row[$strId] = $data;
				} else {
					$row[] = $data;
				}
			}

			// Datatables only supports certain attributes in the row tag. Pull those out and build them into the data if available.
			$params = $this->GetRowParams($objObject, $rowIndex);
			if ($params) {
				foreach ($params as $key=>$value) {
					if ($key == 'class') {
						$row['DT_RowClass'] = $value;
					}
					if ($key == 'id') {
						$row['DT_RowId'] = $strId;
					}
					if (strpos($key, 'data-') === 0) {
						$dataParams[substr($key, 5)] = $value;
					}
				}

				if (!empty($dataParams)) {
					$row['DT_RowData'] = $dataParams;
				}
			}

			return $row;
		}
		
		
		/**
		 * Return the identifier that should be used to id this column in the mData, aaData, etc.
		 * If the column is using Id's, then it will use the id of the column. Otherwise, it will
		 * use a name. Its up to you to make sure each column returns a unique identifier.
		 * @param QAbstractSimpleTableDataColumn $objColumn
		 */
		protected function GetColumnIdentifier(QAbstractSimpleTableDataColumn $objColumn) {
			$strId = $objColumn->Id;
			if (empty($strId) || $strId < 0 ) { // negative numeric ids won't work
				$strId = $objColumn->Name;
			}
			return $strId;
		}

		/**
		 * Sets up the aoColumns object to match the columns. Not used by default. Call after you initialize,
		 * but before you draw. You can use this to setup some very elaborate data access mechanisms and column styling.
		 *
		 * TODO: This is for the old version of Datatables. Need to port the implementation to the new version.
		 *
		 * @deprecated
		 * @link http://datatables.net/usage/columns
		 * @link http://datatables.net/blog/Extended_data_source_options_with_DataTables
		 */
		protected function SetupColumnDescriptions() {
			if (empty($this->objColumnArray)) {
				throw new Exception("Add columns before setting up the column descriptions");
			}
			$colParamArray = array();
			foreach ($this->objColumnArray as $objColumn) {
				$rowArray = $this->GetColumnDescriptorArray($objColumn);
				$colParamArray[] = $rowArray;
			}
			$this->Columns = $colParamArray;
		}
		
		/**
		 * Return a key/value array of parameters that specify the behavior of this column. See
		 * the link for more info. Override to add options to the column descriptor.
		 * 
		 * @link http://datatables.net/usage/columns
		 * @param QAbstractSimpleTableDataColumn $objColumn
		 */
		protected function GetColumnDescriptorArray (QAbstractSimpleTableDataColumn $objColumn) {
			$rowArray = null; // signifies do the default thing for this column
			$strId = $this->GetColumnIdentifier($objColumn);
			if ($this->blnUseMData) {
				$rowArray['mData'] = $strId;
			}
			return $rowArray;
		}

		/**
		 * Use built-in datatables refresher to avoid screen flash.
		 */

		public function Refresh() {
			if ($this->blnUseAjax) {
				// Trigger a refresh using the datatables refresh method
				$this->Draw();
			}
			else {
				parent::Refresh();
			}
		}

		/**
		 * @param bool $blnDisplayOutput
		 * @return array[]
		 */
		public function RenderAjax($blnDisplayOutput = true) {
			// Only render if this control has been modified at all
			if ($this->blnUseAjax) {

				if ($this->IsModified()) {

					// Render if (1) object has no parent or (2) parent was not rendered nor currently being rendered
					if ((!$this->objParentControl) || ((!$this->objParentControl->Rendered) && (!$this->objParentControl->Rendering))) {
						$this->Refresh();	// Tells datatables to call back to us to get raw row data. See above.
						$this->blnModified = false;
						if ($this->objWatcher) {
							$this->objWatcher->MakeCurrent();
						}
					}
				}
				return [];	// don't render in the usual way
			}
			return parent::RenderAjax($blnDisplayOutput); // rendering by ajax, but the control itself is not using ajax only. In other words, ajax wants a complete redraw.
		}

		/**
		 * @param string $strClass
		 * @return QDataTable_CodeGenerator
		 */
		public static function GetCodeGenerator($strClass = 'QDataTable') {
			return new QDataTableCodeGenerator($strClass);
		}

		/**
		 * Returns the current state of the control to be able to restore it later.
		 * @return mixed
		 */
		public function GetState() {
			$state = array();
			if ($this->mixSearch !== null) {
				$state["search"] = $this->mixSearch;
			}
			if ($this->arrSearchCols !== null) {
				$state["searchCols"] = $this->arrSearchCols;
			}
			if ($this->arrOrder !== null) {
				$state["order"] = $this->arrOrder;
			}
			if ($this->intDisplayStart !== null) {
				$state["displayStart"] = $this->intDisplayStart;
			}
			if ($this->intPageLength !== null) {
				$state["pageLength"] = $this->intPageLength;
			}

			return $state;
		}

		/**
		 * Restore the state of the control.
		 * @param mixed $state Previously saved state as returned by GetState above.
		 */
		public function PutState($state) {
			// use the name as the column key because columns might be added or removed for some reason
			if (isset ($state["search"])) {
				$this->mixSearch = $state["search"];
			}
			if (isset ($state["searchCols"])) {
				$this->arrSearchCols = $state["searchCols"];
			}
			if (isset ($state["order"])) {
				$this->arrOrder = $state["order"];
			}
			if (isset ($state["displayStart"])) {
				$this->intDisplayStart = $state["displayStart"];
			}
			if (isset ($state["pageLength"])) {
				$this->intPageLength = $state["pageLength"];
			}
		}

		public function __get($strName) {
			switch ($strName) {
				case "LimitClause": return $this->objLimitInfo;
				case "OrderByClause": return $this->objOrderByClause;
				case "FilteredItemCount": return $this->intTotalItemCount;
				case "TotalItemCount": return $this->intTotalItemCount;
				case "FixedColumns": return $this->aFixedColumns;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		public function __set($strName, $mixValue) {
			switch ($strName) {
				case "TotalItemCount":
					try {
						$this->intTotalItemCount = QType::Cast($mixValue, QType::Integer);
						if ($this->intTotalItemCount < 0)
							$this->intTotalItemCount = 0;
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "FilteredItemCount":
					try {
						$this->intFilteredItemCount = QType::Cast($mixValue, QType::Integer);
						if ($this->intFilteredItemCount < 0)
							$this->intFilteredItemCount = 0;
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				case 'FixedColumns':
					$this->aFixedColumns = $mixValue;
					break;
					
				case 'DataSource':
					return ($this->objDataSource = $mixValue);
					
				case 'UseAjax':
					try {
						$this->blnUseAjax = QType::Cast ($mixValue, QType::Boolean);
						if ($this->blnUseAjax) {	
							$this->SetupAjaxBinding();
						}
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					// TODO: turn off ajax binding if false
					break;
					
				case 'UseMData':
					try {
						$this->blnUseMData = QType::Cast ($mixValue, QType::Boolean);
						if ($this->blnUseMData) {	
							$this->SetupColumnDescriptions();
						}
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
					

				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				}
		}

	}

?>
