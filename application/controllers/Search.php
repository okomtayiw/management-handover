<?php 

class Search extends CI_Controller {
  public function __construct(){
       parent:: __construct();
       
      $this->load->model('AlltowerModel');  
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->helper('array');
      $this->load->library('form_validation');  
      $this->load->library('pagination');
      $this->load->library('session'); 
	   

	   
	
	}

	 public function key() {
            
            $data['user'] = $this->db->get_where('tb_users', ['email' =>
            $this->session->userdata('email')])->row_array();
            if ($data['user'] != null){

            $keyword = $this->input->post('skeyword'); 
            $data ['title'] = 'Halaman Data Pencarian';
            $data ['searchresult'] = $this->AlltowerModel->getAllDataSearch($keyword);
            
            $config['base_url'] = base_url().'towerOne/page';

            $this->load->view('templates/header', $data);
            $this->load->view('search/resultSearch', $data);
            $this->load->view('templates/footer');
                
            } else {

            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');

            redirect('auth');
            }


        }


        public function get_autocomplete(){
            $keyword = $this->input->get('term');
        
                $result = $this->AlltowerModel->searchAllTower($keyword);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row['nameUnit'];
                    echo json_encode($arr_result);
                }
            
        }
	

	
	
}