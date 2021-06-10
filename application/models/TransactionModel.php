<?php

Class TransactionModel extends CI_Model{
  public function __construct()
  {
    $this->load->database();
  }

  public function getAllDataTransaction(){
  
    $query = $this->db->query("SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_cta b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit 
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ctb b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stc b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_std b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ste b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stf b ON a.id_unit = b.lantai
    WHERE b.lantai = a.id_unit");
    return $query->result_array();

  }

  public function getDataTransaction($idTransaction){
    $query = $this->db->query("SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_cta b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'
    UNION
    SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ctb b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'
    UNION
    SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stc b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'
    UNION
    SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_std b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'
    UNION
    SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ste b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'
    UNION
    SELECT substring(b.lantai,3,1) as tower,a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.id_transaction_detail, c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik,c.no_kwh_air,c.start_kwh_air FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stf b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE  b.lantai = a.id_unit AND a.id_transaction = '$idTransaction'");
    return $query->result_array();

  }

  public function getAllDataUnitA(){
    $query = $this->db->query("SELECT * FROM tbl_cta  ");
    return $query->result_array();
  }

  public function getAllDataUnitB(){
    $query = $this->db->query("SELECT * FROM tbl_ctb  ");
    return $query->result_array();
  }

  public function getAllDataUnitC(){
    $query = $this->db->query("SELECT * FROM tbl_stc  ");
    return $query->result_array();
  }

  public function getAllDataUnitD(){
    $query = $this->db->query("SELECT * FROM tbl_std ");
    return $query->result_array();
  }

  public function getAllDataUnitE(){
    $query = $this->db->query("SELECT * FROM tbl_ste  ");
    return $query->result_array();
  }

  public function getAllDataUnitF(){
    $query = $this->db->query("SELECT * FROM tbl_stf  ");
    return $query->result_array();
  }


  public function getDataFileUpload($nounit){
    $query = $this->db->query("SELECT * FROM tbl_fileupload WHERE nounit = '$nounit' ORDER BY id_fileupload DESC");
    return $query->result_array();
  }


  public function saveUpload($title,$nounit,$image,$fileSize){
      $data = array(
              'title' => $title,
              'nounit' => $nounit,
              'image' => $image,
              'fileSize' => $fileSize
          );  
      $result= $this->db->insert('tbl_fileupload',$data);
      return $result;
  }


  public function deleteDataFileUpload($idFileUpload){

    $this->db->where_in('id_fileupload', $idFileUpload);
    $this->db->delete('tbl_fileupload');	 
   
  }




}