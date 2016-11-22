<?php
	require('../../../qcubed/qcubed.inc.php');

	class SampleForm extends QForm {
		protected $dtgTable;

		protected function Form_Create() {
			$this->dtgTable = new QDataTable($this);
			$this->dtgTable->SetDataBinder('BindData');
			$this->dtgTable->CreateNodeColumn('First Name', QQN::Person()->FirstName);

			// Sorts by last name, and then by first name, though the column is only displaying the last name.
			$this->dtgTable->CreateNodeColumn('Last Name', [QQN::Person()->LastName, QQN::Person()->FirstName]);
			$this->dtgTable->UseAjax = true;
		}

		protected function BindData() {
			if ($strFilter = $this->dtgTable->Search["search"]) {
				$objCondition = QQ::OrCondition(
					QQ::Like(QQN::Person()->FirstName, '%' . $strFilter . '%'),
					QQ::Like(QQN::Person()->LastName, '%' . $strFilter . '%')
				);
			}
			else {
				$objCondition = QQ::All();
			}
			$this->dtgTable->TotalItemCount = Person::QueryCount ($objCondition);
			$objClauses[] = $this->dtgTable->OrderByClause;
			$objClauses[] = $this->dtgTable->LimitClause;
			$this->dtgTable->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}

	SampleForm::Run('SampleForm');
?>
