<?php

Class HomeModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }


  public function getDataInProgressTransaction(){
  
    $query = $this->db->query("SELECT COUNT(id_transaction) as totData FROM tbl_transaction WHERE status = 'In Progress'");
    return $query->result_array();  

  }


  public function getDataHoTransaction(){
  
    $query = $this->db->query("SELECT COUNT(id_transaction) as totData FROM tbl_transaction WHERE status = 'HO'");
    return $query->result_array();  

  }


  public function getDataPendingTransaction(){
  
    $query = $this->db->query("SELECT COUNT(id_transaction) as totData FROM tbl_transaction WHERE status = 'Pending'");
    return $query->result_array();  

  }



  public function getDataCancelTransaction(){
  
    $query = $this->db->query("SELECT COUNT(id_transaction) as totData FROM tbl_transaction WHERE status = 'Cancel'");
    return $query->result_array();  

  }



   


}