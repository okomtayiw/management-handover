<?php

class Project extends CI_Controller {
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('ProjectModel');  
       $this->load->helper('url_helper');  
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('form_validation');    
   }

   public function index(){

    $this->load->library('pagination');
    $totDataProject = $this->ProjectModel->totDataProject();

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

        // if ($totDataProject > 0 ){

            $data['user'] = $this->db->get_where('tb_users', ['email' =>
            $this->session->userdata('email')])->row_array();
            if ($data['user'] != null){
            $data ['title'] = 'Halaman Data Project';
            $data ['project'] = $this->ProjectModel->get_current_page_records_proj($limit_per_page, $data['start']);

            $config['base_url'] = base_url().'project/page';
            $config['total_rows'] = $totDataProject;
            $config['per_page'] = $limit_per_page;

            $this->pagination->initialize($config);


            $this->load->view('templates/header', $data);
            $this->load->view('project/index', $data);
            $this->load->view('templates/footer');
            } else {

            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');

            redirect('auth');
            }

        // }
    }

   public function insertProject(){


    $date = date('Y-m-d H:i:s', strtotime('now'));
    $data = array (
          'name_project' => $_POST ['nmProject'],
          'date_created' => $date

    );
     
    $this->db->insert('tb_project', $data);
        redirect('Project');



   }

   public function saveUpdateProject(){

    $idProject = $_POST['idProject'];
    $nameProject  = $_POST['nmProject'];
    $date = date('Y-m-d H:i:s', strtotime('now'));
    $data = array (
          'name_project' => $nameProject,
          'date_update' => $date

    );


    $this->db->where('id_project', $idProject);
	$this->db->update('tb_project', $data);

		redirect('Project');
   }

   public function deleteProject($idProject){

    $this->db->where_in('id_project', $idProject);
    $this->db->delete('tb_project');	 
	
	redirect ('Project');


   }

}

?>