<?php

class ListUndangan extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('AlltowerModel');  
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

    $totDataUndangan = $this->AlltowerModel->totDataUndangan();
        
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


        // $date=date_create("2020-01-01");
        // date_add($date,date_interval_create_from_date_string("40 days"));
        // $datenow = date("Y-m-d");

        // $date1=date_create("2021-01-01");
        // $date2=date_create($datenow);
        // $diff=date_diff($date1,$date2);

        // %a outputs the total number of days
        // $date2 =  $diff->format("%a.");
        $data ['title'] = 'Halaman Data Undangan';
        $data ['listundangan'] = $this->AlltowerModel->get_current_page_records_undangan($limit_per_page, $data['start']);
        // $data ['dateinterval'] =  date_format($date,"Y-m-d");
        // $data ['totinterval'] = $date2;            
        $config['base_url'] = base_url().'listundangan/page';

        $config['total_rows'] = $totDataUndangan;
        $config['per_page'] = $limit_per_page;

        $this->pagination->initialize($config);

        $this->load->view('templates/header', $data);
        $this->load->view('listundangan/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    

   }

   public function updatestatusundangan(){
       
    $id = $this->input->post('emp_id');
    $names = $id;

    $sqlupdate = "UPDATE tbl_transaksi_undangan SET status_undangan = 'undangan dikirim' WHERE id_transaksi IN ($names)";
    $this->db->query($sqlupdate);

    echo $names;


   }




}