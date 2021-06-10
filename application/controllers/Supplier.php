<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends CI_Controller {
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('SupplierModel');  
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('form_validation');
    
       
   }

   public function index(){
    
    $this->load->library('pagination');
    $totDataSupplier = $this->SupplierModel->totDataSupplier();
   
    // init params
    $limit_per_page = 10;
    $config["uri_segment"] = 3;
    $data ['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


    

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


    if($this->input->post('keyword') != null){

        $data ['keyword'] = $this->input->post('keyword', TRUE);;


    } else {

        $data ['keyword'] = null ;
    }


    if($this->input->post('kwComponent') != null){

        $data ['kwComponent'] = $this->input->post('kwComponent', TRUE);;


    } else {

        $data ['kwComponent'] = null ;
    }

    if($this->input->post('kwProject') != null){

        $data ['kwProject'] = $this->input->post('kwProject', TRUE);;


    } else {

        $data ['kwProject'] = null ;
    }
    $data['user'] = $this->db->get_where('tb_users', ['email' =>
    $this->session->userdata('email')])->row_array();
    if ($data['user'] != null){
    $data ['title'] = 'Halaman Data Supplier';
    $data ['supplier'] = $this->SupplierModel->get_current_page_records($limit_per_page, $data['start'], $data ['keyword'],$data ['kwComponent'], $data ['kwProject']);
    $data ['component'] = $this->SupplierModel->getAlldataComponent();
    $data ['project'] = $this->SupplierModel->getAlldataProject();
    $config['base_url'] = base_url().'supplier/page';;
    $config['total_rows'] = $totDataSupplier;
    $config['per_page'] = $limit_per_page;
    
    $this->pagination->initialize($config);
     
     

    $this->load->view('templates/header', $data);
    $this->load->view('supplier/index', $data);
    $this->load->view('templates/footer');
    } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }

    

   }

   public function addsupplier(){

    $this->form_validation->set_rules('nmSupplier','Name','required');
    $this->form_validation->set_rules('nmAddress','Address','required');
    $this->form_validation->set_rules('nmContactPerson','Contact Person','required');
    $this->form_validation->set_rules('noTelp','Telephon','required');
    $this->form_validation->set_rules('nmEmail','Email','required');


    
    if ($this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data['back'] = $_SERVER['HTTP_REFERER'];    
        $data ['title'] = 'Halaman Data Supplier';
        $data ['component'] = $this->SupplierModel->getAlldataComponent();
        $data ['project'] = $this->SupplierModel->getAlldataProject();
        $this->load->view('templates/header', $data);
        $this->load->view('supplier/vaddsupplier', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }

    } else {
        $date = date('Y-m-d H:i:s', strtotime('now'));
        $data = array (
            'name_supplier' => $_POST ['nmSupplier'],
            'supp_address' => $_POST ['nmAddress'],
            'contact_person' => $_POST ['nmContactPerson'],
            'id_project' => $_POST['nmProject'],
            'id_component' => $_POST['nmComponent'],
            'brand'   =>$_POST['nmBrand'],
            'tipe'    => $_POST['nmTipe'],
            'no_telphon' => $_POST['noTelp'],
            'brosur' => $_POST['nmBrosur'],
            'email'   => $_POST['nmEmail'],
            'description' => $_POST['nmDesc'],
            'date_created' => $date

        );
        
        $this->db->insert('tb_supplier', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Berhasil ditambahkan </div>');
        redirect('Supplier');
    }

   }
   public function saveUpdateSupplier()
	{

		$idSupplier = $_POST['idSupplier'];
        $nameSupp = $_POST['nmSupplier'];
        $address = $_POST ['nmAddress'];
        $contactPerson = $_POST ['nmContactPerson'];
        $idProject = $_POST['nmProject'];
        $idComponent = $_POST['nmComponent'];
        $brand = $_POST['nmBrand'];
        $tipe = $_POST['nmTipe'];
        $noTlp = $_POST['noTelp'];
        $brosur = $_POST['nmBrosur'];
        $email = $_POST['nmEmail'];
        $desc  = $_POST['nmDesc'];
        $date = date('Y-m-d H:i:s', strtotime('now'));
		$data = array(
			'name_supplier' => $nameSupp,
			'supp_address' => $address,
            'contact_person' => $contactPerson,
            'id_project' => $idProject,
            'id_component' => $idComponent,
            'brand' => $brand,
            'tipe' => $tipe,
            'no_telphon' => $noTlp,
            'brosur' => $brosur,
            'email' => $email,
            'description' => $desc,
            'date_update' => $date
		);
		
		$this->db->where('id_supplier', $idSupplier);
        $this->db->update('tb_supplier', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Update Success</div>');
        redirect('Supplier');

		
	}

   public function deleteSupplier($idSupplier){
	
    $this->db->where_in('id_supplier', $idSupplier);
    $this->db->delete('tb_supplier');	 

    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
    Data berhasil dihapus </div>');
	
	redirect ('Supplier');
		
	}

 }


?>

