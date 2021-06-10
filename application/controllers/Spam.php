<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spam extends CI_Controller {
	public function __construct()
	{

		parent:: __construct();
		
		$this->load->model('Dataspam_model');
		$this->load->model('Dataemail_model');
		$this->load->helper('url');
        $this->load->library("pagination");
		
		
	}

	public function index()
	{   
		
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		if ($data['user'] != null){
		$data['title'] = 'Halaman Data Spam';
		$data['spam'] = $this->Dataspam_model->getAllspamEmailjoin();
		$data['email'] = $this->Dataemail_model->getAllemail();
		
		$this->load->view('templates/header', $data);
		$this->load->view('spam/index', $data);
		$this->load->view('templates/footer');

		} else {$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
		Please register to login</div>');

		redirect('auth');
		}
	}


	
	public function insertSpam()
	{

		
        $author = $this->session->userdata('email');
        date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d H:i:s");
		$data = array(
			    'id_email' => $_POST['idEmail'],
				'account' => $_POST ['account'],
				'link_post' => $_POST ['link_post'],
				'tgl_post' => $date,
				'title' => $_POST ['title'],
				'status' => $_POST ['status'],
				'keterangan' => $_POST['keterangan'],
				'author' => $author

		);

		$this->db->insert('m_spam', $data);
		redirect('spam');

	}


	public function delete_spam()
	{
	$id = $_POST['idSpam'];
	$this->Dataspam_model->deleteSpam($id);
	
	redirect('spam');
		
	}
	
	public function update_spam()
	{

		$id = $_POST['idSpam'];
		$idEmail = $_POST['idEmail'];
		$account= $_POST['account'];
		$link_post = $_POST ['link_post'];
		$tgl_post = $_POST ['tgl_post'];
		$title = $_POST ['title'];
		$status= $_POST ['status'];
		$keterangan = $_POST ['keterangan'];
	

		$data = array(
			'id_email' => $idEmail,
			'account' => $account,
			'link_post' => $link_post,
			'tgl_post' => $tgl_post,
			'title' => $title,
			'status' => $status,
			'Keterangan'  => $keterangan
		);
		
		$this->db->where('id_spam', $id);
		$this->db->update('m_spam', $data);

		redirect('spam');
	}


}
