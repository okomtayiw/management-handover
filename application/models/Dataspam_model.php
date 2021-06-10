<?php
class Dataspam_model extends CI_model{


	protected $table = 'm_spam';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_count() 
	{
		return $this->db->count_all($this->table);
	}

	//public function get_spam($limit, $start) {
        //$this->db->limit($limit, $start);
       // $query = $this->db->get($this->table);

       // return $query->result();
    //}

    public function getAlldataspam()
	  {
	   $this->db->from('m_spam');
	   $this->db->order_by('id_spam','DESC');
	   //$this->db->limit(10);
	   $query= $this->db->get();
	   return $query->result_array();
	  
	  }

	public function getAllspamEmailjoin()
	 {

	   $this->db->select("*,tbl_email.name_email as email");
	   $this->db->from("m_spam");
	   $this->db->join("tbl_email","tbl_email.id_email = m_spam.id_email");
	   $this->db->order_by('m_spam.id_spam','DESC');
	   $query = $this->db->get();
	   return $query->result_array();

	}
	  
	  public function deleteSpam($id)
	  {
	   $this->db->where_in('id_spam', $id);
       $this->db->delete('m_spam');	 
	  }
	  
	  public function editSpam($idSpam)
	  {
		
			$this->db->from('m_spam');
			$this->db->WHERE ('id_spam',$idSpam);
			$query= $this->db->get();
	        return $query->result_array();
  
	  }
}


?>