<?php

class EquipmentModel extends CI_Model {

    public $eqpName;
    public $eqpSerialNum;
    public $price;
    public $compName;
    public $compSerialNum;
    public $compPrice;

    function __construct(){
        parent::__construct();
    }

    public function getAllEquipments(){
        $return = array();

        $this->db->select('count(*) as "quantity", eqpName');
        $this->db->from('equipment');
        $this->db->group_by('eqpName'); 
        $return[] =  $this->db->get()->result_array();

        $this->db->select('count(*) as "quantity", compName');
        $this->db->from('component');
        $this->db->group_by('compName'); 
        $return[] = $this->db->get()->result_array();

        return $return;


    }

    public function addEquipment(){
        $data = array(
            'eqpName' => $_POST['eqpName'],
            'eqpSerialNum' => $_POST['eqpSerialNum'],
            'labID' => $_POST['labID'],  
            'price' => $_POST['eqpPrice']
        );

        return $this->db->insert('equipment',$data);
    }

    public function addEquipmentComp(){
        $data = array(
            'compName' => $_POST['compName'],
            'compSerialNum' => $_POST['compSerialNum'],
            'labID' => $_POST['labID'],                        
            'price' => $_POST['compPrice']
        );

        return $this->db->insert('component',$data);
    }

    public function getEquipmentList($labID){
        $result = array();

        $this->db->select('*');
        $this->db->from('laboratory');
        $this->db->where('labID', $labID);
        $result[] = $this->db->get()->result_array();

        $this->db->select('eqp.*');
        $this->db->from('laboratory lab');
        $this->db->join('equipment eqp', 'eqp.labID = lab.labID', 'left');
        $this->db->where('eqp.labID', $labID);
        $this->db->order_by('dateAdded', 'DESC');
        $result[] = $this->db->get()->result_array();

        $this->db->select('comp.*');
        $this->db->from('laboratory labb');
        $this->db->join('component comp', 'comp.labID = labb.labID', 'left');
        $this->db->where('comp.labID', $labID);
        $this->db->order_by('dateAdded', 'DESC');
        $result[] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('laboratory');
        $this->db->where('labID != '.$labID);
        $result[] = $this->db->get()->result_array();

        $this->db->select('eqpSerialNum');
        $this->db->from('equipment');
        $this->db->where('labID='.$labID.' and eqpSerialNum NOT IN (SELECT eqpSerialNum FROM borrowed_list where eqpSerialNum IS NOT NULL) and eqpSerialNum NOT IN (SELECT eqpSerialNum FROM damaged_list where eqpSerialNum IS NOT NULL)');
        $result[] = $this->db->get()->result_array();

        $this->db->select('compSerialNum');
        $this->db->from('component');
        $this->db->where('labID='.$labID.' and (compSerialNum NOT IN (SELECT compSerialNum FROM borrowed_list where compSerialNum IS NOT NULL) and compSerialNum NOT IN (SELECT compSerialNum FROM damaged_list where compSerialNum IS NOT NULL))');
        $result[] = $this->db->get()->result_array();

        return $result;
    }

