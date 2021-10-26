<?php

class MenuTower extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $models = array(
            'AlltowerModel' => 'AlltowerModel',
            'MenuTowerModel' => 'MenuTowerModel'
          );
        $this->load->model($models);  
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('tgl_indo');
        $this->load->helper('date');
    }


    public function index(){
    
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data ['menutower'] = $this->MenuTowerModel->getAllDataMenuTower();  
        $data['title'] = "Halaman serah terima";
        $this->load->view('templates/header', $data);
        $this->load->view('MenuTower/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    

   }

   public function updateNameTower($idTower){

    $data['user'] = $this->db->get_where('tb_users', ['email' =>
    $this->session->userdata('email')])->row_array();
    if ($data['user'] != null){
    $data['title'] = 'Halaman Update Name Tower';
    $data['nametower'] = $this->MenuTowerModel->getDataMenuTowerUpdate($idTower);
    $data ['menutower'] = $this->MenuTowerModel->getAllDataMenuTower();  

    $this->load->view('templates/header', $data);
    $this->load->view('menutower/updatenametower', $data);
    $this->load->view('templates/footer');


    } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');

    }
    
   }
   public function saveData(){
        $nameTower = $this->input->post('nameTower');
        $codeTower = $this->input->post('codeTower');
        $numTower  = $this->input->post('numTower');
        $this->MenuTowerModel->saveData($nameTower,$codeTower,$numTower);
    }
    public function deletetower($idTower){
        $this->MenuTowerModel->deleteTower($idTower);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Hapus data berhasil</div>');
        redirect('MenuTower');
    }

    public function saveupdateNameTower(){
        $nameTower = $this->input->post('nameTower');
        $codeTower = $this->input->post('codeTower');
        $numTower  = $this->input->post('numTower');
        $idNameTower  = $this->input->post('idNameTower');
        $this->MenuTowerModel->saveEditData($nameTower,$codeTower,$numTower,$idNameTower);
        redirect('MenuTower');
    }


   
}