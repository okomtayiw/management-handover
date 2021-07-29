<?php

Class AlltowerModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
    $models = array(
        'TowerOneModel' => 'TowerOneModel',
        'TowerTwoModel' => 'TowerTwoModel',
        'TowerTreeModel' => 'TowerTreeModel',
        'TowerFourModel' => 'TowerFourModel',
        'TowerFiveModel' => 'TowerFivwModel',
        'TowerSixModel' => 'TowerSixModel'
    );
    $this->load->model($models);
  }

  /* address all tower view --> */
  public function saveUpdateDataAddress($nmAddress,$noTelp,$nmUnit, $idAddres){

    $data = array(
      'name_address' => $nmAddress,
      'no_telephone' => $noTelp,
      'nm_unit' => $nmUnit
    );


    $this->db->where('id_address', $idAddres);
    $this->db->update('tbl_address', $data);

  }

  public function saveAddDataAddress($nmAddress,$noTelp,$nmUnit){

    $data = array(
      'name_address' => $nmAddress,
      'no_telephone' => $noTelp,
      'nm_unit' => $nmUnit
    );
    $this->db->insert('tbl_address', $data);

  }

  public function deleteDataAddress($idAddress){

    $this->db->where_in('id_address', $idAddress);
    $this->db->delete('tbl_address');	

  }


  public function allDataUnitLevel5($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 05 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel6($month, $year,$tower){


    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 06 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }

  public function allDataUnitLevel7($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 07 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel8($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 08 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel9($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 09 AND id_status_pembayaran = 1");
      return $query->result_array();  


  }

    

  }

  public function allDataUnitLevel10($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 10 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel11($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 11 AND id_status_pembayaran = 1");
      return $query->result_array();  


  }

    

  }

  public function allDataUnitLevel12($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 12 AND id_status_pembayaran = 1");
      return $query->result_array();  

    
    }
  }

  public function allDataUnitLevel13($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 13 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel15($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 15 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel16($month, $year,$tower){


    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 16 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel17($month, $year,$tower){

    if($month != null AND $year !=null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 17 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel18($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 18 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }

  public function allDataUnitLevel19($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 19 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }


  public function allDataUnitLevel20($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 20 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel21($month, $year,$tower){


    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 21 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }


  public function allDataUnitLevel22($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 22 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }


  public function allDataUnitLevel23($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 23 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }


  public function allDataUnitLevel24($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 24 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel25($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 25 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel26($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 26 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }
    

  }


  public function allDataUnitLevel27($month, $year,$tower){


    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 27 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }
    

  }


  public function allDataUnitLevel28($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 28 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel29($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 29 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel30($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 30 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }
    

  }


  public function allDataUnitLevel31($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 31 AND id_status_pembayaran = 1");
      return $query->result_array();  


  }

    

  }


  public function allDataUnitLevel32($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){
    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 32 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }

  public function allDataUnitLevel33($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 33 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }

    

  }

  public function allDataUnitLevel34($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 34 AND id_status_pembayaran = 1");
      return $query->result_array();  
    }
    

  }


  public function allDataUnitLevel35($month, $year,$tower){
    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 35 AND id_status_pembayaran = 1");
      return $query->result_array();  

    
  }
  }


  public function allDataUnitLevel36($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 36 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }

  public function allDataUnitLevel37($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 37 AND id_status_pembayaran = 1");
      return $query->result_array();  
  }
    

  }


  public function allDataUnitLevel38($month, $year,$tower){

    if($month != null AND $year != null AND $tower != null){

    if($tower == 1) {
      $tbl = 'tbl_cta';
    } else if ($tower == 2){
      $tbl = 'tbl_ctb';
    } else if ($tower == 3){
      $tbl = 'tbl_stc';
    } else if ($tower == 4){
      $tbl = 'tbl_std';
    } else if ($tower == 5){
      $tbl = 'tbl_ste';
    } else if ($tower == 6){
      $tbl = 'tbl_stf';
    }

      $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 38 AND id_status_pembayaran = 1");
      return $query->result_array();  

  }

    

  }


  public function allDataUnitLevel39($month, $year,$tower){

      if($month != null AND $year != null AND $tower != null){

      if($tower == 1) {
        $tbl = 'tbl_cta';
      } else if ($tower == 2){
        $tbl = 'tbl_ctb';
      } else if ($tower == 3){
        $tbl = 'tbl_stc';
      } else if ($tower == 4){
        $tbl = 'tbl_std';
      } else if ($tower == 5){
        $tbl = 'tbl_ste';
      } else if ($tower == 6){
        $tbl = 'tbl_stf';
      }

        $query = $this->db->query("SELECT GROUP_CONCAT(`lantai`) as lantai, count(`lantai`) as sumData FROM $tbl
        WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 39 AND id_status_pembayaran = 1");
        return $query->result_array();  
    }
    

  }

  public function allDataUnitFromMarketing(){

    $query = $this->db->query("SELECT * FROM master_data_marketing WHERE tower = 6");
    return $query->result_array();  

  }


  public function inputDataTower($unit,$owner,$dateTransaction,$dateSerahTerima,$dateGracePeriode){
    $data = array(

      'lantai' => $unit,
      'pemilik' => $owner,
      'tgl_transaksi' => $dateTransaction,
      'tgl_ho_seharusnya' => $dateSerahTerima,
      'grace_periode' => $dateGracePeriode,
      'date_update' => date('Y-m-d')
      
    );


    $unit = $this->TowerSixModel->cekUnit($unit);
    if($unit == null ) {
      $this->db->insert('tbl_stf', $data);
    } 
 
  }


  public function totGracePeriodeA(){

    $query = $this->db->query("SELECT COUNT(tbl_cta.id_cta) as tot  FROM tbl_cta
    WHERE MONTH(tbl_cta.grace_periode) = 9 AND YEAR(tbl_cta.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_cta.id_cta) as tot  FROM tbl_cta
    WHERE MONTH(tbl_cta.grace_periode) = 10 AND YEAR(tbl_cta.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_cta.id_cta) as tot  FROM tbl_cta
    WHERE MONTH(tbl_cta.grace_periode) = 11 AND YEAR(tbl_cta.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_cta.id_cta) as tot  FROM tbl_cta
    WHERE MONTH(tbl_cta.grace_periode) = 12 AND YEAR(tbl_cta.grace_periode) = 2021");
    return $query->result_array();  

  }

  public function totGracePeriodeB(){

    $query = $this->db->query("SELECT COUNT(tbl_ctb.id_ctb) as tot  FROM tbl_ctb
    WHERE MONTH(tbl_ctb.grace_periode) = 9 AND YEAR(tbl_ctb.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ctb.id_ctb) as tot  FROM tbl_ctb
    WHERE MONTH(tbl_ctb.grace_periode) = 10 AND YEAR(tbl_ctb.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ctb.id_ctb) as tot  FROM tbl_ctb
    WHERE MONTH(tbl_ctb.grace_periode) = 11 AND YEAR(tbl_ctb.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ctb.id_ctb) as tot  FROM tbl_ctb
    WHERE MONTH(tbl_ctb.grace_periode) = 12 AND YEAR(tbl_ctb.grace_periode) = 2021");
    return $query->result_array();  

  }


  public function totGracePeriodeC(){

    $query = $this->db->query("SELECT COUNT(tbl_stc.id_stc) as tot  FROM tbl_stc
    WHERE MONTH(tbl_stc.grace_periode) = 9 AND YEAR(tbl_stc.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stc.id_stc) as tot  FROM tbl_stc
    WHERE MONTH(tbl_stc.grace_periode) = 10 AND YEAR(tbl_stc.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stc.id_stc) as tot  FROM tbl_stc
    WHERE MONTH(tbl_stc.grace_periode) = 11 AND YEAR(tbl_stc.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stc.id_stc) as tot  FROM tbl_stc
    WHERE MONTH(tbl_stc.grace_periode) = 12 AND YEAR(tbl_stc.grace_periode) = 2021");
    return $query->result_array();  

  }

  public function totGracePeriodeD(){

    $query = $this->db->query("SELECT COUNT(tbl_std.id_std) as tot  FROM tbl_std
    WHERE MONTH(tbl_std.grace_periode) = 9 AND YEAR(tbl_std.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_std.id_std) as tot  FROM tbl_std
    WHERE MONTH(tbl_std.grace_periode) = 10 AND YEAR(tbl_std.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_std.id_std) as tot  FROM tbl_std
    WHERE MONTH(tbl_std.grace_periode) = 11 AND YEAR(tbl_std.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_std.id_std) as tot  FROM tbl_std
    WHERE MONTH(tbl_std.grace_periode) = 12 AND YEAR(tbl_std.grace_periode) = 2021");
    return $query->result_array();  

  }

  public function totGracePeriodeE(){

    $query = $this->db->query("SELECT COUNT(tbl_ste.id_ste) as tot  FROM tbl_ste
    WHERE MONTH(tbl_ste.grace_periode) = 9 AND YEAR(tbl_ste.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ste.id_ste) as tot  FROM tbl_ste
    WHERE MONTH(tbl_ste.grace_periode) = 10 AND YEAR(tbl_ste.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ste.id_ste) as tot  FROM tbl_ste
    WHERE MONTH(tbl_ste.grace_periode) = 11 AND YEAR(tbl_ste.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_ste.id_ste) as tot  FROM tbl_ste
    WHERE MONTH(tbl_ste.grace_periode) = 12 AND YEAR(tbl_ste.grace_periode) = 2021");
    return $query->result_array();  

  }

  public function totGracePeriodeF(){

    $query = $this->db->query("SELECT COUNT(tbl_stf.id_stf) as tot  FROM tbl_stf
    WHERE MONTH(tbl_stf.grace_periode) = 9 AND YEAR(tbl_stf.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stf.id_stf) as tot  FROM tbl_stf
    WHERE MONTH(tbl_stf.grace_periode) = 10 AND YEAR(tbl_stf.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stf.id_stf) as tot  FROM tbl_stf
    WHERE MONTH(tbl_stf.grace_periode) = 11 AND YEAR(tbl_stf.grace_periode) = 2021
    UNION
    SELECT COUNT(tbl_stf.id_stf) as tot  FROM tbl_stf
    WHERE MONTH(tbl_stf.grace_periode) = 12 AND YEAR(tbl_stf.grace_periode) = 2021");
    return $query->result_array();  

  }


  public function allDataUnitFromPayment(){

    $query = $this->db->query("SELECT * FROM master_data_denda");
    return $query->result_array();  

  }

  public function inputDataUnitDifferent($unit,$penerimaan){
    $data = array(

      'unit' => $unit,
      'penerimaan' => $penerimaan
      
    );
      
      $unit = $this->AlltowerModel->cekUnit($unit);
      if($unit == null ) {
        $this->db->insert('tbl_data_unit', $data);
      } 
 
  }


  public function cekUnit($unit){
    $query = $this->db->query("SELECT unit as nounit FROM master_data_marketing WHERE unit = '$unit'");
    return $query->result_array();
   }



  public function allDataUnitFromPaymentMonth(){

    $query = $this->db->query("SELECT * FROM master_data_denda WHERE penerimaan = 100 AND SUBSTRING(unit,1,3) = 'TRF'");
    return $query->result_array();  

  }


  public function inputDataUnitDifferentPenerimaan($unit){
      $data = array(
        'unit' => $unit    
      );
      $penerimaan = $this->AlltowerModel->cekUnitPenerimaan($unit);
      if($penerimaan != null) {
        foreach ($penerimaan as $row){
          if($row['penerimaan'] < 100 ) {
            $this->db->insert('tbl_data_unit', $data);
          } 
        }
      }
  }


  public function cekUnitPenerimaan($unit){
    $query = $this->db->query("SELECT penerimaan as penerimaan FROM master_data_dendamei2021 where unit = '$unit'");
    return $query->result_array();
   }



}