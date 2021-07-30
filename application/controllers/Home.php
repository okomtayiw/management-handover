<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	
		parent:: __construct();	
		$models = array(
            'HomeModel' => 'HomeModel',
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
		$data['title'] = 'Halaman Home';
		$data['totGracePeriodeA'] = $this->AlltowerModel->totGracePeriodeA();
		$data['totGracePeriodeB'] = $this->AlltowerModel->totGracePeriodeB();
		$data['totGracePeriodeC'] = $this->AlltowerModel->totGracePeriodeC();
		$data['totGracePeriodeD'] = $this->AlltowerModel->totGracePeriodeD();
		$data['totGracePeriodeE'] = $this->AlltowerModel->totGracePeriodeE();
		$data['totGracePeriodeF'] = $this->AlltowerModel->totGracePeriodeF();
		$data['totDataInProgress'] = $this->HomeModel->getDataInProgressTransaction();
		$data['totDataHandOver'] = $this->HomeModel->getDataHoTransaction();
		$data['totDataPending'] = $this->HomeModel->getDataPendingTransaction();
		$data['totDataCancel'] = $this->HomeModel->getDataCancelTransaction();
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');

	
		} else {

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');

            redirect('auth');

		}

	}
	



}
