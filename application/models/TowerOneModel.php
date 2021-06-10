<?php

Class TowerOneModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerOne(){
  
    $query = $this->db->query("SELECT tbl_cta.*,status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_cta
    LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
    ORDER BY tbl_cta.id_cta ASC");
    return $query->result_array();

  }



  public function getAllDataTowerOneUpdate($idTowerOne){
  
    $query = $this->db->query("SELECT * FROM tbl_cta WHERE id_cta ='$idTowerOne'");
    return $query->result_array();

  }

  public function gatDataIdentitasAddress($idTowerOne){

    $nounit = $this->cekNameUnit($idTowerOne);    
  
    $query = $this->db->query("SELECT * FROM tbl_address WHERE nm_unit ='$nounit' ORDER BY id_address DESC");
    return $query->result_array();


  }

 


  private function cekNameUnit($idTowerOne){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_cta WHERE id_cta = '$idTowerOne'");
    $numberunit = $query->row();
    return $numberunit->nounit;
   }


  public function getAllDataStatusPayment(){
  
    $query = $this->db->query('SELECT * FROM tbl_status_unit ORDER BY id_status_unit ASC');
    return $query->result_array();

  }


    function totDataTowera(){
      return $this->db->count_all("tbl_cta");
    }


    function deleteAllTowerOne($id){

      $this->db->where_in('id_cta', $id);
      $this->db->delete('tbl_cta');

      echo $id;
    }

    function syncroniseData(){

      $query = $this->db->query("SELECT * FROM temp_data");
      return $query->result_array();

    }


    public function get_current_page_records_twa() 
    {
       
        $query = $this->db->query("SELECT tbl_cta.* FROM tbl_cta
        ORDER BY tbl_cta.id_cta ");
        return $query->result_array();  
    }




   


}