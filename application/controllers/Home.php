<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	
		parent:: __construct();	
		$this->load->model('HomeModel');  
		$this->load->model('AlltowerModel');   
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
		// $data['totunit'] = $this->HomeModel->getAllDataTowerOne();
		// $data['totunit2'] = $this->HomeModel->getAllDataTowerTwo();
		// $data['totunit3'] = $this->HomeModel->getAllDataTowerTree();
		// $data['totunit4'] = $this->HomeModel->getAllDataTowerFour();
		// $data['totunit5'] = $this->HomeModel->getAllDataTowerFive();
		// $data['totunit6'] = $this->HomeModel->getAllDataTowerSix();

		// //HO
		// $data ['totTAHO'] = $this->AlltowerModel->totDataUnitHOTA();
		// $data ['totTBHO'] = $this->AlltowerModel->totDataUnitHOTB();
		// $data ['totTCHO'] = $this->AlltowerModel->totDataUnitHOTC();
		// $data ['totTDHO'] = $this->AlltowerModel->totDataUnitHOTD();
		// $data ['totTEHO'] = $this->AlltowerModel->totDataUnitHOTE();
		// $data ['totTFHO'] = $this->AlltowerModel->totDataUnitHOTF();
        // //pendingho
		// $data ['totTAPHO'] = $this->AlltowerModel->totDataUnitPHOTA();
		// $data ['totTBPHO'] = $this->AlltowerModel->totDataUnitPHOTB();
		// $data ['totTCPHO'] = $this->AlltowerModel->totDataUnitPHOTC();
		// $data ['totTDPHO'] = $this->AlltowerModel->totDataUnitPHOTD();
		// $data ['totTEPHO'] = $this->AlltowerModel->totDataUnitPHOTE();
		// $data ['totTFPHO'] = $this->AlltowerModel->totDataUnitPHOTF();


		// //STS
		// $data ['totTASTS'] = $this->AlltowerModel->totDataUnitSTSTA();
		// $data ['totTBSTS'] = $this->AlltowerModel->totDataUnitSTSTB();
		// $data ['totTCSTS'] = $this->AlltowerModel->totDataUnitSTSTC();
		// $data ['totTDSTS'] = $this->AlltowerModel->totDataUnitSTSTD();
		// $data ['totTESTS'] = $this->AlltowerModel->totDataUnitSTSTE();
		// $data ['totTFSTS'] = $this->AlltowerModel->totDataUnitSTSTF();


		//fixedmonth 

		// $data['totDataUnitfixMonth1'] = $this->AlltowerModel->totDataUnitfixMonth1();

		//usersUpdate

		// $data ['userupdate'] = $this->AlltowerModel->getAllDataUserUpdate();
		
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
