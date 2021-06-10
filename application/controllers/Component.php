<?php

class Component extends CI_Controller {
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('ComponentModel');  
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('form_validation');  
   }

   public function index(){

    $this->load->library('pagination');
    $totDataComponent = $this->ComponentModel->totDataComponent();

    // init params
    $limit_per_page = 10;
    $config["uri_segment"] = 3;
    $data ['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

     //style
    $config['full_tag_open'] = '<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">';
    $config['full_tag_close'] = '</ul></nav>';


    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] ='</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] ='</li>';
   

    

    
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] ='</li>';

    $config['prev_link'] = '&raquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] ='</li>';

    $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
    $config['cur_tag_close'] ='</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] ='</li>';


    $config['attributes'] = array('class' => 'page-link');


    //  if ($totDataComponent >0 ) {
 

        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data ['title'] = 'Halaman Data Component';
        $data ['component'] = $this->ComponentModel->get_current_page_records_comp($limit_per_page, $data['start']);
        
        $config['base_url'] = base_url().'component/page';
        $config['total_rows'] = $totDataComponent;
        $config['per_page'] = $limit_per_page;

        $this->pagination->initialize($config);

        $this->load->view('templates/header', $data);
        $this->load->view('component/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    // }

   }

   public function insertComponent(){


    $date = date('Y-m-d H:i:s', strtotime('now'));
    $data = array (
          'name_component' => $_POST ['nmComponent'],
          'date_created' => $date

    );
     
    $this->db->insert('tb_component', $data);
        redirect('Component');
   }

   public function saveUpdateComponent(){

    $idComponent = $_POST['idComponent'];
    $nameComponent  = $_POST['nmComponent'];
    $date = date('Y-m-d H:i:s', strtotime('now'));
    $data = array (
          'name_component' => $nameComponent,
          'date_update' => $date

    );


    $this->db->where('id_component', $idComponent);
	$this->db->update('tb_component', $data);

		redirect('Component');
   }

   public function deleteComponent($idComponent){

    $this->db->where_in('id_component', $idComponent);
    $this->db->delete('tb_component');	 
	
	redirect ('Component');


   }

}

?>