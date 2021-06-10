<?php

class Report extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('ReportModel');  
        $this->load->model('TowerOneModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->library('session');
    }
    public function index(){
    
        $totDataTowerReport1 = $this->ReportModel->totDataTowerReporta();
        $totDataTowerReport2 = $this->ReportModel->totDataTowerReportb();
        $totDataTowerReport3 = $this->ReportModel->totDataTowerReportc();
        $totDataTowerReport4 = $this->ReportModel->totDataTowerReportd();
        $totDataTowerReport5 = $this->ReportModel->totDataTowerReporte();
        $totDataTowerReport6 = $this->ReportModel->totDataTowerReportf();

    


        $totDataTowerReport = $totDataTowerReport1 + $totDataTowerReport2 + $totDataTowerReport3 + $totDataTowerReport4 + $totDataTowerReport5 + $totDataTowerReport6;


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
           
            $data ['title'] = 'Halaman Data Report';
            $statusname = $this->input->post('nmStatus');
            if ($statusname != null ){
            $data ['report'] = $this->ReportModel->get_current_page_records_twreportstatus($limit_per_page, $data['start'], $statusname);     
            } else {
            $data ['report'] = $this->ReportModel->get_current_page_records_twreport($limit_per_page, $data['start']);
            }
            $config['base_url'] = base_url().'report/page';
            $config['total_rows'] = $totDataTowerReport;
            $config['per_page'] = $limit_per_page;
            $data['status'] = $this->TowerOneModel->getAllDataStatus();
            $data['sesisonstatus'] = $statusname;
    
            $this->pagination->initialize($config);

    
            $this->load->view('templates/header', $data);
            $this->load->view('report/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
        }
}