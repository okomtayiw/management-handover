<?php

Class TowerTwoModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }


  public function getAllDataTowerTwoUpdate($idTowerTwo){
  
    $query = $this->db->query("SELECT * FROM tbl_ctb WHERE id_ctb ='$idTowerTwo'");
    return $query->result_array();

  }


  public function gatDataIdentitasAddress($idTowerTwo){

    $nounit = $this->cekNameUnit($idTowerTwo);    
  
    $query = $this->db->query("SELECT * FROM tbl_address WHERE nm_unit ='$nounit' ORDER BY id_address DESC");
    return $query->result_array();


  }


  private function cekNameUnit($id){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_ctb WHERE id_ctb = '$id'");
    $numberunit = $query->row();
    return $numberunit->nounit;
   }





    public function get_current_page_records_twb() 
    {
       
        $query = $this->db->query("SELECT tbl_ctb.* FROM tbl_ctb
        ORDER BY tbl_ctb.id_ctb ");
        return $query->result_array();
  
      
    }

   


   


}