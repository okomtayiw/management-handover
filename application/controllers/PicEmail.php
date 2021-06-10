<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PicEmail extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Data_modelpic');  
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

    $totDataPicProject = $this->Data_modelpic->get_count();
        
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

      
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){

        $countData = $this->input->post('scount'); 

    
        if ($countData == 0){
            $limit_per_page = 10;
        }else if ($countData != 0){

            $limit_per_page = $countData;

        } else {

            $limit_per_page = $countData;
        }


    
        $data ['title'] = 'Halaman Data Pic Project';
        $data ['picemail'] = $this->Data_modelpic->get_current_page_records_picproject($limit_per_page, $data['start']);         
        $config['base_url'] = base_url().'PicEmail/page';

        $config['total_rows'] = $totDataPicProject;
        $config['per_page'] = $limit_per_page;

        $this->pagination->initialize($config);

        $this->load->view('templates/header', $data);
        $this->load->view('picemail/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    

   }

   public function addpicemail(){
    $data['user'] = $this->db->get_where('tb_users', ['email' =>
    $this->session->userdata('email')])->row_array();
    if ($data['user'] != null){
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = $_SERVER['HTTP_REFERER'];
         } else {
            $referer = '';
         }
    $data['back']  = $referer;  
    $this->load->view('templates/header', $data);
    $this->load->view('picemail/vaddpicproject', $data);
    $this->load->view('templates/footer');
    } else {

    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
    Please register to login</div>');

    redirect('auth');
    }
   }


   public function adddatapicemail(){

    $data = array (
        'name_pic_project' => $_POST ['nmPic'],
        'email' => $_POST ['nmEmail'],
        'name_tower' => $_POST['nmTower']
        
    );
   
    $this->db->insert('tbl_pic_project', $data);
      redirect('PicEmail');

     }

    public function deletepicproject($idPicProject){

        $this->db->where_in('id_pic_project', $idPicProject);
        $this->db->delete('tbl_pic_project');	 
        
        redirect ('PicEmail');
    
    } 

    public function updatepicproject($idpicproject){
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back'] = $referer;   
        $data ['title'] = 'Halaman Update Pic Email';
        $data ['picemail'] = $this->Data_modelpic->getAllDataPicProject($idpicproject);
        $this->load->view('templates/header', $data);
        $this->load->view('picemail/vupdatepicemail', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }

    }
    

    public function saveUpdatepicEmail(){

        $idPicproject = $_POST['idPicProject'];
        $namePicProject  = $_POST['nmPic'];
        $email = $_POST['nmEmail'];
        $nmTower = $_POST['nmTower'];
        $data = array (
              'name_pic_project' => $namePicProject,
              'email' => $email,
              'name_tower' => $nmTower
    
        );
    
    
        $this->db->where('id_pic_project', $idPicproject);
        $this->db->update('tbl_pic_project', $data);
        $this->session->set_flashdata('messageupdate','&nbsp;&nbsp;&nbsp;&nbsp;<div style="width: 500px; " class="mx-auto alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sukses!</strong> Update data berhasil!
        </div>');
    
        redirect('PicEmail');


    }


}
