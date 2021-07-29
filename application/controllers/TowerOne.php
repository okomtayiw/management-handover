<?php

class TowerOne extends CI_Controller {


    public function __construct()
    {
        parent:: __construct();
        $models = array(
            'AlltowerModel' => 'AlltowerModel',
            'TowerOneModel' => 'TowerOneModel'
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

           
            $data ['title'] = 'Tower A';
            $data ['towerone'] = $this->TowerOneModel->get_current_page_records_twa();    
           
        
    
            $this->load->view('templates/header', $data);
            $this->load->view('towerone/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }
    public function saveUpdateTowerOne(){
        $unit = $this->input->post('nmUnit');
        $owner = $this->input->post('nmOwner');
        $dateTransaction = $this->input->post('dateTransaksi');

        $idTowerOne = $this->input->post('idTowerOne');
        
        $this->TowerOneModel->updateDataTowerOne($unit, $owner, $dateTransaction, $idTowerOne);
        $this->session->set_flashdata('messageupdate','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>'.$unit.'</strong> Update data berhasil 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('towerone');
    }


    public function updatetowerone($idTowerOne){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
            } else {
                 $referer = '';
            }
        $data['back'] = $referer;   
        $data ['title'] = 'Halaman Data Tower A';
        $data ['towerone'] = $this->TowerOneModel->getDataTowerOneUpdate($idTowerOne);
        $data ['identitas'] = $this->TowerOneModel->gatDataIdentitasAddress($idTowerOne); 
        $this->load->view('templates/header', $data);
        $this->load->view('towerone/vupdatetowerone', $data);
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