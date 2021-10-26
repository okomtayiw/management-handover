<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ListEmail extends CI_Controller {


    public function __construct()
	{
	
		parent:: __construct();	
		$models = array(
            'UserModel' => 'UserModel',
            'SendEmailModel' => 'SendEmailModel',
            'AlltowerModel' => 'AlltowerModel'
         );
        $this->load->model($models);  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
		
		
	}
    
	public function index()
	{

		
		$data['user'] = $this->db->get_where('tb_users', ['email' =>
		$this->session->userdata('email')])->row_array();
		if ($data['user'] != null){
		$data['title'] = 'Halaman Data Email';
		$data['dataEmail'] = $this->SendEmailModel->getAllDataEmail();
        $data['menutower'] = $this->AlltowerModel->dataMenuTower();
	
		$this->load->view('templates/header', $data);
		$this->load->view('listemail/index', $data);
		$this->load->view('templates/footer');

	
		} else {

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');

            redirect('auth');

		}

	}


    public function saveData(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $jabatan = $this->input->post('jabatan');
        $this->SendEmailModel->saveData($name,$email,$jabatan);

       
    }


    public function updateSendDataEmail($idDataEmail){

        $data['user'] = $this->db->get_where('tb_users', ['email' =>
		$this->session->userdata('email')])->row_array();
		if ($data['user'] != null){
		$data['title'] = 'Halaman Update Data Email';
		$data['dataEmail'] = $this->SendEmailModel->getDataEmailUpdate($idDataEmail);
	
		$this->load->view('templates/header', $data);
		$this->load->view('listemail/updatedataemail', $data);
		$this->load->view('templates/footer');

	
		} else {

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');

            redirect('auth');

		}
        
    }


    public function saveDataUpdate(){

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $jabatan = $this->input->post('jabatan');
        $idDataEmail= $this->input->post('idSendDataEmail');


        
        $this->SendEmailModel->saveUpdateDataListEmail($name,$email,$jabatan, $idDataEmail);

        redirect('ListEmail');
    }


    public function deleteSendDataEmail($idDataEmail){

        $this->db->where_in('id_data_send_email', $idDataEmail);
        $this->db->delete('data_send_email');	
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        Success delete data users.
        </div>');   

        redirect('ListEmail');
    }



   



}

?>