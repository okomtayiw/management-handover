<?php

class TowerTwo extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $models = array(
            'AlltowerModel' => 'AlltowerModel',
            'TowerTwoModel' => 'TowerTwoModel'
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
           
            $data ['title'] = 'Tower B';
            $data ['towertwo'] = $this->TowerTwoModel->get_current_page_records_twb();
        

    
            $this->load->view('templates/header', $data);
            $this->load->view('towertwo/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
    }

    public function updatetowertwo($idTowerTwo){
     
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
        $data ['towertwo'] = $this->TowerTwoModel->getAllDataTowerTwoUpdate($idTowerTwo);
        $data ['identitas'] = $this->TowerTwoModel->gatDataIdentitasAddress($idTowerTwo); 
        $this->load->view('templates/header', $data);
        $this->load->view('towertwo/vupdatetowertwo', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    }


    public function saveUpdateAddress(){

        $nmAddress = $this->input->post('nmAddress');
        $noTelp = $this->input->post('noTelp');
        $nmUnit = $this->input->post('nmUnit');
        $idAddress = $this->input->post('idAddress');


        
        $this->AlltowerModel->saveUpdateDataAddress($nmAddress,$noTelp,$nmUnit, $idAddress);

       }

       public function saveAddAddress(){

        $nmAddress = $this->input->post('nmAddress');
        $noTelp = $this->input->post('noTelp');
        $nmUnit = $this->input->post('nmUnit');
       
        $this->AlltowerModel->saveAddDataAddress($nmAddress,$noTelp,$nmUnit);

       }


       public function deleteAddress(){
         $idAddres = $this->input->post('id');
         $this->AlltowerModel->deleteDataAddress($idAddres);
       }  


}