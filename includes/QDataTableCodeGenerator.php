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
	 * Indicate that by default, the data list does its own filtering. This can be changed in the modelconnector editor if needed.
	 *
	 * @return bool
	 */
	public function DataListHasFilter() {
		return true;
	}

}