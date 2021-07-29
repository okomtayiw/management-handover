<?php

Class TowerTwoModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }


  public function getDataTowerTwoUpdate($idTowerTwo){
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


  public function get_current_page_records_twb() {
       
    $query = $this->db->query("SELECT tbl_ctb.*,tbl_ctb.penerimaan as name_status_pembayaran FROM tbl_ctb
    ORDER BY tbl_ctb.id_ctb");
    return $query->result_array();
  }



  public function syncroniseData() {

    $query = $this->db->query("SELECT * FROM master_data_denda WHERE substring(master_data_denda.unit, 1,3) = 'TRB' AND penerimaan = '100%'");
    return $query->result_array(); 
  } 


  public function updateSyncroniseTowerB($nameUnit,$penerimaan){


    $unit = $this->cekUnit($nameUnit);
    
    if($unit != null){
      $idStatusPembayaran = 1;

      $this->db->set('id_status_pembayaran', $idStatusPembayaran, FALSE);
      $this->db->where('lantai', $nameUnit);
      $this->db->update('tbl_ctb');
    } else {
      $data = array(
        'unit'=> $nameUnit,
        'penerimaan' =>$penerimaan
      );
      $this->db->insert('tbl_data_unit', $data);
    }
          
  }


  public function cekUnit($unit){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_ctb WHERE lantai = '$unit'");
    return $query->result_array();
   }
   
  public function dataTowerB(){
    $query = $this->db->query("SELECT * FROM temp_data WHERE SUBSTRING(`nameUnit`,1,3) = 'TRB'");
    return $query->result_array();
  } 

   public function inserData($unit,$owner,$dateTransaction,$dateSerahTerima,$dateGracePeriode,$penerimaan, $denda, $tunggakan ){
    $data = array(

      'lantai' => $unit,
      'pemilik' => $owner,
      'tgl_transaksi' => $dateTransaction,
      'tgl_ho_seharusnya' => $dateSerahTerima,
      'grace_periode' => $dateGracePeriode,
      'date_update' => date('Y-m-d'),
      'penerimaan' => $penerimaan,
      'denda' => $denda,
      'tunggakan' => $tunggakan
      
      
    );

    $this->db->insert('tbl_ctb', $data);
  }


  public function updateDataTowerTwo($unit, $owner, $dateTransaction, $idTowerTwo){
    $data = array(
      'tgl_transaksi' => $dateTransaction,
      'pemilik'  => $owner,
      'lantai'  => $unit
    );

    $this->db->where('id_ctb', $idTowerTwo);
    $this->db->update('tbl_ctb', $data);
  }

}