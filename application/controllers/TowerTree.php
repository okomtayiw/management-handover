<?php

class TowerTree extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $models = array(
            'AlltowerModel' => 'AlltowerModel',
            'TowerTreeModel' => 'TowerTreeModel'
        );
        $this->load->model($models);  
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

           
           
            $data ['title'] = 'Halaman Data Tower C';
            $data ['towertree'] = $this->TowerTreeModel->get_current_page_records_twc();
            
    
            $this->load->view('templates/header', $data);
            $this->load->view('towertree/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
    }


    public function updateTowerTree($idTowerTree){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back'] = $referer;   
        $data ['title'] = 'Halaman Data Tower B';
        $data ['towertree'] = $this->TowerTreeModel->getDataTowerTreeUpdate($idTowerTree);
        $data ['identitas'] = $this->TowerTreeModel->gatDataIdentitasAddress($idTowerTree); 
        $this->load->view('templates/header', $data);
        $this->load->view('towertree/vupdatetowertree', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    }
}