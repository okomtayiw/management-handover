<?php


class DataModelTower extends CI_Model{


    public function __construct()
    {
      $this->load->database();
    }
  
  

  
      public function getAllDataTowerOne(){
  
        $query = $this->db->query('SELECT * FROM `tbl_cta` ORDER BY id_cta DESC');
        return $query->result_array();
  
      }
  
      public function getAlldataProject(){
        
        $query = $this->db->query('SELECT * FROM tb_project ORDER BY id_project ASC');
        return $query->result_array();
  
      }
  
      public function deleteEmail($id){
        $this->db->where_in('id_email', $id);
        $this->db->delete('tbl_email');
  
  
      }
  
      public function editEmail($idEmail)
      {
        
            $this->db->from('tbl_email');
            $this->db->WHERE ('id_email',$idEmail);
            $query= $this->db->get();
            return $query->result_array();
  
      }
  


}