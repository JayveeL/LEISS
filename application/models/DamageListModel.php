<?php

class DamageListModel extends CI_Model {
    

    public $damagerIDNum;
    public $labID;
    public $compSerialNum;
    public $eqpSerialNum;
    public $teacher;
    
	function __construct(){
        parent::__construct();
    }


    public function addDamageEquipments(){
        $return = array();
        foreach ($_POST['equipment'] as $equipment) {
          $this->db->select('eqpSerialNum');
          $this->db->from('equipment');
          $this->db->where('eqpSerialNum', $equipment);
          $result = $this->db->get()->result_array();
          if(count($result) == 0){
             $this->compSerialNum = $equipment;
          }else{
             $this->eqpSerialNum = $equipment;
          }
           $this->damagerIDNum = $_POST['damagerID']; 
           $this->labID = $_POST['labID'];
           $this->teacher = $_POST['damagerTeacher'];
           $return[] = $this->db->insert('damaged_list',$this);
        }
        return $return;
    }

    public function getDamageEquipmentList(){

      $labID=$_POST['labID'];
      $this->db->select("D.compSerialNum, D.eqpSerialNum, D.dateReported, E.eqpName, C.compName");
      $this->db->from('damaged_list D');
      $this->db->join('equipment E', 'E.eqpSerialNum = D.eqpSerialNum', 'left');
      $this->db->join('component C', 'C.compSerialNum = D.compSerialNum', 'left');
      $this->db->where('D.labID',  $_POST['labID']);
      $result = $this->db->get()->result_array();

      return $result;

      // $list = $this->db->get('damaged_list');
      // return $list->result();
    }

     public function repairEquipments(){
        $result = array();
        foreach ($_POST['equipment'] as $equipment) {
            $this->db->from('damaged_list');
            $where = 'eqpSerialNum = '.$equipment.' OR compSerialNum = '.$equipment.'';
            $this->db->where($where);
            $result[] = $this->db->delete();    
        }
        return $result;
    }
}
