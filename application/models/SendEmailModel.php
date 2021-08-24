<?php

Class SendEmailModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }

  function getSendEmailModelData(){

    $query = $this->db->query("SELECT * FROM data_send_email");
    return $query->result_array();  

  }


  public function getAllDataEmail(){
  
    $query = $this->db->query("SELECT * FROM data_send_email ORDER BY id_data_send_email DESC");
    return $query->result_array();

  }


  public function getDataEmailUpdate($idDataEmail){
  
    $query = $this->db->query("SELECT * FROM data_send_email WHERE id_data_send_email = '$idDataEmail'");
    return $query->result_array();

  }


  public function saveData($name,$email,$jabatan){
    $data = array(
      'name' => $name,
      'email' => $email,
      'jabatan' => $jabatan
    );
    $this->db->insert('data_send_email', $data);

  }


  public function saveUpdateDataListEmail($name,$email,$jabatan, $idDataEmail){

    $data = array(
      'name' => $name,
      'email' => $email,
      'jabatan' => $jabatan
    );


    $this->db->where('id_data_send_email', $idDataEmail);
    $this->db->update('data_send_email', $data);

    redirect('ListEmail');
  }


}