<?php

Class TowerOneModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
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


  function deleteAllTowerOne($id){

      $this->db->where_in('id_cta', $id);
      $this->db->delete('tbl_cta');

      echo $id;
    }



  public function get_current_page_records_twa() 
    {
       
        $query = $this->db->query("SELECT tbl_cta.*,tbl_cta.penerimaan as name_status_pembayaran FROM tbl_cta ORDER BY tbl_cta.id_cta");
        return $query->result_array();  
    }

  public function syncroniseData() {

    $query = $this->db->query("SELECT * FROM master_data_denda WHERE substring(master_data_denda.unit, 1,4) = 'TRAK' AND penerimaan = '100%'");
    return $query->result_array(); 
  } 


  public function updateSyncroniseTowerA($nameUnit,$penerimaan){


    $unit = $this->cekUnit($nameUnit);
    
    if($unit != null){
      $idStatusPembayaran = 1;

      $this->db->set('id_status_pembayaran', $idStatusPembayaran, FALSE);
      $this->db->where('lantai', $nameUnit);
      $this->db->update('tbl_cta');
    } else {
      $data = array(
        'unit'=> $nameUnit,
        'penerimaan' =>$penerimaan
      );
      $this->db->insert('tbl_data_unit', $data);
    }
          
  }


  public function cekUnit($unit){
    $query = $this->db->query("SELECT lantai as nounit FROM tbl_cta WHERE lantai = '$unit'");
    return $query->result_array();
   }

  public function dataTowerA(){
    $query = $this->db->query("SELECT * FROM temp_data WHERE SUBSTRING(`nameUnit`,1,3) = 'TRA'");
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

    $this->db->insert('tbl_cta', $data);
  }

}