<?php

Class ProjectModel extends  CI_Model{


  public function __construct()
  {
    $this->load->database();
  }

    // public function getAllProject()
    // {

    //   $query = $this->db->query('SELECT * FROM tb_project ORDER BY id_project DESC');
    //   return $query->result_array();

    // }


    function totDataProject(){
      return $this->db->count_all("tb_project");
    }


    public function get_current_page_records_proj($limit, $start) 
    {
       
        $query = $this->db->query("SELECT * FROM tb_project ORDER BY id_project DESC LIMIT $start, $limit ");
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