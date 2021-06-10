<?php

class TowerTwoFilter extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('TowerTwoModel');  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('tgl_indo');
    }
    public function index(){

        $filter =  $this->uri->segment(2);
    
        $totDataTowerb = $this->TowerTwoModel->totDataTowerTwoFilter($filter);
        $config["uri_segment"] = 4;
        $data ['start'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
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
    
     
    
            $data['user'] = $this->db->get_where('tb_users', ['email' =>
            $this->session->userdata('email')])->row_array();
            if ($data['user'] != null){

            $countData = $this->input->post('scount'); 
            if ($countData == 0){
                $limit_per_page =10;
            }else if ($countData == 10){

                $limit_per_page = $countData;

            }else if ($countData == 20){
                $limit_per_page = $countData;
            } else if ($countData == 50){

                $limit_per_page = $countData;
            } else if ($countData == 100){

                $limit_per_page = $countData;
            } else if ($countData == 1000000){

                $limit_per_page = $totDataTowerb;
            }
            
            else {

                $limit_per_page = $countData;
            }

           
            $data ['title'] = 'Halaman Data Tower B';
            $data ['towertwo'] = $this->TowerTwoModel->get_current_page_records_twbFilter($limit_per_page, $data['start'], $filter);
            
            $config['base_url'] = base_url().'towerTwoFilter/'.$filter.'/page';
            $config['total_rows'] = $totDataTowerb;
            $config['per_page'] = $limit_per_page;

            $data ['nmfilter'] = $filter;
    
            $this->pagination->initialize($config);
    
            $this->load->view('templates/header', $data);
            $this->load->view('datafilter/towertwoview', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }

 
}