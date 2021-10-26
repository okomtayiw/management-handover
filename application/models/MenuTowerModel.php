<?php

Class MenuTowerModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }

  public function getAllDataMenuTower(){
  
    $query = $this->db->query("SELECT * FROM menu_tower ORDER BY id_tower ASC");
    return $query->result_array();

  }

  public function saveData($nameTower,$codeTower,$numTower){
    $data = array(
      'name_tower' => $nameTower,
      'code_tower' => $codeTower,
      'num_tower' => $numTower
    );
    $this->db->insert('menu_tower', $data);
  }

  public function saveEditData($nameTower,$codeTower,$numTower,$idNameTower){

     $data = array(
      'name_tower' => $nameTower,
      'code_tower' => $codeTower,
      'num_tower' => $numTower
    );

    $this->db->where('id_tower', $idNameTower);
    $this->db->update('menu_tower', $data);

  }

  public function getDataMenuTowerUpdate($idTower){
    $query = $this->db->query("SELECT * FROM menu_tower WHERE id_tower = '$idTower'");
    return $query->result_array();
  }

  public function deleteTower($idTower){
    $this->db->where('id_tower', $idTower);
    $this->db->delete('menu_tower');
  }


}