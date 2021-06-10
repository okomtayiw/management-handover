<?php

Class ComponentModel extends  CI_Model{


  public function __construct()
  {
    $this->load->database();
  }


    function totDataComponent(){
      return $this->db->count_all("tb_component");
    }


    public function get_current_page_records_comp($limit, $start) 
    {
       
        $query = $this->db->query("SELECT * FROM tb_component ORDER BY id_component  DESC LIMIT $start, $limit ");
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