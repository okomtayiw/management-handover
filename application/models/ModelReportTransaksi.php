<?php

Class ModelReportTransaksi extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }


  public function getReport(){
  
      
    $query = $this->db->query("SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.status_defect,c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description  FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_cta b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit 
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik,c.status_defect , c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description  FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ctb b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.status_defect , c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description  FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stc b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.status_defect, c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description  FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_std b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.status_defect, c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description   FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_ste b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit
    UNION 
    SELECT a.id_transaction,a.number_trans, a.tgl_hand_over, a.status, b.lantai, b.pemilik, c.status_defect , c.tot_defect,c.tiar_tenant, c.no_kwh_listrik, c.start_kwh_listrik, c.no_kwh_air, c.start_kwh_air, c.description  FROM tbl_transaction as a
    LEFT OUTER JOIN tbl_stf b ON a.id_unit = b.lantai
    LEFT OUTER JOIN tbl_transaction_detail c ON a.id_transaction = c.id_transaction
    WHERE b.lantai = a.id_unit");
    return $query->result_array();

  }




   


}