<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratory extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('LaboratoryModel');
	}

	public function addLab(){
		$result = $this->LaboratoryModel->addLaboratory();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function getLabList(){
		$result = $this->LaboratoryModel->getLaboratories();

		header('Content-Type: application/json');
		echo json_encode($result);	
	}

	public function deleteLab(){
		$result = $this->LaboratoryModel->deleteLaboratory();

		header('Content-Type: application/json');
		echo json_encode($result);		
	}
}