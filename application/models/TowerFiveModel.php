<?php

Class TowerFiveModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerFive(){
  
    $query = $this->db->query("SELECT tbl_ste.*,status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
    LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
    ORDER BY tbl_ste.id_ste ASC");
    return $query->result_array();

  }



  public function getAllDataTowerFiveUpdate($idTowerSte){
  
    $query = $this->db->query("SELECT * FROM tbl_ste WHERE id_ste ='$idTowerSte'");
    return $query->result_array();

  }


  public function getAllDataStatus(){
  
    $query = $this->db->query('SELECT * FROM  status ORDER BY id_status  ASC');
    return $query->result_array();

  }

  public function getAllDataDefectStatus(){
  
    $query = $this->db->query('SELECT * FROM tbl_defect ORDER BY id_defect ASC');
    return $query->result_array();

  }



  public function getAllDataStatusPayment(){
  
    $query = $this->db->query('SELECT * FROM tbl_status_unit ORDER BY id_status_unit ASC');
    return $query->result_array();

  }


    function totDataTowere(){
      return $this->db->count_all("tbl_ste");
    }


    function deleteAllTowerFive($id){

      $this->db->where_in('id_ste', $id);
      $this->db->delete('tbl_ste');

      echo $id;
    }

    function syncroniseData(){

      $query = $this->db->query("SELECT * FROM temp_data ");
      return $query->result_array();

    }


    public function get_current_page_records_twe($limit, $start) 
    {
       
        $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
        LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
        ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
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



    public function get_current_page_records_tweFilter($limit, $start, $status) 
    {
       
        if ($status == 'HO'){

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.status = 1
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'NOHO') {

        $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
        LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
        WHERE tbl_ste.status = ''
        ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'barter') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.status_unit_barter = 'barter'
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");

        } else if ($status == 'readyho') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.ready_ho = 'Sudah siap serah terima' AND tbl_ste.status = '' AND tbl_ste.status_unit_barter != 'barter'
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        }  else if ($status == 'barterho') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.status_unit_barter = 'barter' AND tbl_ste.status = 1
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        }  else if ($status == 'barterbelumho') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.status_unit_barter = 'barter' AND tbl_ste.status = ''
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-satu') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.undangan != '0000-00-00' AND tbl_ste.status != 1  AND tbl_ste.ready_ho !=''
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-dua') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.undangan2 != '0000-00-00' AND tbl_ste.status != 1  AND tbl_ste.ready_ho !=''
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-tiga') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.undangan3 != '0000-00-00' AND tbl_ste.status != 1  AND tbl_ste.ready_ho !=''
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'sto') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.tgl_sts != '0000-00-00' AND tbl_ste.status != 1  
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'openqc') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.date_openQC  != '0000-00-00' AND tbl_ste.status != 1  
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'belumopenqc') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.date_openQC  = '0000-00-00' AND tbl_ste.status != 1  
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'closeopenqc') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.date_closeQC  != '0000-00-00' AND tbl_ste.status != 1  
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        } else if ($status == 'loloscollection') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.status = '' AND tbl_ste.penerimaan BETWEEN '5' AND '100'
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
        }  else if ($status == 'tidakloloscollection') {

          $query = $this->db->query("SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
          LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
          WHERE tbl_ste.ready_ho != '' AND tbl_ste.status = ''  AND tbl_ste.penerimaan BETWEEN '0' AND '4' 
          ORDER BY tbl_ste.id_ste ASC LIMIT $start, $limit");
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


    function totDataTowerFiveFilter($filter){
      if ($filter == 'HO') {
      $query = $this->db->where('status', 1)->get('tbl_ste');
      } else if ($filter == 'NOHO') {
        $query = $this->db->where('status', '')->get('tbl_ste');
      } else if ($filter == 'barter') {
        $query = $this->db->where('status_unit_barter', 'barter')->get('tbl_ste');
      } else if ($filter == 'readyho') {
        $where  = "ready_ho = 'Sudah siap serah terima' AND status = '' AND status_unit_barter != 'barter'";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'barterho') {
        $where  = "status_unit_barter = 'barter' AND status = 1";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'barterbelumho') {
        $where  = "status_unit_barter = 'barter' AND status = ''";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'undangan-satu') {
        $where  = "undangan != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'undangan-dua') {
        $where  = "undangan2 != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'undangan-tiga') {
        $where  = "undangan3 != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'sto') {
        $where  = "tgl_sts != '0000-00-00' AND status != 1";
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'openqc') {
        $where  = "date_openQC  != '0000-00-00' AND tbl_ste.status != 1";  
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'belumopenqc') {
        $where  = "date_openQC  = '0000-00-00' AND tbl_ste.status != 1";  
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'closeopenqc') {
        $where  = "date_closeQC  != '0000-00-00' AND tbl_ste.status != 1";  
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'loloscollection') {
        $where  = "status = '' AND penerimaan BETWEEN '5' AND '100'";  
        $query = $this->db->where($where)->get('tbl_ste');
      } else if ($filter == 'tidakloloscollection') {
        $where  = "ready_ho != '' AND status = ''  AND penerimaan BETWEEN '0' AND '4' ";  
        $query = $this->db->where($where)->get('tbl_ste');
      }
      return $query->num_rows();
    }


   


}