    public function getLabEquipmentList(){

        $labID = $_POST['labID'];

        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where('labID', $labID);
        
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getEquipments(){
        $filter = $_POST['search'];
        $equipmentList = array();

        $this->db->select('eqpSerialNum, eqpName');
        $this->db->from('equipment');

        if($_POST['labID']){
            $this->db->where('labID',$_POST['labID']);
        }else{ }

        if($_POST['labID'] && $filter == 'available'){
            $this->db->where('labID='.$_POST['labID'].' and eqpSerialNum NOT IN (SELECT eqpSerialNum FROM borrowed_list where eqpSerialNum IS NOT NULL) and eqpSerialNum NOT IN (SELECT eqpSerialNum FROM damaged_list where eqpSerialNum IS NOT NULL)');
        }

        $list = $this->db->get()->result_array();
        
        foreach ($list as $key) {
            $equipmentList[] = $key['eqpSerialNum']." - ".$key['eqpName'];
        }

        $this->db->select('compSerialNum, compName');
        $this->db->from('component');

        if($_POST['labID']){
            $this->db->where('labID',$_POST['labID']);
        }else{ }

        if($_POST['labID'] && $filter == 'available'){
            $this->db->where('labID='.$_POST['labID'].' and compSerialNum NOT IN (SELECT compSerialNum FROM borrowed_list where compSerialNum IS NOT NULL) and compSerialNum NOT IN (SELECT compSerialNum FROM damaged_list where compSerialNum IS NOT NULL)');
        }

        $list = $this->db->get()->result_array();
        
        foreach ($list as $key) {
            $equipmentList[] = $key['compSerialNum']." - ".$key['compName'];
        }


        return $equipmentList;
    }

    public function getEquipmentsList(){
        $equipmentList = array();

        $this->db->select('eqpSerialNum, eqpName');
        $this->db->from('equipment');
        $list = $this->db->get()->result_array();
       
        foreach ($list as $key) {
            $equipmentList[] = $key['eqpSerialNum']." - ".$key['eqpName'];
        }

        $this->db->select('compSerialNum, compName');
        $this->db->from('component');
        $list = $this->db->get()->result_array();
        foreach ($list as $key) {
            $equipmentList[] = $key['compSerialNum']." - ".$key['compName'];
        }

        return $equipmentList;
    }

    public function searchEquipment(){
        $this->db->select('*');
        $this->db->from('equipment');
        $searchThis = array('eqpSerialNum' => $_POST['equipmentSerialNum'], 'eqpName' => $_POST['equipmentName']);
        $this->db->where($searchThis);
        $result = $this->db->get()->result_array();
        
        if(count($result) == 0){
            $this->db->select('compSerialNum as "eqpSerialNum", compName as "eqpName", price');
            $this->db->from('component');
            $searchThis = array('compSerialNum' => $_POST['equipmentSerialNum'], 'compName' => $_POST['equipmentName']);
            $this->db->where($searchThis);
            $result = $this->db->get()->result_array();
        }

        return $result;
    }

     public function searchEquipmentAll(){
        $this->db->select('count(*) as "quantity", eqpName');
        $this->db->from('equipment');
        $searchThis = array('eqpSerialNum' => $_POST['equipmentSerialNum'], 'eqpName' => $_POST['equipmentName']);
        $this->db->where($searchThis);
        $result = $this->db->get()->result_array();

        if($result[0]['quantity'] == 0){
            $this->db->select('count(*) as "quantity", compName as "eqpName"');
            $this->db->from('component');
            $searchThis = array('compSerialNum' => $_POST['equipmentSerialNum'], 'compName' => $_POST['equipmentName']);
            $this->db->where($searchThis);
            $result = $this->db->get()->result_array();
        }
        return $result;
    }

    public function getAvailableEquipments(){
        $result = array();

        $labID = $_POST['labID'];
        $where= "labID =".$labID." AND eqpSerialNum NOT IN (SELECT eqpSerialNum FROM damaged_list where eqpSerialNum IS NOT NULL) AND eqpSerialNum NOT IN (SELECT eqpSerialNum FROM borrowed_list where eqpSerialNum IS NOT NULL)";
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where($where);
        
        $result[] = $this->db->get()->result_array();

        $where2 = 'labID='.$labID.' and (compSerialNum NOT IN (SELECT compSerialNum FROM borrowed_list where compSerialNum IS NOT NULL) and compSerialNum NOT IN (SELECT compSerialNum FROM damaged_list where compSerialNum IS NOT NULL))';
        $this->db->select('compSerialNum as "eqpSerialNum", compName as "eqpName", price');
        $this->db->from('component');
        $this->db->where($where2);

        $result[] = $this->db->get()->result_array();

        return $result;
    }

    public function getEquipmentDetails(){
        $equipment = $_POST['equipmentSerialNum'];

        $this->db->select('eqpSerialNum as "serialNum", eqpName as "name", price as "price"');
        $this->db->from('equipment');
        $this->db->where('eqpSerialNum', $equipment);
        $result = $this->db->get()->result_array();
        if($result){

        }else{
            $this->db->select('compSerialNum as "serialNum", compName as "name", price as "price"');
            $this->db->from('component');
            $this->db->where('compSerialNum', $equipment);
            $result = $this->db->get()->result_array();
        }

        return $result;
    }

    public function updateEquipment(){
        $this->db->where('eqpSerialNum', $_POST['eqpSerialNum']);
        $query = $this->db->get('equipment');
        if ($query->num_rows() > 0){
            $data = array(
                'eqpName' => $_POST['eqpName'],
                'eqpSerialNum' => $_POST['eqpSerialNum'], 
                'price' => $_POST['eqpPrice']
            );
            $this->db->where('eqpSerialNum', $_POST['eqpSerialNum']);
            return $this->db->update('equipment', $data);
        }
        else{
            $data = array(
                'compName' => $_POST['eqpName'],
                'compSerialNum' => $_POST['eqpSerialNum'],                      
                'price' => $_POST['eqpPrice']
            );
             $this->db->where('compSerialNum', $_POST['eqpSerialNum']);
             return $this->db->update('component', $data);
        }
    }

    public function getEquipmentHistory(){
        $eqpSerial = $_POST['equipmentSerialNum'];
        $result;

        $this->db->select('l.*, S.studentID, S.studentName');
        $this->db->from('log l');
        $this->db->join('student S', 'S.studentID = l.studentID', 'left');       
        // $this->db->join('laboratory lab', 'lab.labID = l.labID', 'left');
        // $this->db->join('equipment e', 'e.eqpSerialNum = l.serialNum', 'left');
        $this->db->where('l.serialNum', $eqpSerial);
        $this->db->order_by('l.date', 'DESC');
        $result = $this->db->get()->result_array();

        return $result;
    }

    public function getAllItems(){
        $total = 0;

        $this->db->select('count(*) as "totalEqp"');
        $query = $this->db->get('equipment');
        $total += intval($query->result()[0]->totalEqp);

        $this->db->select('count(*) as "totalComp"');
        $query = $this->db->get('component');
        $total += intval($query->result()[0]->totalComp);

        return $total;
    }

    public function getAllLabItems($lab = null){
        $total = 0;

        $this->db->select('count(*) as "totalEqp"');
        $this->db->where('labID', $lab);
        $query = $this->db->get('equipment');
        $total += intval($query->result()[0]->totalEqp);

        $this->db->select('count(*) as "totalComp"');
        $this->db->where('labID', $lab);
        $query = $this->db->get('component');
        $total += intval($query->result()[0]->totalComp);

        return $total;
    }

    public function getLogs(){
        $data = 0;

        $this->db->select('count("dListID") as "damagedItems"');
        $query = $this->db->get('damaged_list');
        if ($query->num_rows() > 0){
            $data += intval($query->result()[0]->damagedItems);
        }
        return $data;
    }

    public function getLogsPerLab($lab= null){
        $data = 0;

        $this->db->select('count("dListID") as "damagedItems"');
        $this->db->where('labID', $lab);
        $query = $this->db->get('damaged_list');
        if ($query->num_rows() > 0){
            $data += intval($query->result()[0]->damagedItems);
        }
        return $data;
    }

    public function getmovedItems(){
        $total = 0;

        $this->db->select('SUM(move) as "items"');
        $query = $this->db->get('equipment');
        $total += intval($query->result()[0]->items);

        $this->db->select('SUM(move) as "items"');
        $query = $this->db->get('component');
        $total += intval($query->result()[0]->items);

        return $total;
    }

    public function getmovedItemsPerLab($lab = null){
        $total = 0;

        $this->db->select('SUM(move) as "items"');
        $this->db->where('labID', $lab);
        $query = $this->db->get('equipment');
        $total += intval($query->result()[0]->items);

        $this->db->select('SUM(move) as "items"');
        $this->db->where('labID', $lab);
        $query = $this->db->get('component');
        $total += intval($query->result()[0]->items);

        return $total;
    }

    public function moveItems(){
        $return = array();
        foreach ($_POST['items'] as $item) {
            $serialNum = $item;
            $this->db->where('eqpSerialNum', $serialNum);
            $query = $this->db->get('equipment');
            if ($query->num_rows() > 0){
               $this->db->where('eqpSerialNum', $serialNum);
               $this->db->set('labID', $_POST['newLab']);
               $this->db->set('move', 'move+1', FALSE);
               $return[] = $this->db->update('equipment');
            }
            else{
                $this->db->where('compSerialNum', $serialNum);
                $this->db->set('labID', $_POST['newLab']);
                $this->db->set('move', 'move+1', FALSE);                
                $return[] = $this->db->update('component');
            }
        }
        return $return;
    }

    public function getRecentAction(){
        $this->db->select('l.*, e.eqpName, S.studentID, S.studentName');
        $this->db->from('log l');
        $this->db->join('student S', 'S.studentID = l.studentID', 'left');
        // $this->db->join('laboratory lab', 'lab.labID = l.labID', 'left');
        $this->db->join('equipment e', 'e.eqpSerialNum = l.serialNum', 'left');
        $this->db->order_by('l.date', 'DESC');
        // $this->db->where('l.serialNum', $eqpSerial);
        return $this->db->get()->result_array();
    }

    public function getRecentActionPerLab($lab = null){
        $this->db->select('laboratory.labName as "labName"');
        $this->db->where('laboratory.labID', $lab);
        $query = $this->db->get('laboratory');
        $labName = $query->result()[0]->labName;

        $this->db->select('l.*, e.eqpName, S.studentID, S.studentName');
        $this->db->from('log l');   
        $this->db->join('student S', 'S.studentID = l.studentID', 'left');
        // $this->db->join('laboratory lab', 'lab.labID = l.labID', 'left');
        $this->db->join('equipment e', 'e.eqpSerialNum = l.serialNum', 'left');
        $this->db->where('l.labID', $labName);
        $this->db->order_by('l.date', 'DESC');
        return $this->db->get()->result_array();
    }
    // end
}
