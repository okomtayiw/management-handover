<?php
class Data_modelpic extends CI_model{


	protected $table = 'tbl_pic_project';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_count() 
	{
		return $this->db->count_all($this->table);
    }
    
    public function get_current_page_records_picproject($limit, $start) 
    {
       
        $query = $this->db->query("SELECT * FROM tbl_pic_project
        ORDER BY id_pic_project DESC LIMIT $start, $limit");
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

    public function getAllDataPicProject($idPicProject){
  
        $query = $this->db->query("SELECT * FROM tbl_pic_project WHERE id_pic_project ='$idPicProject'");
        return $query->result_array();
    
      }

}


?>