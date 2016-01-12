<?php
/**
 * Code generator for the DataGrid2 object.
 */

class QDataTableCodeGenerator extends QControl_CodeGenerator {
	/** @var  string */
	protected $strControlClassName;

	public function __construct($strControlClassName = 'QDataTable') {
		$this->strControlClassName = $strControlClassName;
	}

	public function DataListVariableDeclaration(QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strCode = parent::DataListVariableDeclaration($objCodeGen, $objTable);
		$strCode .= $this->GenerateColumnDeclarations($objCodeGen, $objTable);
		return $strCode;
	}



	public function VarName($strPropName) {
		return 'dtg' . $strPropName;
	}

	/**
	 * Generate all the code to create a subclass of this class that will act as a list connector between this control
	 * and the database table given.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 */
	public function DataListSubclass(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = $this->GenerateSubclassMembers($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassConstructor($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassCreateColumns($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassDataBinder($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassGet($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassSet($objCodeGen, $objTable);

		return $strCode;
	}

	public function DataListSubclassComments(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strObjectType = $objTable->ClassName;

		$strCode = <<<TMPL
 * @property QQCondition 	\$Conditions Any condition to use during binding
 * @property QQClauses 		\$Clauses Any clauses to use during binding

TMPL;
		return $strCode;
	}


	public function GenerateSubclassMembers(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
	/**
	 * @var null|QQCondition	Condition to use to filter the list.
	 * @access protected
	 */
	protected \$objCondition;

	/**
	 * @var null|QQClause[]		Clauses to attach to the query.
	 * @access protected
	 */
	protected \$objClauses;


TMPL;
		$strCode .= $this->GenerateColumnDeclarations($objCodeGen, $objTable);
		return $strCode;
	}

	protected function GenerateColumnDeclarations(QCodeGenBase $objCodeGen, QTable $objTable) {

		$strCode = <<<TMPL
	// Publicly accessible columns to allow parent controls to directly manipulate them after creation.

TMPL;
		foreach ($objTable->ColumnArray as $objColumn) {
			if (isset($objColumn->Options['FormGen']) && ($objColumn->Options['FormGen'] == QFormGen::None)) continue;
			if (isset($objColumn->Options['NoColumn']) && $objColumn->Options['NoColumn']) continue;
			$strColVarName = 'col' . $objCodeGen->ModelConnectorPropertyName($objColumn);
			$strCode .= <<<TMPL
	/** @var QSimpleTableNodeColumn */
	public \${$strColVarName};

TMPL;
		}

		foreach ($objTable->ReverseReferenceArray as $objReverseReference) {
			$strColVarName = 'col' . $objReverseReference->ObjectDescription;

			if ($objReverseReference->Unique) {
				$strCode .= <<<TMPL
	/** @var QSimpleTableNodeColumn {$strColVarName} */
	public \${$strColVarName};

TMPL;
			}
		}
		$strCode .= "\n";
		return $strCode;
	}


	/**
	 * Generate a constructor for a subclass of itself.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 */
	public function GenerateSubclassConstructor(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
	public function __construct(\$objParent, \$strControlId = false) {
		parent::__construct(\$objParent, \$strControlId);
		// Set a generic data binder.
		// Set to BindData if you want to do more custom data binding
		\$this->SetDataBinder('DefaultDataBinder', \$this);
		\$this->UseAjax = true;
		\$this->Watch(QQN::{$objTable->ClassName}());
	}


TMPL;
		return $strCode;
	}


	public function GenerateSubclassCreateColumns(QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL
	/**
	 * Creates the columns for the table. Override to change the columns, or use the ModelEditorDialog to turn on and off individual columns.
	 */
	public function CreateColumns() {

TMPL;

		foreach ($objTable->ColumnArray as $objColumn) {
			if (isset($objColumn->Options['FormGen']) && ($objColumn->Options['FormGen'] == QFormGen::None)) continue;
			if (isset($objColumn->Options['NoColumn']) && $objColumn->Options['NoColumn']) continue;

			$strCode .= <<<TMPL
		\$this->col{$objCodeGen->ModelConnectorPropertyName($objColumn)} = \$this->CreateNodeColumn("{$objCodeGen->ModelConnectorControlName($objColumn)}", QQN::{$objTable->ClassName}()->{$objCodeGen->ModelConnectorPropertyName($objColumn)});

TMPL;

		}

		foreach ($objTable->ReverseReferenceArray as $objReverseReference) {
			if ($objReverseReference->Unique) {
				$strCode .= <<<TMPL
		\$this->col{$objReverseReference->ObjectDescription} = \$this->CreateNodeColumn("{$objCodeGen->ModelConnectorControlName($objReverseReference)}", QQN::{$objTable->ClassName}()->{$objReverseReference->ObjectDescription});

TMPL;
			}
		}

		$strCode .= <<<TMPL
	}


TMPL;

		return $strCode;
	}

	public function GenerateSubclassDataBinder(QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strCode = $this->GenerateSubclassPrivateDataBinder($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassPublicDataBinder($objCodeGen, $objTable);
		return $strCode;
	}

	protected function GenerateSubclassPrivateDataBinder(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
   /**
	* Calls the data binder with default options. Override and call BindData with additional conditions or clauses as needed, or
	* call your own custom data binder.
	**/
	public function DefaultDataBinder() {
		\$this->BindData(null, null);
	}


TMPL;
		return $strCode;
	}

	protected function GenerateSubclassPublicDataBinder(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strObjectType = $objTable->ClassName;
		$strCode = <<<TMPL
   /**
	* Called by the framework to access the data for the control and load it into the table.
	**/
	public function BindData(\$objAdditionalCondition = null, \$objAdditionalClauses = null) {
		\$objCondition = \$this->GetCondition(\$objAdditionalCondition);
		\$objClauses = \$this->GetClauses(\$objAdditionalClauses);

		\$this->TotalItemCount = {$strObjectType}::QueryCount(\$objCondition, \$objClauses);


		// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
		// the OrderByClause to the \$objClauses array
		if (\$objClause = \$this->objOrderByClause) {
			\$objClauses[] = \$objClause;
		}

		// Add the LimitClause information, as well
		if (\$objClause = \$this->LimitClause) {
			\$objClauses[] = \$objClause;
		}

		\$this->DataSource = {$strObjectType}::QueryArray(\$objCondition, \$objClauses);
	}


TMPL;

		$strCode .= $this->GenerateSubclassGetCondition($objCodeGen, $objTable);
		$strCode .= $this->GenerateSubclassGetClauses($objCodeGen, $objTable);

		return $strCode;
	}

	protected function GenerateSubclassGetCondition(QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strCode = <<<TMPL
	/**
	 * Returns the condition to use when querying the data. Default is to return the condition put in the local
	 * objCondition member variable. You can also override this to return a condition. One use of this is to add conditions
	 * based on additional controls you add to the view.
	 *
	 * @return QQCondition
	 */
	protected function GetCondition(\$objAdditionalCondition = null) {
		\$strSearchValue = \$this->mixSearch['search'];


TMPL;

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

		$strCondition = implode (",\n            ", $cond);
		if ($strCondition) {
			$strCondition = "QQ::OrCondition(
			{$strCondition}
			)";
			$strCode .=
'		$objCondition = ' . $strCondition . ";";
		} else {
			$strCode .=
'		$objCondition = QQ::All()';

		}

		$strCode .= <<<TMPL


		// Get passed in condition, possibly coming from subclass or enclosing control or form
		if (\$objAdditionalCondition) {
			\$objCondition = QQ::AndCondition(\$objCondition, \$objAdditionalCondition);
		}
		// Get condition more permanently bound
		if (\$this->objCondition) {
			\$objCondition = QQ::AndCondition(\$objCondition, \$this->objCondition);
		}

		return \$objCondition;
	}


TMPL;
		return $strCode;
	}

	protected function GenerateSubclassGetClauses(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
	/**
	 * Returns the clauses to use when querying the data. Default is to return the clauses put in the local
	 * objClauses member variable. You can also override this to return clauses, or pass them in. One use of this is to add expansion clauses
	 * for early data binding to reduce the number of accesses to the database.
	 *
	 * @return QQClause[]
	 */
	protected function GetClauses(\$objAdditionalClauses = null) {
		\$objClauses = \$objAdditionalClauses;
		if (!\$objClauses) {
			\$objClauses = [];
		}
		if (\$this->objClauses) {
			\$objClauses = array_merge(\$objClauses, \$this->objClauses);
		}
		return \$objClauses;
	}


TMPL;
		return $strCode;
	}

	protected function GenerateSubclassGet(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
	/**
	 * This will get the value of \$strName
	 *
	 * @param string \$strName Name of the property to get
	 * @return mixed
	 */
	public function __get(\$strName) {
		switch (\$strName) {
			case 'Condition':
				return \$this->objCondition;
			case 'Clauses':
				return \$this->objClauses;
			default:
				try {
					return parent::__get(\$strName);
				} catch (QCallerException \$objExc) {
					\$objExc->IncrementOffset();
					throw \$objExc;
				}
		}
	}


TMPL;
		return $strCode;
	}

	protected function GenerateSubclassSet(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = <<<TMPL
	/**
	 * This will set the property \$strName to be \$mixValue
	 *
	 * @param string \$strName Name of the property to set
	 * @param string \$mixValue New value of the property
	 * @return mixed
	 */
	public function __set(\$strName, \$mixValue) {
		switch (\$strName) {
			case 'Condition':
				try {
					return (\$this->objCondition = QType::Cast(\$mixValue, 'QQCondition'));
				} catch (QCallerException \$objExc) {
					\$objExc->IncrementOffset();
					throw \$objExc;
				}
			case 'Clauses':
				try {
					return (\$this->objClauses = QType::Cast(\$mixValue, QType::ArrayType));
				} catch (QCallerException \$objExc) {
					\$objExc->IncrementOffset();
					throw \$objExc;
				}
			default:
				try {
					parent::__set(\$strName, \$mixValue);
					break;
				} catch (QCallerException \$objExc) {
					\$objExc->IncrementOffset();
					throw \$objExc;
				}
		}
	}


TMPL;
		return $strCode;
	}

	/**
	 * Returns the code that creates the list object. This would be embedded in the pane
	 * or form that is using the list object.
	 *
	 * @param QTable $objTable
	 * @return mixed
	 */
	public function DataListCreate(QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strVarName = $objCodeGen->DataListVarName($objTable);
		$strClassName = $this->GetControlClass();

		$strCode = <<<TMPL
		\$this->{$strVarName}_Create();

TMPL;
		return $strCode;
	}


	public function DataListHelperMethods(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strCode = $this->GenerateCreateFunction($objCodeGen, $objTable);
		$strCode .= $this->GenerateCreateColumns($objCodeGen, $objTable);
		$strCode .= $this->GenerateAddActions($objCodeGen, $objTable);
		$strCode .= $this->GenerateRowParamsCallback($objCodeGen, $objTable);

		return $strCode;
	}


	protected function GenerateCreateFunction (QCodeGenBase $objCodeGen, QTable $objTable)
	{
		$strPropertyName = $objCodeGen->DataListPropertyName($objTable);
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL
   /**
	* Creates the data table and prepares it to be row clickable. Override for additional creation operations.
	**/
	protected function {$strVarName}_Create() {
		\$this->{$strVarName} = new {$strPropertyName}List(\$this);
		\$this->{$strVarName}_CreateColumns();
		\$this->{$strVarName}_AddActions();
		\$this->{$strVarName}->AddCssClass('hover');
		\$this->{$strVarName}->RowParamsCallback = [\$this, "{$strVarName}_GetRowParams"];

TMPL;

		if (($o = $objTable->Options) && isset ($o['Name'])) { // Did developer default?
			$strCode .= <<<TMPL
		\$this->{$strVarName}->Name = "{$o['Name']}";

TMPL;
		}

		// Add options coming from the config file, including the LinkedNode
		$strCode .= $this->ConnectorCreateOptions($objCodeGen, $objTable, null, $strVarName);

		$strCode .= <<<TMPL
	}

TMPL;
		return $strCode;
	}

	/**
	 * Generates a function to add columns to the list.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 * @return string
	 */
	protected function GenerateCreateColumns(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL

   /**
	* Calls the list connector to add the columns. Override to customize column creation.
	**/
	protected function {$strVarName}_CreateColumns() {
		\$this->{$strVarName}->CreateColumns();
	}

TMPL;

		return $strCode;

	}

	/**
	 * Generates an alternative create columns function that could be used by the list panel to create the columns directly.
	 * This is designed to be added as commented out code in the list panel override class that the user can choose to use.
	 *
	 * @param QCodeGenBase $objCodeGen
	 * @param QTable $objTable
	 * @return string
	 */
	public function GenerateCreateColumnsOverride(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL
	protected function {$strVarName}_CreateColumns() {

TMPL;

		foreach ($objTable->ColumnArray as $objColumn) {
			if (isset($objColumn->Options['FormGen']) && ($objColumn->Options['FormGen'] == QFormGen::None)) continue;
			if (isset($objColumn->Options['NoColumn']) && $objColumn->Options['NoColumn']) continue;

			$strCode .= <<<TMPL
		\$col = \$this->{$strVarName}->CreateNodeColumn("{$objCodeGen->ModelConnectorControlName($objColumn)}", QQN::{$objTable->ClassName}()->{$objCodeGen->ModelConnectorPropertyName($objColumn)});

TMPL;

		}

		foreach ($objTable->ReverseReferenceArray as $objReverseReference) {
			if ($objReverseReference->Unique) {
				$strCode .= <<<TMPL
		\$col = \$this->{$strVarName}->CreateNodeColumn("{$objCodeGen->ModelConnectorControlName($objReverseReference)}", QQN::{$objTable->ClassName}()->{$objReverseReference->ObjectDescription});

TMPL;
			}
		}

		$strCode .= <<<TMPL
	}


TMPL;

		return $strCode;
	}


	protected function GenerateAddActions(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL

	protected function {$strVarName}_AddActions() {
		\$this->{$strVarName}->AddAction(new QCellClickEvent(), new QAjaxControlAction(\$this, '{$strVarName}_CellClick', null, null, '\$j(this).parent().data("value")'));
	}

	protected function {$strVarName}_CellClick(\$strFormId, \$strControlId, \$strParameter) {
		if (\$strParameter) {
			\$this->EditItem(\$strParameter);
		}
	}

TMPL;

		return $strCode;
	}

	protected function GenerateRowParamsCallback(QCodeGenBase $objCodeGen, QTable $objTable) {
		$strVarName = $objCodeGen->DataListVarName($objTable);

		$strCode = <<<TMPL
	public function {$strVarName}_GetRowParams(\$objRowObject, \$intRowIndex) {
		\$strKey = \$objRowObject->PrimaryKey();
		\$params['data-value'] = \$strKey;
		return \$params;
	}
TMPL;

		return $strCode;

	}

}