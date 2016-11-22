<?php
	require('../../../qcubed/qcubed.inc.php');

	class SampleForm extends QForm {
		protected $dtgTable;

		protected function Form_Create() {
			$this->dtgTable = new QDataTable($this);
			$this->dtgTable->SetDataBinder('BindData');
			$this->dtgTable->CreateIndexedColumn('Name', 'name');
			$this->dtgTable->CreateIndexedColumn('Height', 'height');
			$this->dtgTable->CreateIndexedColumn('Weight', 'weight');
		}

		protected function BindData() {
			$data[] = array('name' => 'Bob', 'height' => 62, 'weight' => 111);
			$data[] = array('name' => 'Joe', 'height' => 45, 'weight' => 234);
			$data[] = array('name' => 'Sue', 'height' => 54, 'weight' => 134);
			$data[] = array('name' => 'Mike', 'height' => 53, 'weight' => 99);
			$data[] = array('name' => 'Mel', 'height' => 123, 'weight' => 34);
			$data[] = array('name' => 'Greg', 'height' => 57, 'weight' => 109);
			$data[] = array('name' => 'Ruben', 'height' => 46, 'weight' => 343);
			$data[] = array('name' => 'Josiah', 'height' => 60, 'weight' => 120);

			$this->dtgTable->DataSource = $data;
		}
	}

	SampleForm::Run('SampleForm');
?>
