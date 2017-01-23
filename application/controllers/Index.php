<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	// Added by JV
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');     
    }   

	public function index(){
		$this->load->view('index');
	}

	public function loadIframe($frame = null, $labID = null){
		$this->load->model('EquipmentModel');
		$this->load->model('BorrowListModel');
		$this->load->model('LaboratoryModel');

		switch ($frame){
			case 'all': 
				$data['view'] = 'allLaboratories';
				$data['equipList'] = $this->EquipmentModel->getAllEquipments();
				$this->load->view('allLaboratories', $data); break;
			case 'lab': 
				$data['view'] = 'lab';
				$data['equipList'] = $this->EquipmentModel->getEquipmentList($labID);
				$this->load->view('lab', $data); break;
			case 'reports':
				$data['view'] = 'reportPage';
				$data['labList'] = $this->LaboratoryModel->getLaboratories();
				$this->load->view('reportPage', $data); break;	
		}
	}
	// end
}
