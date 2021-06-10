<?php

Class HomeModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerOne(){
  
    return $this->db->count_all("tbl_cta");

  }


  public function getAllDataTowerTwo(){
  
    return $this->db->count_all("tbl_ctb");

  }

  public function getAllDataTowerTree(){
  
    return $this->db->count_all("tbl_stc");

  }


  public function getAllDataTowerFour(){
  
    return $this->db->count_all("tbl_std");

  }

  public function getAllDataTowerFive(){
    return $this->db->count_all("tbl_ste");

  }
  
  public function getAllDataTowerSix(){
    return $this->db->count_all("tbl_stf");
  }

  public function getAllDataTownhouse(){
  
    return $this->db->count_all("tbl_townhouse");

  }


   


}