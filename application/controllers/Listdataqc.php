<?php 

class Listdataqc extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('DataQCModel');  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('tgl_indo');
    }
    public function index(){
    
        $totDataAllQc = $this->DataQCModel->totDataQcAllTower();
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
            $limit_per_page = $countData; 
            if ($countData == ''){
                $limit_per_page = 10;
            }else {

                $limit_per_page = $countData;
            }
           
            $data ['title'] = 'Halaman Data Qc All Tower';
            $data ['dataallqc'] = $this->DataQCModel->get_current_page_records_qcalltower($limit_per_page, $data['start']);
            
            $config['base_url'] = base_url().'listdataqc/page';
            $config['total_rows'] = $totDataAllQc;
            $config['per_page'] = $limit_per_page;
    
            $this->pagination->initialize($config);
    
            $this->load->view('templates/header', $data);
            $this->load->view('dataallqc/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }

       public function   adddataqc(){
           
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back']  = $referer;  
        $data ['title'] = 'Halaman Data Supplier';
        $data ['listDataUnit'] = $this->DataQCModel->dataUnit();
        $this->load->view('templates/header', $data);
        $this->load->view('dataallqc/adddataqc', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }

       }

       public function updatestatusone(){

        $id = $this->input->post('emp_id');
        $status = $this->input->post('status');
        $dateclose =  $this->input->post('dateclose');
        $names = $id;
      
        $sqlupdate = "UPDATE tbl_qc SET status_qc_thp1 = '$status', date_close_qc_thp1 = '$dateclose' WHERE id_qc IN ($names)";
        $this->db->query($sqlupdate);
        echo $names;
        

       }

       public function updatedataqc(){

        $id = $this->input->post('emp_id');
        $status = $this->input->post('status');
        $dateclose =  $this->input->post('dateclose');
        $names = $id;
      
        $sqlupdate = "UPDATE tbl_qc SET status_qc_thp1 = '$status', date_close_qc_thp1 = '$dateclose' WHERE id_qc IN ($names)";
        $this->db->query($sqlupdate);
        echo $names;
              


       }



       public function updatestatustwo(){

        $id = $this->input->post('emp_id');
        $status = $this->input->post('status');
        $dateclose =  $this->input->post('dateclose');
        $names = $id;
        $sqlupdate = "UPDATE tbl_qc SET status_qc_thp2 = '$status', date_close_qc_thp2 = '$dateclose' WHERE id_qc IN ($names)";
        $this->db->query($sqlupdate);
        echo $names;
        

       }


       public function savedataqc() {
        
        $nameUnit =  $this->input->post('unit'); 

        $query = $this->db->query("SELECT * FROM tbl_cta 
        LEFT OUTER JOIN tbl_qc ON tbl_cta.lantai = tbl_qc.name_unit
        WHERE tbl_qc.name_unit = '$nameUnit'");
        
        
        if ($query->num_rows() > 0)
        {

           
             redirect('listdataqc');
        } else {

            $data = array( 
                'name_unit'	=>  $_POST['unit'] , 
                'date_qc_thp1'=>  $_POST['dateOpenQc'], 
                'tim_cek_list'	=>  $_POST['nmTimQc']
            );
             $this->db->insert('tbl_qc', $data);
            redirect('listdataqc');
        }


        return false;
  

       }


       public function deletedataqc($idQc){

        $this->db->where_in('id_qc', $idQc);
        $this->db->delete('tbl_qc');	 

        
        redirect ('listdataqc');

        }

       public function dataunitone(){

        $query = $this->db->query("SELECT * FROM tbl_cta");


      
        foreach ($query->result() as $row)
        {
            echo '<option value="'.$row->lantai.'">'.$row->lantai.'</option>';
        }

       } 


       public function dataunittwo(){

        $query = $this->db->query("SELECT * FROM tbl_ctb");


      
        foreach ($query->result() as $row)
        {
            echo '<option value="'.$row->lantai.'">'.$row->lantai.'</option>';
        }

       } 


       public function dataunittree(){

        $query = $this->db->query("SELECT * FROM tbl_stc");


      
        foreach ($query->result() as $row)
        {
            echo '<option value="'.$row->lantai.'">'.$row->lantai.'</option>';
        }

       } 


       public function dataunitfour(){

        $query = $this->db->query("SELECT * FROM tbl_std");


      
        foreach ($query->result() as $row)
        {
            echo '<option value="'.$row->lantai.'">'.$row->lantai.'</option>';
        }

       } 


       public function dataunittw(){

        $query = $this->db->query("SELECT * FROM tbl_townhouse");


      
        foreach ($query->result() as $row)
        {
            echo '<option value="'.$row->lantai.'">'.$row->lantai.'</option>';
        }

       } 




} 