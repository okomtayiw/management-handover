<?php

Class TowerTreeModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }

  public function getDataTowerTreeUpdate($idTowerTree){
    $query = $this->db->query("SELECT * FROM tbl_stc WHERE id_stc ='$idTowerTree'");
    return $query->result_array();

  }

  public function gatDataIdentitasAddress($idTowerTree){
    $nounit = $this->cekNameUnit($idTowerTree);    
    $query = $this->db->query("SELECT * FROM tbl_address WHERE nm_unit ='$nounit' ORDER BY id_address DESC");
    return $query->result_array();
  }


  private function cekNameUnit($id){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_stc WHERE id_stc = '$id'");
    $numberunit = $query->row();
    return $numberunit->nounit;
   }


  public function get_current_page_records_twc(){
       
    $query = $this->db->query("SELECT tbl_stc.*,tbl_stc.penerimaan as name_status_pembayaran FROM tbl_stc ORDER BY tbl_stc.id_stc");
    return $query->result_array();
  }

  public function syncroniseData() {

    $query = $this->db->query("SELECT * FROM master_data_denda WHERE substring(master_data_denda.unit, 1,3) = 'TRC' AND penerimaan = '100%'");
    return $query->result_array(); 
  } 


  public function updateSyncroniseTowerC($nameUnit,$penerimaan){


    $unit = $this->cekUnit($nameUnit);
    
    if($unit != null){
      $idStatusPembayaran = 1;

      $this->db->set('id_status_pembayaran', $idStatusPembayaran, FALSE);
      $this->db->where('lantai', $nameUnit);
      $this->db->update('tbl_stc');
    } else {
      $data = array(
        'unit'=> $nameUnit,
        'penerimaan' =>$penerimaan
      );
      $this->db->insert('tbl_data_unit', $data);
    }
          
  }


  public function cekUnit($unit){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_stc WHERE lantai = '$unit'");
    return $query->result_array();
   }

  public function dataTowerC(){
    $query = $this->db->query("SELECT * FROM temp_data WHERE SUBSTRING(`nameUnit`,1,3) = 'TRC'");
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

    $this->db->insert('tbl_stc', $data);
  } 

}