<?php

Class SupplierModel extends  CI_Model{


  public function __construct()
  {
    $this->load->database();
  }



  public function get_current_page_records($limit, $start, $keyword, $keyword2, $keyword3) 
  {
    
      if ($keyword != null) {

        $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
        LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
        LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project  
        WHERE tb_supplier.name_supplier LIKE '%$keyword' OR tb_supplier.supp_address LIKE '%$keyword'
        OR tb_supplier.contact_person LIKE '%$keyword' OR tb_supplier.email LIKE '%$keyword' OR tb_supplier.no_telphon LIKE '%$keyword'
        OR tb_supplier.description LIKE '%$keyword' OR tb_supplier.tipe LIKE '%$keyword' OR tb_supplier.brand LIKE '%$keyword'
        ORDER BY id_supplier DESC LIMIT $start, $limit  ");
        return $query->result_array();



      } else if ($keyword2 != 0){

        $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
        LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
        LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project  
        WHERE tb_supplier.id_component = $keyword2
        ORDER BY id_supplier DESC  ");
        return $query->result_array();

      } else if ($keyword3 != 0){

        $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
        LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
        LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project  
        WHERE tb_supplier.id_project = $keyword3
        ORDER BY id_supplier DESC ");
        return $query->result_array();


      } else if ($keyword != null && $keyword2 != 0 && $keyword2 != 0) { 

        $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
        LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
        LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project  
        WHERE tb_supplier.name_supplier LIKE '%$keyword' OR tb_supplier.supp_address LIKE '%$keyword'
        OR tb_supplier.contact_person LIKE '%$keyword' OR tb_supplier.email LIKE '%$keyword' OR tb_supplier.no_telphon LIKE '%$keyword'
        OR tb_supplier.description LIKE '%$keyword' OR tb_supplier.tipe LIKE '%$keyword' OR tb_supplier.brand LIKE '%$keyword' AND tb_supplier.id_component = $keyword2 AND tb_supplier.id_project = $keyword3
        ORDER BY id_supplier DESC LIMIT $start, $limit  ");
        return $query->result_array();



      }else {

      $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
      LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
      LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project ORDER BY id_supplier DESC LIMIT $start, $limit ");
      return $query->result_array();

      }


     
    
  }


  function supplierExportPdf($idComp, $idProject) {

    if($idComp != 0 && $idProject == 0) {

      $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
      LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
      LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project 
      WHERE tb_supplier.id_component = '$idComp' ORDER BY id_supplier DESC");
      return $query->result_array();

    } else if ($idComp == 0 ){


      $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
      LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
      LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project 
      WHERE tb_supplier.id_project = '$idProject' ORDER BY id_supplier DESC");
      return $query->result_array();


    } else if ($idComp != 0 && $idProject != 0) {


      $query = $this->db->query("SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
      LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
      LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project 
      WHERE tb_supplier.id_component = '$idComp' AND tb_supplier.id_project = '$idProject' ORDER BY id_supplier DESC");
      return $query->result_array();


    }

  }


  function selectDataComponent($idComponent) {

    $query = $this->db->query("SELECT * FROM tb_component WHERE id_component = $idComponent");
    return $query->result_array();

}


   


    // public function getAllSupplier()
    // {

    //   $query = $this->db->query('SELECT *, tb_project.name_project as nameProject, tb_component.name_component as nameComponent FROM tb_supplier 
    //   LEFT OUTER JOIN tb_component ON tb_supplier.id_component = tb_component.id_component
    //   LEFT OUTER JOIN tb_project ON tb_supplier.id_project = tb_project.id_project ORDER BY id_supplier DESC');
    //   return $query->result_array();

    // }

    function totDataSupplier(){
      return $this->db->count_all("tb_supplier");
    }

    public function getAlldataComponent(){

      $query = $this->db->query('SELECT * FROM tb_component ORDER BY id_component ASC');
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