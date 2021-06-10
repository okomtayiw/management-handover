<?php 

class Status extends CI_Controller {
	public function __construct(){
	   parent:: __construct();
	   
	   $this->load->model('Datastatus_model');
	   
	
	}

	public function index(){
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
	    $data ['title'] = 'Halaman Status';
		$data ['status'] = $this->Datastatus_model->getAllstatus();
	    $this->load->view('templates/templates_header', $data);
		$this->load->view('status/index', $data);
		$this->load->view('templates/templates_footer');
		} else {

		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
		Please register to login</div>');

		redirect('auth');
		}
	}
	
	public function delete_status(){
	$id = $_POST['idStatus'];
	$this->Datastatus_model->deleteStatus($id);
	
	redirect ('status');
		
	}
	
	
}