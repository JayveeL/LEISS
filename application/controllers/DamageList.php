<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DamageList extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('DamageListModel');

	}

	public function addDamageEquipments(){
		$result = $this->DamageListModel->addDamageEquipments();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function getDamageEquipments(){
		
		$result = $this->DamageListModel->getDamageEquipmentList();

		header('Content-Type: application/json');
		echo json_encode($result);

		// echo "hi";
	}

	public function repairEquipments(){
		$result = $this->DamageListModel->repairEquipments();

		header('Content-Type: application/json');
		echo json_encode($result);		
	}
}