<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	// Added by JV
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');     
    }   

	public function loadReports($lab = null, $filter = null){
		$this->load->model('EquipmentModel');
		$this->load->model('BorrowListModel');
		$this->load->model('LaboratoryModel');

		$data['view'] = 'reports';
		$months = array();
		$sem1 = array('Jun', 'Jul', 'Aug', 'Sep', 'Oct');
		$sem2 = array('Nov', 'Dec', 'Jan', 'Feb', 'Mar');

		if($filter != null){
			if($filter == 'juneOct'){
				$months = $sem1;
			}else if($filter == 'novMar'){
				$months = $sem2;
			}else{
				array_push($months, $filter);
			}
		}else{
			if (in_array(date('M'), $sem1)) {
			    for($i = 0; $i < count($sem1); $i++){
			    	if($sem1[$i] != date('M')){
			    		array_push($months, $sem1[$i]);
			    	}else{
			    		array_push($months, date('M'));
			    		break;
			    	}			    	
			    }  
			}else if (in_array(date('M'), $sem2)) {
				for($i = 0; $i < count($sem2); $i++){
			    	if($sem2[$i] != date('M')){
			    		array_push($months, $sem2[$i]);
			    	}else{
			    		array_push($months, date('M'));
			    		break;
			    	}			    	
			    }  
			}
		}
					
		$data['months'] = $months;

		if($lab == 'all'){
			$data['eqpList'] = $this->BorrowListModel->getBorrowedList($months);
			$data['totalItems'] = $this->EquipmentModel->getAllItems($months);
			$data['allItems'] = $this->EquipmentModel->getLogs($months);
			$data['movedItems'] = $this->EquipmentModel->getmovedItems($months);
			$data['logs'] = $this->EquipmentModel->getRecentAction($months);
			$data['logShow'] = 'All';
			$data['labID'] = 'all';
		}else{
			$data['eqpList'] = $this->BorrowListModel->getBorrowedListPerLab($months, $lab);
			$data['totalItems'] = $this->EquipmentModel->getAllLabItems($lab, $months);
			$data['allItems'] = $this->EquipmentModel->getLogsPerLab($lab, $months);
			$data['movedItems'] = $this->EquipmentModel->getmovedItemsPerLab($lab, $months);
			$data['logs'] = $this->EquipmentModel->getRecentActionPerLab($lab, $months);
			$data['logShow'] = 'PerLab';
			$data['labID'] = $lab;
		}
		if($filter != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$this->load->view('reports', $data);
		}
		
	}

	public function storeLog(){
		$this->load->model('LaboratoryModel');

		$result = $this->LaboratoryModel->storeLog();

		header('Content-Type: application/json');
		echo json_encode($result);
	}
	// end
}
