<?php

Class TowerSixModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerSix(){
  
    $query = $this->db->query("SELECT tbl_stf.*,status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
    LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
    ORDER BY tbl_stf.id_stf ASC");
    return $query->result_array();

  }



  public function getAllDataTowerSixUpdate($idTowerStf){
  
    $query = $this->db->query("SELECT * FROM tbl_stf WHERE id_stf ='$idTowerStf'");
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


    function totDataTowerf(){
      return $this->db->count_all("tbl_stf");
    }


    function deleteAllTowerSix($id){

      $this->db->where_in('id_stf', $id);
      $this->db->delete('tbl_stf');

      echo $id;
    }

    function syncroniseData(){

      $query = $this->db->query("SELECT * FROM temp_data ");
      return $query->result_array();

    }


    public function get_current_page_records_twf($limit, $start) 
    {
       
        $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
        LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
        ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
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



    public function get_current_page_records_twfFilter($limit, $start, $status) 
    {
       
        if ($status == 'HO'){

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.status = 1
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'NOHO') {

        $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
        LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
        WHERE tbl_stf.status = ''
        ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'barter') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.status_unit_barter = 'barter'
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");

        } else if ($status == 'readyho') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.ready_ho = 'Sudah siap serah terima' AND tbl_stf.status = '' AND tbl_stf.status_unit_barter != 'barter'
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        }  else if ($status == 'barterho') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.status_unit_barter = 'barter' AND tbl_stf.status = 1
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        }  else if ($status == 'barterbelumho') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.status_unit_barter = 'barter' AND tbl_stf.status = ''
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-satu') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.undangan != '0000-00-00' AND tbl_stf.status != 1  AND tbl_stf.ready_ho !=''
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-dua') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.undangan2 != '0000-00-00' AND tbl_stf.status != 1  AND tbl_stf.ready_ho !=''
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'undangan-tiga') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.undangan3 != '0000-00-00' AND tbl_stf.status != 1  AND tbl_stf.ready_ho !=''
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'sto') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.tgl_sts != '0000-00-00' AND tbl_stf.status != 1  
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'openqc') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.date_openQC  != '0000-00-00' AND tbl_stf.status != 1  
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'belumopenqc') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.date_openQC  = '0000-00-00' AND tbl_stf.status != 1  
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'closeopenqc') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.date_closeQC  != '0000-00-00' AND tbl_stf.status != 1  
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        } else if ($status == 'loloscollection') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.status = '' AND tbl_stf.penerimaan BETWEEN '5' AND '100'
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
        }  else if ($status == 'tidakloloscollection') {

          $query = $this->db->query("SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
          LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
          LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
          LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
          WHERE tbl_stf.ready_ho != '' AND tbl_stf.status = ''  AND tbl_stf.penerimaan BETWEEN '0' AND '4' 
          ORDER BY tbl_stf.id_stf ASC LIMIT $start, $limit");
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


    function totDataTowerSixFilter($filter){
      if ($filter == 'HO') {
      $query = $this->db->where('status', 1)->get('tbl_stf');
      } else if ($filter == 'NOHO') {
        $query = $this->db->where('status', '')->get('tbl_stf');
      } else if ($filter == 'barter') {
        $query = $this->db->where('status_unit_barter', 'barter')->get('tbl_stf');
      } else if ($filter == 'readyho') {
        $where  = "ready_ho = 'Sudah siap serah terima' AND status = '' AND status_unit_barter != 'barter'";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'barterho') {
        $where  = "status_unit_barter = 'barter' AND status = 1";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'barterbelumho') {
        $where  = "status_unit_barter = 'barter' AND status = ''";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'undangan-satu') {
        $where  = "undangan != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'undangan-dua') {
        $where  = "undangan2 != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'undangan-tiga') {
        $where  = "undangan3 != '0000-00-00' AND status != 1  AND ready_ho !=''";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'sto') {
        $where  = "tgl_sts != '0000-00-00' AND status != 1";
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'openqc') {
        $where  = "date_openQC  != '0000-00-00' AND tbl_stf.status != 1";  
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'belumopenqc') {
        $where  = "date_openQC  = '0000-00-00' AND tbl_stf.status != 1";  
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'closeopenqc') {
        $where  = "date_closeQC  != '0000-00-00' AND tbl_stf.status != 1";  
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'loloscollection') {
        $where  = "status = '' AND penerimaan BETWEEN '5' AND '100'";  
        $query = $this->db->where($where)->get('tbl_stf');
      } else if ($filter == 'tidakloloscollection') {
        $where  = "ready_ho != '' AND status = ''  AND penerimaan BETWEEN '0' AND '4' ";  
        $query = $this->db->where($where)->get('tbl_stf');
      }
      return $query->num_rows();
    }


   


}