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
        $data = array('isDeleted' => 1);
        return $this->db->where('labID', $_POST['labID'])->update('laboratory', $data);
    }

    public function getLaboratories(){

        $list = $this->db->where('isDeleted', 0)->get('laboratory');

        return $list->result();

    }

    public function storeLog(){
        $return = array();
        foreach ($_POST['equipment'] as $equipment) {
            $this->db->select('labName');
            $this->db->where('labID', $_POST['labID']);
            $query = $this->db->get('laboratory');
            $lab = $query->result()[0]->labName;

            $data = array(
                'studentID' => $_POST['studentID'],
                'labID' => $lab,
                'serialNum' => $equipment,
                'action' => $_POST['action']
            );
           $return[] = $this->db->insert('log',$data);
        }
        return $return;
    }    
}
