<?php

class LaboratoryModel extends CI_Model {
    

    public $labID;
    public $labName;
    public $description;
    
	function __construct(){
        parent::__construct();
    }


   public function addLaboratory(){
        $data = array(
            'labName' => $_POST['labName'],
            'description' => $_POST['description']
        );

        return $this->db->insert('laboratory',$data);
    }

    public function deleteLaboratory(){

        return $this->db->delete('laboratory',array('labID' => $_POST['labID']));
    }

    public function getLaboratories(){

        $list = $this->db->get('laboratory');

        return $list->result();

    }

    public function storeLog(){
        $return = array();
        foreach ($_POST['equipment'] as $equipment) {
            $data = array(
                'studentID' => $_POST['studentID'],
                'labID' => $_POST['labID'],
                'serialNum' => $equipment,
                'action' => $_POST['action']
            );
           $return[] = $this->db->insert('log',$data);
        }
        return $return;
    }    
}
