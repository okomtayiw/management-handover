<?php

Class UserModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataUser(){
  
    $query = $this->db->query("SELECT * FROM tb_users ORDER BY id_users DESC");
    return $query->result_array();

  }


  public function getAllDataUserUpdate($idUser){
  
    $query = $this->db->query("SELECT * FROM tb_users WHERE id_users = '$idUser'");
    return $query->result_array();

  }






    function totDataUser(){
      return $this->db->count_all("tb_users");
    }

        



    public function get_current_page_records_users($limit, $start) 
    {
       
        $query = $this->db->query("SELECT * FROM tb_users ORDER BY id_users DESC LIMIT $start, $limit");
        return $query->result_array();
  
  
        if ($query->num_rows() > 0)
          {
              foreach ($query->result() as $row)
              {
                  $data[] = $row;
              }
              
              return $data;
          }
    
        return false;
  
      
    }

   


}