<?php

class TowerFour extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('TowerFourModel');  
        $this->load->model('TowerOneModel');  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->helper('tgl_indo');
        $this->load->helper('date');
        $this->load->library('session');
        require APPPATH.'controllers/SendEmail.php';
    }
    public function index(){
    
      
    
            $data['user'] = $this->db->get_where('tb_users', ['email' =>
            $this->session->userdata('email')])->row_array();
            if ($data['user'] != null){
           
            $data ['title'] = 'Halaman Data Tower D';
            $data ['towerfour'] = $this->TowerFourModel->get_current_page_records_twd();
            
        
         
    
            $this->load->view('templates/header', $data);
            $this->load->view('towerfour/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }



       



     


}