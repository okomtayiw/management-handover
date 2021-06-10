<?php

Class TowerTreeModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerTree(){
  
    $query = $this->db->query("SELECT tbl_stc.*,status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
    LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
    ORDER BY tbl_stc.id_stc ASC");
    return $query->result_array();
  }



  public function getAllDataTowerTreeUpdate($idTowerTree){
  
    $query = $this->db->query("SELECT * FROM tbl_stc WHERE id_stc ='$idTowerTree'");
    return $query->result_array();

  }


  


    function totDataTowerc(){
      return $this->db->count_all("tbl_stc");
    }


    function deleteAllTowerTree($id){

      $this->db->where_in('id_stc', $id);
      $this->db->delete('tbl_stc');

      echo $id;
    }


    public function get_current_page_records_twc() 
    {
       
        $query = $this->db->query("SELECT tbl_stc.* FROM tbl_stc
        ORDER BY tbl_stc.id_stc ");
        return $query->result_array();  
    }





    public function get_current_page_records_twcFilter($limit, $start, $filter) 
    {
       if ($filter == 'HO') {
        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status = 1
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");

       } else if ($filter == 'NOHO') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status = ''
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");


       } else if ($filter == 'barter') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status_unit_barter = 'barter'
        ORDER BY tbl_stc.pemilik ASC LIMIT $start, $limit");


       } else if ($filter == 'barterho') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status_unit_barter = 'barter' AND tbl_stc.status = 1
        ORDER BY tbl_stc.pemilik ASC LIMIT $start, $limit");


       } else if ($filter == 'barterbelumho') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status_unit_barter = 'barter' AND tbl_stc.status = ''
        ORDER BY tbl_stc.pemilik ASC LIMIT $start, $limit");


       } else if ($filter == 'readyho') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.ready_ho = 'Sudah siap serah terima' AND tbl_stc.status = '' AND tbl_stc.status_unit_barter != 'barter'
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");


       } else if ($filter == 'undangan-satu') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.undangan != '0000-00-00' AND tbl_stc.status != 1  AND tbl_stc.ready_ho !=''
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'undangan-dua') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.undangan2 != '0000-00-00' AND tbl_stc.status != 1  AND tbl_stc.ready_ho !=''
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'undangan-tiga') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.undangan3 != '0000-00-00' AND tbl_stc.status != 1  AND tbl_stc.ready_ho !=''
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'sto') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.tgl_sts != '0000-00-00' AND tbl_stc.status != 1
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'openqc') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.date_openQC  != '0000-00-00' AND tbl_stc.status != 1  
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'belumopenqc') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.date_openQC  = '0000-00-00' AND tbl_stc.status != 1  
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'closeopenqc') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.date_closeQC  != '0000-00-00' AND tbl_stc.status != 1  
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       } else if ($filter == 'loloscollection') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.status = '' AND tbl_stc.penerimaan BETWEEN '5' AND '100'
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       }  else if ($filter == 'tidakloloscollection') {

        $query = $this->db->query("SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        WHERE tbl_stc.ready_ho != '' AND tbl_stc.status = ''  AND tbl_stc.penerimaan BETWEEN '0' AND '4' 
        ORDER BY tbl_stc.id_stc ASC LIMIT $start, $limit");
       }
  

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


    function totDataTowerTreeFilter($filter){
      if ($filter == 'HO') {
        $query = $this->db->where('status', 1)->get('tbl_stc');
        } else if ($filter == 'NOHO') {
          $query = $this->db->where('status', '')->get('tbl_stc');
        } else if ($filter == 'barter') {
          $query = $this->db->where('status_unit_barter', 'barter')->get('tbl_stc');
        } else if ($filter == 'readyho') {
          $where  = "ready_ho = 'Sudah siap serah terima' AND status = '' AND status_unit_barter != 'barter'";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'barterho') {
          $where  = "status_unit_barter = 'barter' AND status = 1";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'barterbelumho') {
          $where  = "status_unit_barter = 'barter' AND status = ''";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'undangan-satu') {
          $where  = "undangan != '0000-00-00' AND status != 1  AND ready_ho !=''";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'undangan-dua') {
          $where  = "undangan2 != '0000-00-00' AND status != 1  AND ready_ho !=''";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'undangan-tiga') {
          $where  = "undangan3 != '0000-00-00' AND status != 1  AND ready_ho !=''";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'sto') {
          $where  = "tgl_sts != '0000-00-00' AND status != 1";
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'openqc') {
          $where  = "date_openQC  != '0000-00-00' AND status != 1";  
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'belumopenqc') {
          $where  = "date_openQC  = '0000-00-00' AND status != 1";  
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'closeopenqc') {
          $where  = "date_closeQC  != '0000-00-00' AND status != 1";  
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'loloscollection') {
          $where  = "status = '' AND penerimaan BETWEEN '5' AND '100'";  
          $query = $this->db->where($where)->get('tbl_stc');
        } else if ($filter == 'tidakloloscollection') {
          $where  = "ready_ho != '' AND status = ''  AND penerimaan BETWEEN '0' AND '4' ";  
          $query = $this->db->where($where)->get('tbl_stc');
        }
        return $query->num_rows();
    }



   


}