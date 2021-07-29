<?php

Class SitePlanModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }
  //grace periode september 2021
  public function getMonth92021($tower,$level){

    $query = $this->db->query("SELECT count(unit) as totUnit FROM master_data_marketing WHERE SUBSTRING(`unit`,5,2) = $level AND SUBSTRING(`unit`,1,3) = '$tower' AND SUBSTRING(date_grace_periode,4,2) = 09 AND SUBSTRING(master_data_marketing.date_grace_periode,-4) ='2021'");
    return $query->result_array();

  }

  //grace periode oktober 2021
  public function getMonth102021($tower,$level){
      $query = $this->db->query("SELECT count(unit) as totUnit FROM master_data_marketing WHERE SUBSTRING(`unit`,5,2) = $level AND SUBSTRING(`unit`,1,3) = '$tower' AND SUBSTRING(date_grace_periode,4,2) = 10 AND SUBSTRING(master_data_marketing.date_grace_periode,-4) ='2021'");
      return $query->result_array();
  }

  //grace periode november 2021
  public function getMonth112021($tower,$level){
        $query = $this->db->query("SELECT count(unit) as totUnit FROM master_data_marketing WHERE SUBSTRING(`unit`,5,2) = $level AND SUBSTRING(`unit`,1,3) = '$tower' AND SUBSTRING(date_grace_periode,4,2) = 11 AND SUBSTRING(master_data_marketing.date_grace_periode,-4) ='2021'");
        return $query->result_array();   
  }

  //grace periode desember 2021
  public function getMonth122021($tower,$level){
    $query = $this->db->query("SELECT count(unit) as totUnit FROM master_data_marketing WHERE SUBSTRING(`unit`,5,2) = $level AND SUBSTRING(`unit`,1,3) = '$tower' AND SUBSTRING(date_grace_periode,4,2) = 12 AND SUBSTRING(master_data_marketing.date_grace_periode,-4) ='2021'");
    return $query->result_array();   
  }


   //grace periode all tower
  public function getMonthGracePeriode($tower,$level,$month,$year){
    $query = $this->db->query("SELECT count(unit) as totUnit FROM master_data_marketing WHERE SUBSTRING(`unit`,5,2) = $level AND SUBSTRING(`unit`,1,3) = '$tower' AND SUBSTRING(date_grace_periode,4,2) = $month AND SUBSTRING(master_data_marketing.date_grace_periode,-4) ='$year'");
    return $query->result_array();   
  }







  //penerimaan 100%
  public function get100($tower,$level){
    $query = $this->db->query("SELECT count(master_data_dendamei2021.unit) as totUnit FROM master_data_dendamei2021
    LEFT OUTER JOIN master_data_denda ON master_data_denda.unit = master_data_dendamei2021.unit
    WHERE SUBSTRING(master_data_dendamei2021.unit,5,2) = $level  AND SUBSTRING(master_data_dendamei2021.unit,1,3) = '$tower' AND master_data_denda.penerimaan = 100");
    return $query->result_array();
  }

  
  //penerimaan 70-90%
  public function get70_90($tower,$level){
    $query = $this->db->query("SELECT count(master_data_dendamei2021.unit) as totUnit FROM master_data_dendamei2021
    LEFT OUTER JOIN master_data_denda ON master_data_denda.unit = master_data_dendamei2021.unit
    WHERE SUBSTRING(master_data_dendamei2021.unit,5,2) = $level  AND SUBSTRING(master_data_dendamei2021.unit,1,3) = '$tower' AND master_data_denda.penerimaan BETWEEN 40 AND 69");
    return $query->result_array();
  }

 
  //penerimaan 40-69 %
  public function get40_69($tower,$level){
    $query = $this->db->query("SELECT count(master_data_dendamei2021.unit) as totUnit FROM master_data_dendamei2021
    LEFT OUTER JOIN master_data_denda ON master_data_denda.unit = master_data_dendamei2021.unit
    WHERE SUBSTRING(master_data_dendamei2021.unit,5,2) = $level  AND SUBSTRING(master_data_dendamei2021.unit,1,3) = '$tower' AND master_data_denda.penerimaan BETWEEN 70 AND 99");
    return $query->result_array();
  }

  
  //penerimaan 0-39%
  public function get0_39($tower,$level){
    $query = $this->db->query("SELECT count(master_data_dendamei2021.unit) as totUnit FROM master_data_dendamei2021
    LEFT OUTER JOIN master_data_denda ON master_data_denda.unit = master_data_dendamei2021.unit
    WHERE SUBSTRING(master_data_dendamei2021.unit,5,2) = $level  AND SUBSTRING(master_data_dendamei2021.unit,1,3) = '$tower' AND master_data_denda.penerimaan BETWEEN 0 AND 39");
    return $query->result_array();
  }


  public function getUnitLevel5($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 05 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel6($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 06 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel7($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 07 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel8($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 08 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel9($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 09 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel10($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 10 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }



  public function getUnitLevel11($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 11 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel12($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 12 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel15($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 15 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel16($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 16 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel17($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 17 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel18($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 18 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel19($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 19 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel20($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 20 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel21($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 21 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel23($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 23 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel25($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 25 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel26($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 26 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel27($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 27 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel28($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 28 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel29($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 29 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel30($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 30 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel31($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 31 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


  public function getUnitLevel32($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 32 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel33($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 33 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel35($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 35 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel36($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 36 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel37($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 37 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel38($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 38 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }

  public function getUnitLevel39($tower){
    $query = $this->db->query("SELECT *, SUBSTRING(master_data_marketing.date_grace_periode,4,2) as mGracePeriode , SUBSTRING(master_data_marketing.date_grace_periode,-4) as yGracePeriode FROM `master_data_denda`
    LEFT OUTER JOIN master_data_marketing ON master_data_denda.unit = master_data_marketing.unit
    WHERE SUBSTRING(master_data_denda.unit,5,2) = 39 AND SUBSTRING(master_data_denda.unit,1,3) = '$tower'");
    return $query->result_array();
  }


}