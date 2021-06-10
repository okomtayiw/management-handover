<?php

Class AlltowerModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 05");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 06");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 07");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 08");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 09");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 10");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 11");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 12");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 13");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 15");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 16");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 17");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 18");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 19");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 20");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 21");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 22");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 23");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 24");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 25");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 26");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 27");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 28");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 29");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 30");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 31");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 32");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 33");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 34");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 35");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 36");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 37");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 38");
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
      WHERE  MONTH(`grace_periode`) = $month AND YEAR(`grace_periode`) = $year AND SUBSTRING(`lantai`,5,2) = 39");
      return $query->result_array();  
  }
    

  }

  public function allDataTowerList($month, $year,$level,$tower){


    

      // $query = $this->db->query("SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '1' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_cta`
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '2' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit   FROM `tbl_ctb`
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '3' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_stc`
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '4' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_std`
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '5' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_ste`
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '6' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_stf`");
     
   if ($month != null AND $year != null AND $level != null AND $tower != null) {

      // $query = $this->db->query("SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '1' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_cta`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRA'
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '2' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_ctb`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRB'
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '3' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_stc`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRC'
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '4' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_std`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRD'
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '5' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_ste`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRE'
      // UNION
      // SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '6' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_stf`
      // WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level AND SUBSTRING(`lantai`,1,3) = 'TRF' ");
      if($tower == 1) {
        $query = $this->db->query("SELECT `lantai` FROM `tbl_cta`
        WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level");
        return $query->result_array();  

      } else if ($tower == 2 ) {
        $query = $this->db->query("SELECT `lantai`,`pemilik`,DATE_FORMAT(`tgl_transaksi`,'%d/%m/%Y') as tgl_transaksi,DATE_FORMAT(`tgl_ho_seharusnya`,'%d/%m/%Y') as tgl_ho_seharusnya,DATE_FORMAT(`grace_periode`,'%d/%m/%Y') as grace_periode, '1' as tower, MONTH(`grace_periode`) as month_grace_periode, YEAR(`grace_periode`) as year_grace_periode, SUBSTRING(`lantai`,5,2) as lantai_unit  FROM `tbl_ctb`
        WHERE  MONTH(`grace_periode`) = '$month' AND YEAR(`grace_periode`) = '$year' AND SUBSTRING(`lantai`,5,2) = $level");
        return $query->result_array();  
      }

      
    }


  

    

  }




}