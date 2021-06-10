<?php

Class ReportModel extends CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function getAllDataTowerReport(){
  
    $query = $this->db->query("SELECT tbl_cta.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_cta
    LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_cta.id_defect = tbl_defect.id_defect
    UNION
    SELECT tbl_ctb.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ctb
    LEFT OUTER JOIN status ON tbl_ctb.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_ctb.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_ctb.id_defect = tbl_defect.id_defect
    UNION
    SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
    LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
    UNION
    SELECT tbl_std.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_std
    LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_std.id_defect = tbl_defect.id_defect
    UNION
    SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
    LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect 
    UNION
    SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
    LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect");
    return $query->result_array();

  }



  public function getAllDataReportAllStatus($status){

    $query = $this->db->query("SELECT tbl_cta.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_cta
    LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_cta.id_defect = tbl_defect.id_defect
    WHERE tbl_cta.status = $status
    UNION
    SELECT tbl_ctb.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ctb
    LEFT OUTER JOIN status ON tbl_ctb.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_ctb.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_ctb.id_defect = tbl_defect.id_defect
    WHERE tbl_ctb.status = $status
    UNION
    SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
    LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
    WHERE tbl_stc.status = $status
    UNION
    SELECT tbl_std.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_std
    LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_std.id_defect = tbl_defect.id_defect
    WHERE tbl_std.status = $status
    UNION
    SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
    LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
    WHERE tbl_ste.status = $status
    UNION
    SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
    LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
    LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
    LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
    WHERE tbl_stf.status = $status");

    return $query->result_array();


  }


  public function getReportUndangan($nameunit){

    $query = $this->db->query("SELECT tbl_cta.pemilik, tbl_cta.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_cta 
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_cta.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'
    UNION
    SELECT tbl_ctb.pemilik, tbl_ctb.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_ctb 
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_ctb.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'
    UNION
    SELECT tbl_stc.pemilik, tbl_stc.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_stc
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_stc.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'
    UNION
    SELECT tbl_std.pemilik, tbl_std.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_std
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_std.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'
    UNION
    SELECT tbl_ste.pemilik, tbl_ste.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_ste
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_ste.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'
    UNION
    SELECT tbl_stf.pemilik, tbl_stf.address_pemilik as alamat, tbl_transaksi_undangan.*,month(tbl_transaksi_undangan.date_undangan) as month ,year(tbl_transaksi_undangan.date_undangan) as year FROM tbl_stf
    LEFT OUTER JOIN tbl_transaksi_undangan ON tbl_stf.lantai = tbl_transaksi_undangan.nama_unit
    WHERE tbl_transaksi_undangan.nama_unit = '$nameunit'");

    return $query->result_array();

  }



  


    function totDataTowerReporta(){
      return $this->db->count_all("tbl_cta");
    }
    function totDataTowerReportb(){
        return $this->db->count_all("tbl_ctb");
      }

    function totDataTowerReportc(){
        return $this->db->count_all("tbl_stc");
      }
    function totDataTowerReportd(){
        return $this->db->count_all("tbl_std");
      } 
    function totDataTowerReporte(){
        return $this->db->count_all("tbl_ste");
    }   
    function totDataTowerReportf(){
        return $this->db->count_all("tbl_stf");
    }




    public function get_current_page_records_twreport($limit, $start) 
    {
       
        $query = $this->db->query("SELECT tbl_cta.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_cta
        LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_cta.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_ctb.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ctb
        LEFT OUTER JOIN status ON tbl_ctb.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_ctb.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_ctb.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
        LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_std.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_std
        LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_std.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
        LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
        UNION
        SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
        LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
        LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
        LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
        LIMIT $start, $limit");
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


    public function get_current_page_records_twreportstatus($limit, $start, $status){


      $query = $this->db->query("SELECT tbl_cta.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_cta
      LEFT OUTER JOIN status ON tbl_cta.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_cta.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_cta.id_defect = tbl_defect.id_defect
      WHERE tbl_cta.status = $status
      UNION
      SELECT tbl_ctb.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ctb
      LEFT OUTER JOIN status ON tbl_ctb.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_ctb.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_ctb.id_defect = tbl_defect.id_defect
      WHERE tbl_ctb.status = $status
      UNION
      SELECT tbl_stc.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stc
      LEFT OUTER JOIN status ON tbl_stc.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_stc.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_stc.id_defect = tbl_defect.id_defect
      WHERE tbl_stc.status = $status
      UNION
      SELECT tbl_std.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_std
      LEFT OUTER JOIN status ON tbl_std.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_std.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_std.id_defect = tbl_defect.id_defect
      WHERE tbl_std.status = $status
      UNION
      SELECT tbl_ste.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_ste
      LEFT OUTER JOIN status ON tbl_ste.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_ste.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_ste.id_defect = tbl_defect.id_defect
      WHERE tbl_ste.status = $status
      UNION
      SELECT tbl_stf.*,tbl_defect.name_defect as nameDefect, status.status as nameStatus,tbl_status_unit.nama_status_unit as statusUnit FROM tbl_stf
      LEFT OUTER JOIN status ON tbl_stf.status = status.id_status 
      LEFT OUTER JOIN tbl_status_unit  ON tbl_stf.id_status_unit = tbl_status_unit.id_status_unit 
      LEFT OUTER JOIN tbl_defect ON tbl_stf.id_defect = tbl_defect.id_defect
      WHERE tbl_stf.status = $status = $status LIMIT $start, $limit");
      
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