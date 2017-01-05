<?php

class StudentModel extends CI_Model {
    

    public $studentID;
    public $studentName;
    
    
	function __construct(){
        parent::__construct();
    }


    public function addBorrower(){
        $this->studentID = $_POST['bidnum'];
        $this->studentName = $_POST['bname'];
        
        return $this->db->insert('student',$this);
    }

    public function addDamage(){
        $this->studentID = $_POST['damagerID'];
        $this->studentName = $_POST['damagerName'];

        return $this->db->insert('student',$this);
    }

    public function checkIDNum(){
        $studentID = $_POST['studentID'];

        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('studentID', $studentID);

        return $this->db->get()->result_array();
    }
}
