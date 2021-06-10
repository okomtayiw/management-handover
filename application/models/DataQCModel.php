<?php

class DataQcModel extends CI_Model{

    public function __construct()
    {
      $this->load->database();
    }
  
  
  
    public function viewAllDataQc(){
    
      $query = $this->db->query("SELECT tbl_qc.* FROM tbl_qc
      LEFT OUTER JOIN tbl_cta ON tbl_qc.name_unit = tbl_cta.lantai
      WHERE tbl_qc.name_unit = tbl_cta.lantai
      UNION
      SELECT tbl_qc.* FROM tbl_qc
      LEFT OUTER JOIN tbl_ctb ON tbl_qc.name_unit = tbl_ctb.lantai
      WHERE tbl_qc.name_unit = tbl_ctb.lantai
      UNION
      SELECT tbl_qc.* FROM tbl_qc
      LEFT OUTER JOIN tbl_stc ON tbl_qc.name_unit = tbl_stc.lantai
      WHERE tbl_qc.name_unit = tbl_stc.lantai
      UNION
      SELECT tbl_qc.* FROM tbl_qc
      LEFT OUTER JOIN tbl_std ON tbl_qc.name_unit = tbl_std.lantai
      WHERE tbl_qc.name_unit = tbl_std.lantai
      UNION
      SELECT tbl_qc.* FROM tbl_qc
      LEFT Outer JOIN tbl_townhouse ON tbl_qc.name_unit = tbl_townhouse.lantai
      WHERE tbl_qc.name_unit = tbl_townhouse.lantai");
      return $query->result_array();
  
    }
    

    public function get_current_page_records_qcalltower($limit, $start) 
    {
       
        // $query = $this->db->query("SELECT tbl_qc.* FROM tbl_qc
        // LEFT OUTER JOIN tbl_cta ON tbl_qc.name_unit = tbl_cta.lantai
        // WHERE tbl_qc.name_unit = tbl_cta.lantai
        // UNION
        // SELECT tbl_qc.* FROM tbl_qc
        // LEFT OUTER JOIN tbl_ctb ON tbl_qc.name_unit = tbl_ctb.lantai
        // WHERE tbl_qc.name_unit = tbl_ctb.lantai
        // UNION
        // SELECT tbl_qc.* FROM tbl_qc
        // LEFT OUTER JOIN tbl_stc ON tbl_qc.name_unit = tbl_stc.lantai
        // WHERE tbl_qc.name_unit = tbl_stc.lantai
        // UNION
        // SELECT tbl_qc.* FROM tbl_qc
        // LEFT OUTER JOIN tbl_std ON tbl_qc.name_unit = tbl_std.lantai
        // WHERE tbl_qc.name_unit = tbl_std.lantai
        // UNION
        // SELECT tbl_qc.* FROM tbl_qc
        // LEFT Outer JOIN tbl_townhouse ON tbl_qc.name_unit = tbl_townhouse.lantai
        // WHERE tbl_qc.name_unit = tbl_townhouse.lantai
        // GROUP BY tbl_qc.id_qc ASC LIMIT  $start, $limit");

        $query = $this->db->query("SELECT * FROM tbl_qc ORDER BY id_qc DESC LIMIT $start,$limit");
      
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

    function totDataQcAllTower(){
        return $this->db->count_all("tbl_qc");
      }



      public function dataUnit() {
    
        $query = $this->db->query("SELECT tbl_cta.*, SUBSTRING('TA',1,2) AS nameTower FROM tbl_cta
        LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_cta.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_ctb.*, SUBSTRING('TB',1,2) AS nameTower FROM tbl_ctb
        LEFT OUTER JOIN status ON tbl_ctb.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_ctb.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_ctb.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_stc.*, SUBSTRING('TC',1,2) AS nameTower FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_std.*, SUBSTRING('TD',1,2) AS nameTower FROM tbl_std
        LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_std.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_townhouse.*, SUBSTRING('TH',1,2) AS nameTower FROM tbl_townhouse
        LEFT OUTER JOIN status ON tbl_townhouse.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_townhouse.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_townhouse.id_defect = tbl_defect.id_defect");
        return $query->result_array();
    
      }   


}