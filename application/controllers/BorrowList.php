<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowList extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('BorrowListModel');
	}

	public function addBorrowedEquipments(){
		$result = $this->BorrowListModel->addBorrowedEquipments();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function getBorrowedEquipments(){
		$result = $this->BorrowListModel->getBorrowedEquipments();

		header('Content-Type: application/json');
		echo json_encode($result);	
	}

	public function returnEquipments(){
		$result = $this->BorrowListModel->returnEquipments();

		header('Content-Type: application/json');
		echo json_encode($result);		
	}
}