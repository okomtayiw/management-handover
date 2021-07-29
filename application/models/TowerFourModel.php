<?php

Class TowerFourModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerFour(){
  
    $query = $this->db->query("SELECT tbl_std.*,status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_std
    LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
    WHERE tbl_std.ready_ho = 'Sudah siap serah terima'
    ORDER BY tbl_std.id_std ASC");
    return $query->result_array();

  }



  public function getAllDataTowerFourUpdate($idTowerFour){
  
    $query = $this->db->query("SELECT * FROM tbl_std WHERE id_std ='$idTowerFour'");
    return $query->result_array();

  }

    public function deleteAllTowerFour($id){

      $this->db->where_in('id_std', $id);
      $this->db->delete('tbl_std');

      echo $id;
    }



    public function get_current_page_records_twd(){
       
      $query = $this->db->query("SELECT tbl_std.*,tbl_std.penerimaan as name_status_pembayaran FROM tbl_std ORDER BY tbl_std.id_std");
      return $query->result_array();
    }
  
    public function syncroniseData() {
  
      $query = $this->db->query("SELECT * FROM master_data_denda WHERE substring(master_data_denda.unit, 1,3) = 'TRD' AND penerimaan = '100%'");
      return $query->result_array(); 
    } 
  
  
    public function updateSyncroniseTowerD($nameUnit,$penerimaan){
  
  
      $unit = $this->cekUnit($nameUnit);
      
      if($unit != null){
        $idStatusPembayaran = 1;
  
        $this->db->set('id_status_pembayaran', $idStatusPembayaran, FALSE);
        $this->db->where('lantai', $nameUnit);
        $this->db->update('tbl_std');
      } else {
        $data = array(
          'unit'=> $nameUnit,
          'penerimaan' =>$penerimaan
        );
        $this->db->insert('tbl_data_unit', $data);
      }
            
    }
  
  
    public function cekUnit($unit){
      $query = $this->db->query("SELECT lantai as nounit FROM tbl_std WHERE lantai = '$unit'");
      return $query->result_array();
     }

    public function dataTowerD(){
      $query = $this->db->query("SELECT * FROM temp_data WHERE SUBSTRING(`nameUnit`,1,3) = 'TRD'");
      return $query->result_array();
    } 
  
    public function inserData($unit,$owner,$dateTransaction,$dateSerahTerima,$dateGracePeriode,$penerimaan,$denda,$tunggakan){
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
  
  
      $this->db->insert('tbl_std', $data);
    }   
}