<?php	

	/* Custom "property" event classes for this control */

	/**
	 * Generated QDataTableGen class.
	 * 
	 * This is the QDataTableGen class which is automatically generated
	 * by scraping the JQuery UI documentation website. As such, it includes all the options
	 * as listed by the JQuery UI website, which may or may not be appropriate for QCubed. See
	 * the QDataTableBase class for any glue code to make this class more
	 * usable in QCubed.
	 * 
	 * @see QDataTableBase
	 * @package Controls\Base
	 * @property boolean $AutoWidth
	 * Enable or disable automatic column width calculation. This can be
	 * disabled as an optimisation (it takes a finite amount of time to
	 * calculate the widths) if the tables widths are passed in using
	 * columns.widthDT.
	 *
	 * @property boolean $DeferRender
	 * By default, when DataTables loads data from an Ajax or Javascript data
	 * source (ajaxDT and dataDT respectively) it will create all HTML
	 * elements needed up-front. When working with large data sets, this
	 * operation can take a not-insignificant amount of time, particularly in
	 * older browsers such as IE6-8. This option allows DataTables to create
	 * the nodes (rows and cells in the table body) only when they are needed
	 * for a draw.
	 *
	 * @property boolean $Info
	 * When this option is enabled, Datatables will show information about
	 * the table including information about filtered data if that action is
	 * being performed. This option allows that feature to be enabled or
	 * disabled.
	 *
	 * @property boolean $JQueryUI
	 * DataTables can be styled by a number of CSS library packages, included
	 * jQuery UI, Twitter Bootstrap and Foundation. Although Bootstrap,
	 * Foundation and other libraries require a plug-in, jQuery UI
	 * ThemeRoller support is built into DataTables and can be enabled simply
	 * with this parameter. When enabled, DataTables will use markup and
	 * classes created for jQuery UI ThemeRoller, making it very easy to
	 * integrate your tables with jQuery UI.
	 *
	 * @property boolean $LengthChange
	 * When pagination is enabled, this option will control the display an
	 * option for the end user to change number of records to be shown per
	 * page. The options shown in the list are controlled by the lengthMenuDT
	 * configuration option.
	 *
	 * @property boolean $Ordering
	 * Enable or disable ordering of columns - it is as simple as that!
	 * DataTables, by default, allows end users to click on the header cell
	 * for each column, ordering the table by the data in that column. The
	 * ability to order data can be disabled using this option.
	 *
	 * @property boolean $Paging
	 * DataTables can split the rows in tables into individual pages, which
	 * is an efficient method of showing a large number of records in a small
	 * space. The end user is provided with controls to request the display
	 * of different data as the navigate through the data. This feature is
	 * enabled by default, but if you wish to disable it, you may do so with
	 * this parameter.
	 *
	 * @property boolean $Processing
	 * Enable or disable the display of a 'processing' indicator when the
	 * table is being processed (e.g. a sort). This is particularly useful
	 * for tables with large amounts of data where it can take a noticeable
	 * amount of time to sort the entries.
	 *
	 * @property boolean $ScrollX
	 * Enable horizontal scrolling. When a table is too wide to fit into a
	 * certain layout, or you have a large number of columns in the table,
	 * you can enable horizontal (x) scrolling to show the table in a
	 * viewport, which can be scrolled.
	 *
	 * @property string $ScrollY
	 * Enable vertical scrolling. Vertical scrolling will constrain the
	 * DataTable to the given height, and enable scrolling for any data which
	 * overflows the current viewport. This can be used as an alternative to
	 * paging to display a lot of data in a small area (although paging and
	 * scrolling can both be enabled at the same time if desired).
	 *
	 * @property boolean $Searching
	 * This option allows the search abilities of DataTables to be enabled or
	 * disabled. Searching in DataTables is "smart" in that it allows the end
	 * user to input multiple words (space separated) and will match a row
	 * containing those words, even if not in the order that was specified
	 * (this allow matching across multiple columns).
	 *
	 * @property boolean $ServerSide
	 * DataTables has two fundamental modes of operation:
	 *
	 * @property boolean $StateSave
	 * Enable or disable state saving. When enabled aDataTables will storage
	 * state information such as pagination position, display length,
	 * filtering and sorting. When the end user reloads the page the table's
	 * state will be altered to match what they had previously set up.
	 *
	 * @property mixed $Ajax
	 * DataTables can obtain the data that it is to display in the table body
	 * from a number of sources, including from an Ajax data source, using
	 * this initialisation parameter. As with other dynamic data sources,
	 * arrays or objects can be used for the data source for each row, with
	 * columns.dataDT employed to read from specific object properties.
	 *
	 * @property array $Data
	 * DataTables can obtain the data it is to display in the table's body
	 * from a number of sources, including being passed in as an array of row
	 * data using this initialisation parameter. As with other dynamic data
	 * sources, arrays or objects can be used for the data source for each
	 * row, with columns.dataDT employed to read from specific object
	 * properties.
	 *
	 * @property QJsClosure $CreatedRow
	 * This callback is executed when a TR element is created (and all TD
	 * child elements have been inserted), or registered if using a DOM
	 * source, allowing manipulation of the TR element.
	 *
	 * @property QJsClosure $DrawCallback
	 * It can be useful to take an action on every draw event of the table -
	 * for example you might want to update an external control with the
	 * newly displayed data, or with server-side processing is enabled you
	 * might want to assign events to the newly created elements. This
	 * callback is designed for exactly that purpose and will execute on
	 * every draw.
	 *
	 * @property QJsClosure $FooterCallback
	 * Identical to headerCallbackDT but for the table footer this function
	 * allows you to modify the table footer on every 'draw' event.
	 *
	 * @property QJsClosure $FormatNumber
	 * DataTables will display numbers in a few different locations when
	 * drawing information about a table, for example in the table's
	 * information element and the pagination controls. When working with
	 * large numbers it is often useful to format it for readability by
	 * separating the thousand units - for example 1 million is rendered as
	 * "1,000,000", allowing the user to see at a glance what order of
	 * magnitude the number shows.
	 *
	 * @property QJsClosure $HeaderCallback
	 * This function is called on every 'draw' event (i.e. when a filter,
	 * sort or page event is initiated by the end user or the API), and
	 * allows you to dynamically modify the header row. This can be used to
	 * calculate and display useful information about the table.
	 *
	 * @property QJsClosure $InfoCallback
	 * The information element can be used to convey information about the
	 * current state of the table. Although the internationalisation options
	 * presented by DataTables are quite capable of dealing with most
	 * customisations, there may be times where you wish to customise the
	 * string further. This callback allows you to do exactly that.
	 *
	 * @property QJsClosure $InitComplete
	 * It can often be useful to know when your table has fully been
	 * initialised, data loaded and drawn, particularly when using an ajaxDT
	 * data source. In such a case, the table will complete its initial run
	 * before the data has been loaded (Ajax is asynchronous after all!) so
	 * this callback is provided to let you know when the data is fully
	 * loaded.
	 *
	 * @property QJsClosure $PreDrawCallback
	 * The partner of the drawCallbackDT callback, this function is called at
	 * the very start of each table draw. It can therefore be used to update
	 * or clean the display before each draw (for example removing events),
	 * and additionally can be used to cancel the draw by returning false.
	 * Any other return (including undefined) results in the full draw
	 * occurring.
	 *
	 * @property QJsClosure $RowCallback
	 * This callback allows you to 'post process' each row after it have been
	 * generated for each table draw, but before it is rendered into the
	 * document. This means that the contents of the row might not have
	 * dimensions ($().width() for example) if it is not already in the
	 * document.
	 *
	 * @property QJsClosure $StateLoadCallback
	 * With this callback you can define where, and how, the state of a table
	 * is loaded from. By default DataTables will load from localStorage but
	 * you might wish to use a server-side database or cookies as your
	 * implementation requirements demand. For the format of the data that is
	 * stored, please refer to the stateSaveCallbackDT documentation.
	 *
	 * @property QJsClosure $StateLoaded
	 * Callback that is fired once the state has been loaded
	 * (stateLoadCallbackDT) and the saved data manipulated (if required -
	 * stateLoadParamsDT).
	 *
	 * @property QJsClosure $StateLoadParams
	 * Callback which allows modification of the saved state prior to loading
	 * that state. This callback is called when the table is loading state
	 * from the stored data, but prior to the settings object being modified
	 * by the saved state.
	 *
	 * @property QJsClosure $StateSaveCallback
	 * DataTables can save the state of the table (paging, filtering etc)
	 * when the stateSaveDT option is enabled, and by default it will use
	 * HTML5's localStorage to save the state into. This callback method
	 * allows you to change where the state is saved (for example you might
	 * wish to use a server-side database or cookies).
	 *
	 * @property QJsClosure $StateSaveParams
	 * Callback which allows modification of the parameters to be saved for
	 * the DataTables state saving (stateSaveDT), prior to the data actually
	 * being saved. This callback is called every time DataTables requests
	 * that the state be saved. For the format of the data that is stored,
	 * please refer to the stateSaveCallbackDT documentation.
	 *
	 * @property mixed $DeferLoading
	 * When using server-side processing, the default mode of operation for
	 * DataTables is to simply throw away any data that currently exists in
	 * the table and make a request to the server to get the first page of
	 * data to display. This is fine for an empty table, but if you already
	 * have the first page of data displayed in the plain HTML, it is a waste
	 * of resources. As such, this option exists to allow you to instruct
	 * DataTables to not make that initial request, rather it will use the
	 * data already on the page (no sorting etc will be applied to it).
	 *
	 * @property boolean $Destroy
	 * Initialise a new DataTable as usual, but if there is an existing
	 * DataTable which matches the selector, it will be destroyed and
	 * replaced with the new table. This can be useful if you want to change
	 * a property of the table which cannot be altered through the API.
	 *
	 * @property integer $DisplayStart
	 * Define the starting point for data display when using DataTables with
	 * pagination (paginateDT).
	 *
	 * @property string $Dom
	 * DataTables will add a number of elements around the table to both
	 * control the table and show additional information about it. The
	 * position of these elements on screen are controlled by a combination
	 * of their order in the document (DOM) and the CSS applied to the
	 * elements. This parameter is used to control their ordering and
	 * additional mark-up surrounding them in the DOM.
	 *
	 * @property array $LengthMenu
	 * This parameter allows you to readily specify the entries in the length
	 * drop down select list that DataTables shows when pagination is
	 * enabled. It can be either:
	 *
	 * @property array $Order
	 * If ordering is enabled (orderingDT), then DataTables will perform a
	 * first pass order during initialisation. Using this parameter you can
	 * define which column(s) the order is performed upon, and the ordering
	 * direction. The orderDT must be an array of arrays, each inner array
	 * comprised of two elements:
	 *
	 * @property boolean $OrderCellsTop
	 * Allows control over whether DataTables should use the top (true)
	 * unique cell that is found for a single column, or the bottom (false -
	 * default) to attach the default order listener. This is useful when
	 * using complex headers.
	 *
	 * @property boolean $OrderClasses
	 * DataTables highlight the columns which are used to order the content
	 * in the table's body by adding a class to the cells in that column,
	 * which in turn has CSS applied to those classes to highlight those
	 * cells.
	 *
	 * @property mixed $OrderFixed
	 * The option works in tandem with the orderDT option which provides an
	 * initial ordering state for the table which can then be modified by the
	 * user clicking on column headings, while the ordering specified by this
	 * option will always be applied to the table, regardless of user
	 * interaction.
	 *
	 * @property boolean $OrderMulti
	 * When ordering is enabled (orderingDT), by default DataTables allows
	 * users to sort multiple columns by shift clicking upon the header cell
	 * for each column. Although this can be quite useful for users, it can
	 * also increase the complexity of the order, potentiality increasing the
	 * processing time of ordering the data. Therefore, this option is
	 * provided to allow this shift-click multiple column ability.
	 *
	 * @property integer $PageLength
	 * Number of rows to display on a single page when using pagination.
	 *
	 * @property string $PagingType
	 * The pagination option of DataTables will display a pagination control
	 * below the table (by default, its position can be changed using domDT
	 * and CSS) with buttons that the end user can use to navigate the pages
	 * of the table. Which buttons are shown in the pagination control are
	 * defined by the option given here.
	 *
	 * @property mixed $Renderer
	 * DataTables adds some complex components to your HTML page, such as the
	 * pagination control. The business logic used to calculate information
	 * should be displayed (what buttons in the case of the pagination
	 * buttons) is core to DataTables and generally doesn't vary how the
	 * buttons are actually displayed does based on the styling requirements
	 * of the page. For example the pagination buttons might be displayed as
	 * li elements in a ul list, or simply as a collection of a buttons.
	 *
	 * @property boolean $Retrieve
	 * Retrieve the DataTables object for the given selector. Note that if
	 * the table has already been initialised, this parameter will cause
	 * DataTables to simply return the object that has already been set up -
	 * it will not take account of any changes you might have made to the
	 * initialisation object passed to DataTables (setting this parameter to
	 * true is an acknowledgement that you understand this!).
	 *
	 * @property boolean $ScrollCollapse
	 * When vertical (y) scrolling is enabled through the use of the
	 * scrollYDT option, DataTables will force the height of the table's
	 * viewport to the given height at all times (useful for layout).
	 * However, this can look odd when filtering data down to a small data
	 * set, and the footer is left "floating" further down. This parameter
	 * (when enabled) will cause DataTables to collapse the table's viewport
	 * down when the result set will fit within the given Y height.
	 *
	 * @property mixed $Search
	 * The searchDT option allows the way DataTables performs filtering to be
	 * set during the initialisation, and to set an initial global filter.
	 *
	 * @property array $SearchCols
	 * Basically the same as the searchDT option, but in this case for
	 * individual columns, rather than the global filter, this option defined
	 * the filtering to apply to the table during initialisation.
	 *
	 * @property integer $SearchDelay
	 * The built in DataTables global search (by default at the top right of
	 * every DataTable)will instantly search the table on every keypress when
	 * in client-side processing mode and reduce the search call frequency
	 * automatically to 400mS when in server-side processing mode. This call
	 * frequency (throttling) can be controlled using the searchDelayDT
	 * parameter for both client-side and server-side processing.
	 *
	 * @property integer $StateDuration
	 * Duration for which the saved state information is considered valid.
	 * After this period has elapsed the state will be returned to the
	 * default.
	 *
	 * @property array $StripeClasses
	 * An array of CSS classes that should be applied to displayed rows, in
	 * sequence. This array may be of any length, and DataTables will apply
	 * each class sequentially, looping when required.
	 *
	 * @property integer $TabIndex
	 * By default DataTables allows keyboard navigation of the table
	 * (sorting, paging, and filtering) by adding a tabindex attribute to the
	 * required elements. This allows the end user to tab through the
	 * controls and press the enter key to activate them, allowing the table
	 * controls to be accessible without a mouse.
	 *
	 * @property array $ColumnDefs
	 * Very similar to columnsDT, this parameter allows you to assign
	 * specific options to columns in the table, although in this case the
	 * column options defined can be applied to one or more columns.
	 * Additionally, not every column need be specified, unlike columnsDT.
	 *
	 * @property array $Columns
	 * The columnsDT option in the initialisation parameter allows you to
	 * define details about the way individual columns behave. For a full
	 * list of column options that can be set, please see the related
	 * parameters below.
	 *
	 * @property mixed $Language
	 * All strings that DataTables uses in its user interface are defined in
	 * this object, allowing you to modified them individually or completely
	 * replace them all as required. This ensures that DataTables is fully
	 * internationalisable as strings for any language can be used.
	 *
	 */

	class QDataTableGen extends QHtmlTable	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var boolean */
		protected $blnAutoWidth = null;
		/** @var boolean */
		protected $blnDeferRender = null;
		/** @var boolean */
		protected $blnInfo = null;
		/** @var boolean */
		protected $blnJQueryUI = null;
		/** @var boolean */
		protected $blnLengthChange = null;
		/** @var boolean */
		protected $blnOrdering;
		/** @var boolean */
		protected $blnPaging;
		/** @var boolean */
		protected $blnProcessing;
		/** @var boolean */
		protected $blnScrollX = null;
		/** @var string */
		protected $strScrollY;
		/** @var boolean */
		protected $blnSearching = null;
		/** @var boolean */
		protected $blnServerSide;
		/** @var boolean */
		protected $blnStateSave = null;
		/** @var mixed */
		protected $mixAjax;
		/** @var array */
		protected $arrData;
		/** @var QJsClosure */
		protected $mixCreatedRow;
		/** @var QJsClosure */
		protected $mixDrawCallback;
		/** @var QJsClosure */
		protected $mixFooterCallback;
		/** @var QJsClosure */
		protected $mixFormatNumber;
		/** @var QJsClosure */
		protected $mixHeaderCallback;
		/** @var QJsClosure */
		protected $mixInfoCallback;
		/** @var QJsClosure */
		protected $mixInitComplete;
		/** @var QJsClosure */
		protected $mixPreDrawCallback;
		/** @var QJsClosure */
		protected $mixRowCallback;
		/** @var QJsClosure */
		protected $mixStateLoadCallback;
		/** @var QJsClosure */
		protected $mixStateLoaded;
		/** @var QJsClosure */
		protected $mixStateLoadParams;
		/** @var QJsClosure */
		protected $mixStateSaveCallback;
		/** @var QJsClosure */
		protected $mixStateSaveParams;
		/** @var mixed */
		protected $mixDeferLoading;
		/** @var boolean */
		protected $blnDestroy = null;
		/** @var integer */
		protected $intDisplayStart;
		/** @var string */
		protected $strDom = null;
		/** @var array */
		protected $arrLengthMenu;
		/** @var array */
		protected $arrOrder = null;
		/** @var boolean */
		protected $blnOrderCellsTop;
		/** @var boolean */
		protected $blnOrderClasses;
		/** @var mixed */
		protected $mixOrderFixed;
		/** @var boolean */
		protected $blnOrderMulti;
		/** @var integer */
		protected $intPageLength = null;
		/** @var string */
		protected $strPagingType = null;
		/** @var mixed */
		protected $mixRenderer;
		/** @var boolean */
		protected $blnRetrieve = null;
		/** @var boolean */
		protected $blnScrollCollapse;
		/** @var mixed */
		protected $mixSearch;
		/** @var array */
		protected $arrSearchCols;
		/** @var integer */
		protected $intSearchDelay = null;
		/** @var integer */
		protected $intStateDuration = null;
		/** @var array */
		protected $arrStripeClasses;
		/** @var integer */
		protected $intTabIndex;
		/** @var array */
		protected $arrColumnDefs;
		/** @var array */
		protected $arrColumns;
		/** @var mixed */
		protected $mixLanguage;

		/**
		 * Builds the option array to be sent to the widget constructor.
		 *
		 * @return array key=>value array of options
		 */
		protected function MakeJqOptions() {
			$jqOptions = null;
			if (!is_null($val = $this->AutoWidth)) {$jqOptions['autoWidth'] = $val;}
			if (!is_null($val = $this->DeferRender)) {$jqOptions['deferRender'] = $val;}
			if (!is_null($val = $this->Info)) {$jqOptions['info'] = $val;}
			if (!is_null($val = $this->JQueryUI)) {$jqOptions['jQueryUI'] = $val;}
			if (!is_null($val = $this->LengthChange)) {$jqOptions['lengthChange'] = $val;}
			if (!is_null($val = $this->Ordering)) {$jqOptions['ordering'] = $val;}
			if (!is_null($val = $this->Paging)) {$jqOptions['paging'] = $val;}
			if (!is_null($val = $this->Processing)) {$jqOptions['processing'] = $val;}
			if (!is_null($val = $this->ScrollX)) {$jqOptions['scrollX'] = $val;}
			if (!is_null($val = $this->ScrollY)) {$jqOptions['scrollY'] = $val;}
			if (!is_null($val = $this->Searching)) {$jqOptions['searching'] = $val;}
			if (!is_null($val = $this->ServerSide)) {$jqOptions['serverSide'] = $val;}
			if (!is_null($val = $this->StateSave)) {$jqOptions['stateSave'] = $val;}
			if (!is_null($val = $this->Ajax)) {$jqOptions['ajax'] = $val;}
			if (!is_null($val = $this->Data)) {$jqOptions['data'] = $val;}
			if (!is_null($val = $this->CreatedRow)) {$jqOptions['createdRow'] = $val;}
			if (!is_null($val = $this->DrawCallback)) {$jqOptions['drawCallback'] = $val;}
			if (!is_null($val = $this->FooterCallback)) {$jqOptions['footerCallback'] = $val;}
			if (!is_null($val = $this->FormatNumber)) {$jqOptions['formatNumber'] = $val;}
			if (!is_null($val = $this->HeaderCallback)) {$jqOptions['headerCallback'] = $val;}
			if (!is_null($val = $this->InfoCallback)) {$jqOptions['infoCallback'] = $val;}
			if (!is_null($val = $this->InitComplete)) {$jqOptions['initComplete'] = $val;}
			if (!is_null($val = $this->PreDrawCallback)) {$jqOptions['preDrawCallback'] = $val;}
			if (!is_null($val = $this->RowCallback)) {$jqOptions['rowCallback'] = $val;}
			if (!is_null($val = $this->StateLoadCallback)) {$jqOptions['stateLoadCallback'] = $val;}
			if (!is_null($val = $this->StateLoaded)) {$jqOptions['stateLoaded'] = $val;}
			if (!is_null($val = $this->StateLoadParams)) {$jqOptions['stateLoadParams'] = $val;}
			if (!is_null($val = $this->StateSaveCallback)) {$jqOptions['stateSaveCallback'] = $val;}
			if (!is_null($val = $this->StateSaveParams)) {$jqOptions['stateSaveParams'] = $val;}
			if (!is_null($val = $this->DeferLoading)) {$jqOptions['deferLoading'] = $val;}
			if (!is_null($val = $this->Destroy)) {$jqOptions['destroy'] = $val;}
			if (!is_null($val = $this->DisplayStart)) {$jqOptions['displayStart'] = $val;}
			if (!is_null($val = $this->Dom)) {$jqOptions['dom'] = $val;}
			if (!is_null($val = $this->LengthMenu)) {$jqOptions['lengthMenu'] = $val;}
			if (!is_null($val = $this->Order)) {$jqOptions['order'] = $val;}
			if (!is_null($val = $this->OrderCellsTop)) {$jqOptions['orderCellsTop'] = $val;}
			if (!is_null($val = $this->OrderClasses)) {$jqOptions['orderClasses'] = $val;}
			if (!is_null($val = $this->OrderFixed)) {$jqOptions['orderFixed'] = $val;}
			if (!is_null($val = $this->OrderMulti)) {$jqOptions['orderMulti'] = $val;}
			if (!is_null($val = $this->PageLength)) {$jqOptions['pageLength'] = $val;}
			if (!is_null($val = $this->PagingType)) {$jqOptions['pagingType'] = $val;}
			if (!is_null($val = $this->Renderer)) {$jqOptions['renderer'] = $val;}
			if (!is_null($val = $this->Retrieve)) {$jqOptions['retrieve'] = $val;}
			if (!is_null($val = $this->ScrollCollapse)) {$jqOptions['scrollCollapse'] = $val;}
			if (!is_null($val = $this->Search)) {$jqOptions['search'] = $val;}
			if (!is_null($val = $this->SearchCols)) {$jqOptions['searchCols'] = $val;}
			if (!is_null($val = $this->SearchDelay)) {$jqOptions['searchDelay'] = $val;}
			if (!is_null($val = $this->StateDuration)) {$jqOptions['stateDuration'] = $val;}
			if (!is_null($val = $this->StripeClasses)) {$jqOptions['stripeClasses'] = $val;}
			if (!is_null($val = $this->TabIndex)) {$jqOptions['tabIndex'] = $val;}
			if (!is_null($val = $this->ColumnDefs)) {$jqOptions['columnDefs'] = $val;}
			if (!is_null($val = $this->Columns)) {$jqOptions['columns'] = $val;}
			if (!is_null($val = $this->Language)) {$jqOptions['language'] = $val;}
			return $jqOptions;
		}

		/**
		 * Return the JavaScript function to call to associate the widget with the control.
		 *
		 * @return string
		 */
		public function GetJqSetupFunction() {
			return 'DataTable';
		}

		/**
		 * Returns the script that attaches the JQueryUI widget to the html object.
		 *
		 * @return string
		 */
		public function GetEndScript() {
			$strId = $this->GetJqControlId();
			$jqOptions = $this->makeJqOptions();
			$strFunc = $this->getJqSetupFunction();

			if ($strId !== $this->ControlId && QApplication::$RequestMode == QRequestMode::Ajax) {
				// If events are not attached to the actual object being drawn, then the old events will not get
				// deleted during redraw. We delete the old events here. This must happen before any other event processing code.
				QApplication::ExecuteControlCommand($strId, 'off', QJsPriority::High);
			}

			// Attach the javascript widget to the html object
			if (empty($jqOptions)) {
				QApplication::ExecuteControlCommand($strId, $strFunc, QJsPriority::High);
			} else {
				QApplication::ExecuteControlCommand($strId, $strFunc, $jqOptions, QJsPriority::High);
			}

			return parent::GetEndScript();
		}

		/**
		 * Simply remove all rows of data from the table.
		 */
		public function Clear() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().clear", QJsPriority::Low);
		}
		/**
		 * Retrieve the data for the whole table, in row index order.
		 */
		public function Data() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().data", QJsPriority::Low);
		}
		/**
		 * Restore the tables in the current context to its original state in the
		 * DOM by removing all of DataTables enhancements, alterations to the DOM
		 * structure of the table and event listeners.
		 * @param $remove
		 */
		public function Destroy($remove = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().destroy", $remove, QJsPriority::Low);
		}
		/**
		 * Redraw the DataTables in the current context updating ordering,
		 * searching and paging as required.
		 * @param $reset
		 */
		public function Draw($reset = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().draw", $reset, QJsPriority::Low);
		}
		/**
		 * Look up a language token that was defined in the DataTables'
		 * languageDT initialisation object.
		 * @param $token
		 * @param $def
		 */
		public function I18n($token, $def = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().i18n", $token, $def, QJsPriority::Low);
		}
		/**
		 * Get the initialisation options used for the table.
		 */
		public function Init() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().init", QJsPriority::Low);
		}
		/**
		 * Remove event listeners that have previously been added with on()DT.
		 * @param $event
		 */
		public function Off($event = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().off", $event, QJsPriority::Low);
		}
		/**
		 * Listen for events from tables and fire a callback when they occur
		 * @param $event
		 * @param $callback
		 */
		public function On($event, $callback) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().on", $event, $callback, QJsPriority::Low);
		}
		/**
		 * Add an event listener, for which the callback will be fired once only
		 * and then the event listener removed.
		 * @param $event
		 * @param $callback
		 */
		public function One($event, $callback) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().one", $event, $callback, QJsPriority::Low);
		}
		/**
		 * Get the current ordering of the table. If there is more than one table
		 * in the API's context, the ordering of the first table will be
		 * returned. Use table()DT if you require the ordering of a different
		 * table in the API's context.
		 */
		public function Order1() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().order", QJsPriority::Low);
		}
		/**
		 * Set the ordering to apply to the table using 1D ordering arrays. Note
		 * this doesn't actually perform the order, but rather queues it up - use
		 * draw()DT to perform the ordering.
		 * @param $order
		 */
		public function Order2($order = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().order", $order, QJsPriority::Low);
		}
		/**
		 * Set the ordering to apply to the table using a 2D ordering array. Note
		 * this doesn't actually perform the order, but rather queues it up - use
		 * draw()DT to perform the ordering.
		 * @param $order
		 */
		public function Order3($order) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().order", $order, QJsPriority::Low);
		}
		/**
		 * Get the current page of the table. Note that if multiple tables are
		 * available in the API's context, the current page index of the first
		 * table in the context will be used. Use table()DT if you are working
		 * with multiple tables in a single API context.
		 */
		public function Page1() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().page", QJsPriority::Low);
		}
		/**
		 * Set the page to be displayed by the table
		 * @param $set
		 */
		public function Page2($set) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().page", $set, QJsPriority::Low);
		}
		/**
		 * Get the currently applied global search. If there is more than one
		 * table in the API's context, the search term of the first table will be
		 * returned. Use table()DT if you require the search term of a different
		 * table in the API's context.
		 */
		public function Search1() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().search", QJsPriority::Low);
		}
		/**
		 * Set the global search to use on the table. Note this doesn't actually
		 * perform the search, but rather queues it up - use draw()DT to perform
		 * the search and display the result.
		 * @param $input
		 */
		public function Search2($input = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().search", $input, QJsPriority::Low);
		}
		/**
		 * Get the settings object for the table's in the API instance's context.
		 */
		public function Settings() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().settings", QJsPriority::Low);
		}
		/**
		 * Get the last saved state of the table
		 */
		public function State() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().state", QJsPriority::Low);
		}
		/**
		 * Select the cell found by a cell selector
		 * @param $cellSelector
		 */
		public function Cell1($cellSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().cell", $cellSelector, QJsPriority::Low);
		}
		/**
		 * Select the cell found from both row and column selectors
		 * @param $rowSelector
		 * @param $columnSelector
		 */
		public function Cell2($rowSelector, $columnSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().cell", $rowSelector, $columnSelector, QJsPriority::Low);
		}
		/**
		 * Select all cells
		 * @param $modifier
		 */
		public function Cells1($modifier = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().cells", $modifier, QJsPriority::Low);
		}
		/**
		 * Select cells found by a cell selector
		 * @param $cellSelector
		 */
		public function Cells2($cellSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().cells", $cellSelector, QJsPriority::Low);
		}
		/**
		 * Select cells found by both row and column selectors
		 * @param $rowSelector
		 * @param $columnSelector
		 */
		public function Cells3($rowSelector, $columnSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().cells", $rowSelector, $columnSelector, QJsPriority::Low);
		}
		/**
		 * Select the column found by a the column selector
		 * @param $columnSelector
		 */
		public function Column($columnSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().column", $columnSelector, QJsPriority::Low);
		}
		/**
		 * Select all columns
		 * @param $modifier
		 */
		public function Columns1($modifier = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().columns", $modifier, QJsPriority::Low);
		}
		/**
		 * Select columns found by a cell selector
		 * @param $columnSelector
		 */
		public function Columns2($columnSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().columns", $columnSelector, QJsPriority::Low);
		}
		/**
		 * Select a row found by a row selector
		 * @param $rowSelector
		 */
		public function Row($rowSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().row", $rowSelector, QJsPriority::Low);
		}
		/**
		 * Select all rows
		 * @param $modifier
		 */
		public function Rows1($modifier = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().rows", $modifier, QJsPriority::Low);
		}
		/**
		 * Select rows found by a row selector
		 * @param $rowSelector
		 */
		public function Rows2($rowSelector = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().rows", $rowSelector, QJsPriority::Low);
		}
		/**
		 * Select a table based on the given selector
		 * @param $selector
		 */
		public function Table($selector) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().table", $selector, QJsPriority::Low);
		}
		/**
		 * Select all tables
		 */
		public function Tables1() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().tables", QJsPriority::Low);
		}
		/**
		 * Select tables based on the given selector
		 * @param $selector
		 */
		public function Tables2($selector) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().tables", $selector, QJsPriority::Low);
		}
		/**
		 * Get a boolean value to indicate if there are any entries in the API
		 * instance's result set (i.e. any data, selected rows, etc).
		 */
		public function Any() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().any", QJsPriority::Low);
		}
		/**
		 * Concatenate two or more API instances together
		 * @param $a
		 */
		public function Concat($a = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().concat", $a, QJsPriority::Low);
		}
		/**
		 * Iterate over the contents of the API result set.
		 * @param $fn
		 */
		public function Each($fn) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().each", $fn, QJsPriority::Low);
		}
		/**
		 * Reduce an API instance to a single context and result set, based on a
		 * given index. This can be useful for simplifying some interactions with
		 * the API.
		 * @param $idx
		 */
		public function Eq($idx) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().eq", $idx, QJsPriority::Low);
		}
		/**
		 * Iterate over the result set of an API instance and test each item,
		 * creating a new instance from those items which pass.
		 * @param $fn
		 */
		public function Filter($fn) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().filter", $fn, QJsPriority::Low);
		}
		/**
		 * Reduce a 2D array structured API instance to a 1D array structure.
		 */
		public function Flatten() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().flatten", QJsPriority::Low);
		}
		/**
		 * Find the first instance of a value in the API instance's result set.
		 * @param $value
		 */
		public function IndexOf($value) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().indexOf", $value, QJsPriority::Low);
		}
		/**
		 * Join the elements in the API instance's result set into a string.
		 * @param $separator
		 */
		public function Join($separator) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().join", $separator, QJsPriority::Low);
		}
		/**
		 * Find the last instance of a value in the API instance's result set.
		 * @param $value
		 */
		public function LastIndexOf($value) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().lastIndexOf", $value, QJsPriority::Low);
		}
		/**
		 * Iterate over the result set of an API instance, creating a new API
		 * instance from the values returned by the callback.
		 * @param $fn
		 */
		public function Map($fn) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().map", $fn, QJsPriority::Low);
		}
		/**
		 * Iterate over the result set of an API instance, creating a new API
		 * instance from the values retrieved from the original elements.
		 * @param $property
		 */
		public function Pluck($property) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().pluck", $property, QJsPriority::Low);
		}
		/**
		 * Remove the last item from an API instance's result set.
		 */
		public function Pop() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().pop", QJsPriority::Low);
		}
		/**
		 * Add one or more items to the end of an API instance's result set.
		 * @param $value_1
		 */
		public function Push($value_1 = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().push", $value_1, QJsPriority::Low);
		}
		/**
		 * Apply a callback function against and accumulator and each element in
		 * the Api's result set.
		 * @param $fn
		 */
		public function Reduce($fn = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().reduce", $fn, QJsPriority::Low);
		}
		/**
		 * Apply a callback function against and accumulator and each element in
		 * the Api's result set.
		 * @param $fn
		 */
		public function ReduceRight($fn = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().reduceRight", $fn, QJsPriority::Low);
		}
		/**
		 * Reverse the result set of the API instance and return the original
		 * array.
		 */
		public function Reverse() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().reverse", QJsPriority::Low);
		}
		/**
		 * Remove the first item from an API instance's result set.
		 */
		public function Shift() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().shift", QJsPriority::Low);
		}
		/**
		 * Sort the elements of the API instance's result set.
		 * @param $fn
		 */
		public function Sort($fn = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().sort", $fn, QJsPriority::Low);
		}
		/**
		 * Modify the contents of an Api instance's result set, adding or
		 * removing items from it as required.
		 * @param $index
		 * @param $howMany
		 */
		public function Splice($index, $howMany = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().splice", $index, $howMany, QJsPriority::Low);
		}
		/**
		 * Create a native Javascript array from an API instance.
		 */
		public function ToArray() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().toArray", QJsPriority::Low);
		}
		/**
		 * Create a jQuery object from an API instance.
		 */
		public function ToJQuery() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().toJQuery", QJsPriority::Low);
		}
		/**
		 * Create a new API instance containing only the unique items from a the
		 * elements in an instance's result set.
		 */
		public function Unique() {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().unique", QJsPriority::Low);
		}
		/**
		 * Add one or more items to the start of an API instance's result set.
		 * @param $value_1
		 */
		public function Unshift($value_1 = null) {
			QApplication::ExecuteControlCommand($this->getJqControlId(), $this->getJqSetupFunction() . "().unshift", $value_1, QJsPriority::Low);
		}


		public function __get($strName) {
			switch ($strName) {
				case 'AutoWidth': return $this->blnAutoWidth;
				case 'DeferRender': return $this->blnDeferRender;
				case 'Info': return $this->blnInfo;
				case 'JQueryUI': return $this->blnJQueryUI;
				case 'LengthChange': return $this->blnLengthChange;
				case 'Ordering': return $this->blnOrdering;
				case 'Paging': return $this->blnPaging;
				case 'Processing': return $this->blnProcessing;
				case 'ScrollX': return $this->blnScrollX;
				case 'ScrollY': return $this->strScrollY;
				case 'Searching': return $this->blnSearching;
				case 'ServerSide': return $this->blnServerSide;
				case 'StateSave': return $this->blnStateSave;
				case 'Ajax': return $this->mixAjax;
				case 'Data': return $this->arrData;
				case 'CreatedRow': return $this->mixCreatedRow;
				case 'DrawCallback': return $this->mixDrawCallback;
				case 'FooterCallback': return $this->mixFooterCallback;
				case 'FormatNumber': return $this->mixFormatNumber;
				case 'HeaderCallback': return $this->mixHeaderCallback;
				case 'InfoCallback': return $this->mixInfoCallback;
				case 'InitComplete': return $this->mixInitComplete;
				case 'PreDrawCallback': return $this->mixPreDrawCallback;
				case 'RowCallback': return $this->mixRowCallback;
				case 'StateLoadCallback': return $this->mixStateLoadCallback;
				case 'StateLoaded': return $this->mixStateLoaded;
				case 'StateLoadParams': return $this->mixStateLoadParams;
				case 'StateSaveCallback': return $this->mixStateSaveCallback;
				case 'StateSaveParams': return $this->mixStateSaveParams;
				case 'DeferLoading': return $this->mixDeferLoading;
				case 'Destroy': return $this->blnDestroy;
				case 'DisplayStart': return $this->intDisplayStart;
				case 'Dom': return $this->strDom;
				case 'LengthMenu': return $this->arrLengthMenu;
				case 'Order': return $this->arrOrder;
				case 'OrderCellsTop': return $this->blnOrderCellsTop;
				case 'OrderClasses': return $this->blnOrderClasses;
				case 'OrderFixed': return $this->mixOrderFixed;
				case 'OrderMulti': return $this->blnOrderMulti;
				case 'PageLength': return $this->intPageLength;
				case 'PagingType': return $this->strPagingType;
				case 'Renderer': return $this->mixRenderer;
				case 'Retrieve': return $this->blnRetrieve;
				case 'ScrollCollapse': return $this->blnScrollCollapse;
				case 'Search': return $this->mixSearch;
				case 'SearchCols': return $this->arrSearchCols;
				case 'SearchDelay': return $this->intSearchDelay;
				case 'StateDuration': return $this->intStateDuration;
				case 'StripeClasses': return $this->arrStripeClasses;
				case 'TabIndex': return $this->intTabIndex;
				case 'ColumnDefs': return $this->arrColumnDefs;
				case 'Columns': return $this->arrColumns;
				case 'Language': return $this->mixLanguage;
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
				case 'AutoWidth':
					try {
						$this->blnAutoWidth = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'autoWidth', $this->blnAutoWidth);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeferRender':
					try {
						$this->blnDeferRender = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'deferRender', $this->blnDeferRender);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Info':
					try {
						$this->blnInfo = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'info', $this->blnInfo);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'JQueryUI':
					try {
						$this->blnJQueryUI = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'jQueryUI', $this->blnJQueryUI);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LengthChange':
					try {
						$this->blnLengthChange = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'lengthChange', $this->blnLengthChange);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ordering':
					try {
						$this->blnOrdering = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'ordering', $this->blnOrdering);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Paging':
					try {
						$this->blnPaging = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'paging', $this->blnPaging);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Processing':
					try {
						$this->blnProcessing = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'processing', $this->blnProcessing);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScrollX':
					try {
						$this->blnScrollX = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'scrollX', $this->blnScrollX);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScrollY':
					try {
						$this->strScrollY = QType::Cast($mixValue, QType::String);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'scrollY', $this->strScrollY);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Searching':
					try {
						$this->blnSearching = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'searching', $this->blnSearching);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServerSide':
					try {
						$this->blnServerSide = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'serverSide', $this->blnServerSide);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateSave':
					try {
						$this->blnStateSave = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateSave', $this->blnStateSave);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ajax':
					$this->mixAjax = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'ajax', $mixValue);
					break;

				case 'Data':
					try {
						$this->arrData = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'data', $this->arrData);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedRow':
					try {
						$this->mixCreatedRow = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'createdRow', $this->mixCreatedRow);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DrawCallback':
					try {
						$this->mixDrawCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'drawCallback', $this->mixDrawCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FooterCallback':
					try {
						$this->mixFooterCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'footerCallback', $this->mixFooterCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormatNumber':
					try {
						$this->mixFormatNumber = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'formatNumber', $this->mixFormatNumber);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HeaderCallback':
					try {
						$this->mixHeaderCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'headerCallback', $this->mixHeaderCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InfoCallback':
					try {
						$this->mixInfoCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'infoCallback', $this->mixInfoCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InitComplete':
					try {
						$this->mixInitComplete = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'initComplete', $this->mixInitComplete);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreDrawCallback':
					try {
						$this->mixPreDrawCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'preDrawCallback', $this->mixPreDrawCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RowCallback':
					try {
						$this->mixRowCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'rowCallback', $this->mixRowCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateLoadCallback':
					try {
						$this->mixStateLoadCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateLoadCallback', $this->mixStateLoadCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateLoaded':
					try {
						$this->mixStateLoaded = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateLoaded', $this->mixStateLoaded);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateLoadParams':
					try {
						$this->mixStateLoadParams = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateLoadParams', $this->mixStateLoadParams);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateSaveCallback':
					try {
						$this->mixStateSaveCallback = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateSaveCallback', $this->mixStateSaveCallback);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateSaveParams':
					try {
						$this->mixStateSaveParams = QType::Cast($mixValue, 'QJsClosure');
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateSaveParams', $this->mixStateSaveParams);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeferLoading':
					$this->mixDeferLoading = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'deferLoading', $mixValue);
					break;

				case 'Destroy':
					try {
						$this->blnDestroy = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'destroy', $this->blnDestroy);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DisplayStart':
					try {
						$this->intDisplayStart = QType::Cast($mixValue, QType::Integer);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'displayStart', $this->intDisplayStart);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Dom':
					try {
						$this->strDom = QType::Cast($mixValue, QType::String);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'dom', $this->strDom);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LengthMenu':
					try {
						$this->arrLengthMenu = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'lengthMenu', $this->arrLengthMenu);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Order':
					try {
						$this->arrOrder = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'order', $this->arrOrder);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderCellsTop':
					try {
						$this->blnOrderCellsTop = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'orderCellsTop', $this->blnOrderCellsTop);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderClasses':
					try {
						$this->blnOrderClasses = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'orderClasses', $this->blnOrderClasses);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderFixed':
					$this->mixOrderFixed = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'orderFixed', $mixValue);
					break;

				case 'OrderMulti':
					try {
						$this->blnOrderMulti = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'orderMulti', $this->blnOrderMulti);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PageLength':
					try {
						$this->intPageLength = QType::Cast($mixValue, QType::Integer);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'pageLength', $this->intPageLength);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagingType':
					try {
						$this->strPagingType = QType::Cast($mixValue, QType::String);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'pagingType', $this->strPagingType);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Renderer':
					$this->mixRenderer = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'renderer', $mixValue);
					break;

				case 'Retrieve':
					try {
						$this->blnRetrieve = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'retrieve', $this->blnRetrieve);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScrollCollapse':
					try {
						$this->blnScrollCollapse = QType::Cast($mixValue, QType::Boolean);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'scrollCollapse', $this->blnScrollCollapse);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Search':
					$this->mixSearch = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'search', $mixValue);
					break;

				case 'SearchCols':
					try {
						$this->arrSearchCols = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'searchCols', $this->arrSearchCols);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SearchDelay':
					try {
						$this->intSearchDelay = QType::Cast($mixValue, QType::Integer);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'searchDelay', $this->intSearchDelay);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StateDuration':
					try {
						$this->intStateDuration = QType::Cast($mixValue, QType::Integer);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stateDuration', $this->intStateDuration);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StripeClasses':
					try {
						$this->arrStripeClasses = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'stripeClasses', $this->arrStripeClasses);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TabIndex':
					try {
						$this->intTabIndex = QType::Cast($mixValue, QType::Integer);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'tabIndex', $this->intTabIndex);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ColumnDefs':
					try {
						$this->arrColumnDefs = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'columnDefs', $this->arrColumnDefs);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Columns':
					try {
						$this->arrColumns = QType::Cast($mixValue, QType::ArrayType);
						$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'columns', $this->arrColumns);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Language':
					$this->mixLanguage = $mixValue;
					$this->AddAttributeScript($this->getJqSetupFunction(), 'option', 'language', $mixValue);
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

		/**
		* If this control is attachable to a codegenerated control in a ModelConnector, this function will be
		* used by the ModelConnector designer dialog to display a list of options for the control.
		* @return QModelConnectorParam[]
		**/
		public static function GetModelConnectorParams() {
			return array_merge(parent::GetModelConnectorParams(), array(
				new QModelConnectorParam (get_called_class(), 'AutoWidth', 'Enable or disable automatic column width calculation. This can bedisabled as an optimisation (it takes a finite amount of time tocalculate the widths) if the tables widths are passed in usingcolumns.widthDT.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'DeferRender', 'By default, when DataTables loads data from an Ajax or Javascript datasource (ajaxDT and dataDT respectively) it will create all HTMLelements needed up-front. When working with large data sets, thisoperation can take a not-insignificant amount of time, particularly inolder browsers such as IE6-8. This option allows DataTables to createthe nodes (rows and cells in the table body) only when they are neededfor a draw.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'Info', 'When this option is enabled, Datatables will show information aboutthe table including information about filtered data if that action isbeing performed. This option allows that feature to be enabled ordisabled.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'JQueryUI', 'DataTables can be styled by a number of CSS library packages, includedjQuery UI, Twitter Bootstrap and Foundation. Although Bootstrap,Foundation and other libraries require a plug-in, jQuery UIThemeRoller support is built into DataTables and can be enabled simplywith this parameter. When enabled, DataTables will use markup andclasses created for jQuery UI ThemeRoller, making it very easy tointegrate your tables with jQuery UI.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'LengthChange', 'When pagination is enabled, this option will control the display anoption for the end user to change number of records to be shown perpage. The options shown in the list are controlled by the lengthMenuDTconfiguration option.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'Ordering', 'Enable or disable ordering of columns - it is as simple as that!DataTables, by default, allows end users to click on the header cellfor each column, ordering the table by the data in that column. Theability to order data can be disabled using this option.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'Paging', 'DataTables can split the rows in tables into individual pages, whichis an efficient method of showing a large number of records in a smallspace. The end user is provided with controls to request the displayof different data as the navigate through the data. This feature isenabled by default, but if you wish to disable it, you may do so withthis parameter.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'Processing', 'Enable or disable the display of a \'processing\' indicator when thetable is being processed (e.g. a sort). This is particularly usefulfor tables with large amounts of data where it can take a noticeableamount of time to sort the entries.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'ScrollX', 'Enable horizontal scrolling. When a table is too wide to fit into acertain layout, or you have a large number of columns in the table,you can enable horizontal (x) scrolling to show the table in aviewport, which can be scrolled.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'ScrollY', 'Enable vertical scrolling. Vertical scrolling will constrain theDataTable to the given height, and enable scrolling for any data whichoverflows the current viewport. This can be used as an alternative topaging to display a lot of data in a small area (although paging andscrolling can both be enabled at the same time if desired).', QType::String),
				new QModelConnectorParam (get_called_class(), 'Searching', 'This option allows the search abilities of DataTables to be enabled ordisabled. Searching in DataTables is \"smart\" in that it allows the enduser to input multiple words (space separated) and will match a rowcontaining those words, even if not in the order that was specified(this allow matching across multiple columns).', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'ServerSide', 'DataTables has two fundamental modes of operation:', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'StateSave', 'Enable or disable state saving. When enabled aDataTables will storagestate information such as pagination position, display length,filtering and sorting. When the end user reloads the page the table\'sstate will be altered to match what they had previously set up.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'Data', 'DataTables can obtain the data it is to display in the table\'s bodyfrom a number of sources, including being passed in as an array of rowdata using this initialisation parameter. As with other dynamic datasources, arrays or objects can be used for the data source for eachrow, with columns.dataDT employed to read from specific objectproperties.', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'CreatedRow', 'This callback is executed when a TR element is created (and all TDchild elements have been inserted), or registered if using a DOMsource, allowing manipulation of the TR element.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'DrawCallback', 'It can be useful to take an action on every draw event of the table -for example you might want to update an external control with thenewly displayed data, or with server-side processing is enabled youmight want to assign events to the newly created elements. Thiscallback is designed for exactly that purpose and will execute onevery draw.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'FooterCallback', 'Identical to headerCallbackDT but for the table footer this functionallows you to modify the table footer on every \'draw\' event.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'FormatNumber', 'DataTables will display numbers in a few different locations whendrawing information about a table, for example in the table\'sinformation element and the pagination controls. When working withlarge numbers it is often useful to format it for readability byseparating the thousand units - for example 1 million is rendered as\"1,000,000\", allowing the user to see at a glance what order ofmagnitude the number shows.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'HeaderCallback', 'This function is called on every \'draw\' event (i.e. when a filter,sort or page event is initiated by the end user or the API), andallows you to dynamically modify the header row. This can be used tocalculate and display useful information about the table.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'InfoCallback', 'The information element can be used to convey information about thecurrent state of the table. Although the internationalisation optionspresented by DataTables are quite capable of dealing with mostcustomisations, there may be times where you wish to customise thestring further. This callback allows you to do exactly that.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'InitComplete', 'It can often be useful to know when your table has fully beeninitialised, data loaded and drawn, particularly when using an ajaxDTdata source. In such a case, the table will complete its initial runbefore the data has been loaded (Ajax is asynchronous after all!) sothis callback is provided to let you know when the data is fullyloaded.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'PreDrawCallback', 'The partner of the drawCallbackDT callback, this function is called atthe very start of each table draw. It can therefore be used to updateor clean the display before each draw (for example removing events),and additionally can be used to cancel the draw by returning false.Any other return (including undefined) results in the full drawoccurring.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'RowCallback', 'This callback allows you to \'post process\' each row after it have beengenerated for each table draw, but before it is rendered into thedocument. This means that the contents of the row might not havedimensions ($().width() for example) if it is not already in thedocument.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'StateLoadCallback', 'With this callback you can define where, and how, the state of a tableis loaded from. By default DataTables will load from localStorage butyou might wish to use a server-side database or cookies as yourimplementation requirements demand. For the format of the data that isstored, please refer to the stateSaveCallbackDT documentation.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'StateLoaded', 'Callback that is fired once the state has been loaded(stateLoadCallbackDT) and the saved data manipulated (if required -stateLoadParamsDT).', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'StateLoadParams', 'Callback which allows modification of the saved state prior to loadingthat state. This callback is called when the table is loading statefrom the stored data, but prior to the settings object being modifiedby the saved state.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'StateSaveCallback', 'DataTables can save the state of the table (paging, filtering etc)when the stateSaveDT option is enabled, and by default it will useHTML5\'s localStorage to save the state into. This callback methodallows you to change where the state is saved (for example you mightwish to use a server-side database or cookies).', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'StateSaveParams', 'Callback which allows modification of the parameters to be saved forthe DataTables state saving (stateSaveDT), prior to the data actuallybeing saved. This callback is called every time DataTables requeststhat the state be saved. For the format of the data that is stored,please refer to the stateSaveCallbackDT documentation.', 'QJsClosure'),
				new QModelConnectorParam (get_called_class(), 'Destroy', 'Initialise a new DataTable as usual, but if there is an existingDataTable which matches the selector, it will be destroyed andreplaced with the new table. This can be useful if you want to changea property of the table which cannot be altered through the API.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'DisplayStart', 'Define the starting point for data display when using DataTables withpagination (paginateDT).', QType::Integer),
				new QModelConnectorParam (get_called_class(), 'Dom', 'DataTables will add a number of elements around the table to bothcontrol the table and show additional information about it. Theposition of these elements on screen are controlled by a combinationof their order in the document (DOM) and the CSS applied to theelements. This parameter is used to control their ordering andadditional mark-up surrounding them in the DOM.', QType::String),
				new QModelConnectorParam (get_called_class(), 'LengthMenu', 'This parameter allows you to readily specify the entries in the lengthdrop down select list that DataTables shows when pagination isenabled. It can be either:', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'Order', 'If ordering is enabled (orderingDT), then DataTables will perform afirst pass order during initialisation. Using this parameter you candefine which column(s) the order is performed upon, and the orderingdirection. The orderDT must be an array of arrays, each inner arraycomprised of two elements:', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'OrderCellsTop', 'Allows control over whether DataTables should use the top (true)unique cell that is found for a single column, or the bottom (false -default) to attach the default order listener. This is useful whenusing complex headers.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'OrderClasses', 'DataTables highlight the columns which are used to order the contentin the table\'s body by adding a class to the cells in that column,which in turn has CSS applied to those classes to highlight thosecells.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'OrderMulti', 'When ordering is enabled (orderingDT), by default DataTables allowsusers to sort multiple columns by shift clicking upon the header cellfor each column. Although this can be quite useful for users, it canalso increase the complexity of the order, potentiality increasing theprocessing time of ordering the data. Therefore, this option isprovided to allow this shift-click multiple column ability.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'PageLength', 'Number of rows to display on a single page when using pagination.', QType::Integer),
				new QModelConnectorParam (get_called_class(), 'PagingType', 'The pagination option of DataTables will display a pagination controlbelow the table (by default, its position can be changed using domDTand CSS) with buttons that the end user can use to navigate the pagesof the table. Which buttons are shown in the pagination control aredefined by the option given here.', QType::String),
				new QModelConnectorParam (get_called_class(), 'Retrieve', 'Retrieve the DataTables object for the given selector. Note that ifthe table has already been initialised, this parameter will causeDataTables to simply return the object that has already been set up -it will not take account of any changes you might have made to theinitialisation object passed to DataTables (setting this parameter totrue is an acknowledgement that you understand this!).', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'ScrollCollapse', 'When vertical (y) scrolling is enabled through the use of thescrollYDT option, DataTables will force the height of the table\'sviewport to the given height at all times (useful for layout).However, this can look odd when filtering data down to a small dataset, and the footer is left \"floating\" further down. This parameter(when enabled) will cause DataTables to collapse the table\'s viewportdown when the result set will fit within the given Y height.', QType::Boolean),
				new QModelConnectorParam (get_called_class(), 'SearchCols', 'Basically the same as the searchDT option, but in this case forindividual columns, rather than the global filter, this option definedthe filtering to apply to the table during initialisation.', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'SearchDelay', 'The built in DataTables global search (by default at the top right ofevery DataTable)will instantly search the table on every keypress whenin client-side processing mode and reduce the search call frequencyautomatically to 400mS when in server-side processing mode. This callfrequency (throttling) can be controlled using the searchDelayDTparameter for both client-side and server-side processing.', QType::Integer),
				new QModelConnectorParam (get_called_class(), 'StateDuration', 'Duration for which the saved state information is considered valid.After this period has elapsed the state will be returned to thedefault.', QType::Integer),
				new QModelConnectorParam (get_called_class(), 'StripeClasses', 'An array of CSS classes that should be applied to displayed rows, insequence. This array may be of any length, and DataTables will applyeach class sequentially, looping when required.', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'TabIndex', 'By default DataTables allows keyboard navigation of the table(sorting, paging, and filtering) by adding a tabindex attribute to therequired elements. This allows the end user to tab through thecontrols and press the enter key to activate them, allowing the tablecontrols to be accessible without a mouse.', QType::Integer),
				new QModelConnectorParam (get_called_class(), 'ColumnDefs', 'Very similar to columnsDT, this parameter allows you to assignspecific options to columns in the table, although in this case thecolumn options defined can be applied to one or more columns.Additionally, not every column need be specified, unlike columnsDT.', QType::ArrayType),
				new QModelConnectorParam (get_called_class(), 'Columns', 'The columnsDT option in the initialisation parameter allows you todefine details about the way individual columns behave. For a fulllist of column options that can be set, please see the relatedparameters below.', QType::ArrayType),
			));
		}
	}

?>
