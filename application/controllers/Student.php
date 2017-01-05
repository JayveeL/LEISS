<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('StudentModel');
	}

	public function addDamage(){
		$result = $this->StudentModel->addDamage();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function addBorrower(){
		$result = $this->StudentModel->addBorrower();

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function checkIDNum(){
		$result = $this->StudentModel->checkIDNum();

		header('Content-Type: application/json');
		echo json_encode($result);	
	}
}