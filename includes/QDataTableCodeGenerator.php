<?php
/**
 * Code generator for the DataGrid2 object.
 */

class QDataTableCodeGenerator extends QSimpleTable_CodeGenerator {
	/** @var  string */
	protected $strControlClassName;

	public function __construct($strControlClassName = 'QDataTable') {
		$this->strControlClassName = $strControlClassName;
	}
	
	/**
	 * Generate a constructor for a subclass of itself.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 */
	public function DataListConstructor(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strClassName = $this->GetControlClass();
		$strCode = <<<TMPL
	/**
	 * {$strClassName} constructor. The default sets a default data binder, and sets the grid up
	 * watch the data. Datatables has a pager and built-in search field by default.
	 * Feel free to override the constructor to do things differently. Columns are set up by the
	 * parent control.
	 *
	 * @param QControl|QForm \$objParent
	 * @param null|string \$strControlId
	 */
	public function __construct(\$objParent, \$strControlId = false) {
		parent::__construct(\$objParent, \$strControlId);
		\$this->SetDataBinder('BindData', \$this);
		\$this->UseAjax = true;
		\$this->Watch(QQN::{$objTable->ClassName}());
	}


TMPL;
		return $strCode;
	}




	protected function DataListParentMakeEditable(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL

	protected function {$strVarName}_MakeEditable() {
		\$this->{$strVarName}->AddAction(new QCellClickEvent(), new QAjaxControlAction(\$this, '{$strVarName}_CellClick', null, null, '\$j(this).parent().data("value")'));
		\$this->{$strVarName}->AddCssClass('hover');
	}

	protected function {$strVarName}_CellClick(\$strFormId, \$strControlId, \$strParameter) {
		if (\$strParameter) {
			\$this->EditItem(\$strParameter);
		}
	}

TMPL;

		return $strCode;
	}


	/**
	 * Generates a data binder that can be called from the parent control, or called directly by this control.
	 *
	 * The difference here is that it always loads up total item count, since it has a built-in paginator.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 * @return string
	 */
	protected function DataListDataBinder(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strObjectType = $objTable->ClassName;
		$strCode = <<<TMPL
   /**
	* Called by the framework to access the data for the control and load it into the table. By default, this function will be
	* the data binder for the control, with no additional conditions or clauses. To change what data is displayed in the list,
	* you have many options:
	* - Override this method in the Connector.
	* - Set ->Condition and ->Clauses properties for semi-permanent conditions and clauses
	* - Override the GetCondition and GetClauses methods in the Connector.
	* - For situations where the data might change every time you draw, like if the data is filtered by other controls,
	*   you should call SetDataBinder after the parent creates this control, and in your custom data binder, call this function,
	*   passing in the conditions and clauses you want this data binder to use.
	*
	*	This binder will automatically add the orderby and limit clauses from the paginator, if present.
	**/
	public function BindData(\$objAdditionalCondition = null, \$objAdditionalClauses = null) {
		\$objCondition = \$this->GetCondition(\$objAdditionalCondition);
		\$objClauses = \$this->GetClauses(\$objAdditionalClauses);

		\$this->TotalItemCount = {$strObjectType}::QueryCount(\$objCondition, \$objClauses);

		// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
		// the OrderByClause to the \$objClauses array
		if (\$objClause = \$this->OrderByClause) {
			\$objClauses[] = \$objClause;
		}

		// Add the LimitClause information, as well
		if (\$objClause = \$this->LimitClause) {
			\$objClauses[] = \$objClause;
		}

		\$this->DataSource = {$strObjectType}::QueryArray(\$objCondition, \$objClauses);
	}


TMPL;

		$strCode .= $this->DataListGetCondition($objCodeGen, $objTable);
		$strCode .= $this->DataListGetClauses($objCodeGen, $objTable);

		return $strCode;
	}



/**
 * @param QCodeGenBase $objCodeGen
 * @param QTable $objTable
 * @return string
 */
protected function DataListGetCondition(QCodeGenBase $objCodeGen, QTable $objTable)
{
	/**
	 * The following creates a search filter based on the current columns.
	 *
	 * TODO: Do this for individual columns
	 */

	$cond = array();
	foreach ($objTable->ColumnArray as $objColumn) {
		switch ($objColumn->VariableTypeAsConstant) {
			case 'QType::Integer':
				$cond[] = 'QQ::Equal(QQN::' . $objTable->ClassName . '()->' . $objColumn->PropertyName . ', $strSearchValue)';
				break;
			case 'QType::String':
				$cond[] = 'QQ::Like(QQN::' . $objTable->ClassName . '()->' . $objColumn->PropertyName. ', "%" . $strSearchValue . "%")';
				break;
		}
	}

	$strCondition = implode (",\n                    ", $cond);
	if ($strCondition) {
		$strCondition = "QQ::OrCondition(
				    $strCondition
			    )";
	}


	$strCode = <<<TMPL
	/**
	 * Returns the condition to use when querying the data. Default is to return the condition put in the local
	 * objCondition member variable. You can also override this to return a condition. 
	 *
	 * @return QQCondition
	 */
	protected function GetCondition(\$objAdditionalCondition = null) {
		// Get passed in condition, possibly coming from subclass or enclosing control or form
		\$objCondition = \$objAdditionalCondition;
		if (!\$objCondition) {
			\$objCondition = QQ::All();
		}
		// Get condition more permanently bound
		if (\$this->objCondition) {
			\$objCondition = QQ::AndCondition(\$objCondition, \$this->objCondition);
		}
		
TMPL;

	if ($strCondition) {
		$strCode .= <<<TMPL

		// Get condition from datatable search
		if (\$objDataTableCondition = \$this->GetDataTableCondition()) {
			\$objCondition = QQ::AndCondition(\$objDataTableCondition, \$objCondition);
		}
		
TMPL;
	}

	$strCode .= <<<TMPL
	
		return \$objCondition;
	}

TMPL;

	if ($strCondition) {
		$strCode .= <<<TMPL


	/**
	 *  Get the condition for the data binder. This version currently just handles the main search field, and not per-column filters.
	 *
	 *  @return QQCondition;
	 **/
	protected function GetDataTableCondition() {
		if (isset(\$this->mixSearch['search']) && \$this->mixSearch['search'] !== '') {
			\$strSearchValue = \$this->mixSearch['search'];
			\$strSearchValue = trim(\$strSearchValue);
			
			return (
				$strCondition
			);
		} else {
			return null;
		}
	}
	
TMPL;

	}
	return $strCode;
}




/**
	 * Indicate that by default, the data list does its own filtering. This can be changed in the modelconnector editor if needed.
	 *
	 * @return bool
	 */
	public function DataListHasFilter() {
		return true;
	}

}