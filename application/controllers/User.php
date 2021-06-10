<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent:: __construct();
        $this->load->model('UserModel');  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->library('session');
    }
    public function index(){
    
        $totDataUser = $this->UserModel->totDataUser();

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
           
            $data ['title'] = 'Halaman Data User';
            $data ['users'] = $this->UserModel->get_current_page_records_users($limit_per_page, $data['start']);
            
            $config['base_url'] = base_url().'towerone/page';
            $config['total_rows'] = $totDataUser;
            $config['per_page'] = $limit_per_page;
    
            $this->pagination->initialize($config);
    
            $this->load->view('templates/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }



    //    public function addtowerone(){

    //     $this->form_validation->set_rules('nmUnit','Nama Unit','required');
    //     $this->form_validation->set_rules('nmPemilik','Nama Pemilik','required');
    //     $this->form_validation->set_rules('nmStatus','Status','required');
    
    
        
    //     if ($this->form_validation->run() == false) {
    //         $data['user'] = $this->db->get_where('tb_users', ['email' =>
    //         $this->session->userdata('email')])->row_array();
    //         if ($data['user'] != null){
    //             if (isset($_SERVER['HTTP_REFERER'])) {
    //                 $referer = $_SERVER['HTTP_REFERER'];
    //              } else {
    //                 $referer = '';
    //              }
    //         $data['back']  = $referer;  
    //         $data ['title'] = 'Halaman Data Supplier';
    //         $data ['towerone'] = $this->TowerOneModel->getAllDataTowerOne();
    //         $data ['status'] = $this->TowerOneModel->getAllDataStatus();
    //         $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
    //         $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('towerone/vaddtowerone', $data);
    //         $this->load->view('templates/footer');
    //         } else {
    
    //         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
    //         Please register to login</div>');
    
    //         redirect('auth');
    //         }
    
    //     } else {
    //         $date = date('Y-m-d H:i:s', strtotime('now'));
    //         $data = array (
    //             'lantai' => $_POST ['nmUnit'],
    //             'type_unit' => $_POST['nmType'],
    //             'sqm_unit'  => $_POST['nmSqm'],
    //             'pemilik' => $_POST['nmPemilik'],
    //             'email'   => $_POST['nmEmail'],
    //             'undangan' => $_POST['nmUndangan1'],
    //             'undangan2' => $_POST['nmUndangan2'],
    //             'undangan3' => $_POST['nmUndangan3'],
    //             'status'   =>$_POST['nmStatus'],
    //             'tanggal_ho' => $_POST['nmDateHO'],
    //             'pic_ho'   => $_POST['nmPicHO'],
    //             'id_defect'    => $_POST['nmDefect'],
    //             'tot_defect'    => $_POST['totDefect1'],
    //             'tgl_closing_defect_tenant' => $_POST['nmDateCloseDefectOneTenant'],
    //             'id_defect2' => $_POST['nmDefect2'],
    //             'tot_defect2'    => $_POST['totDefect2'],
    //             'tgl_closing_defect_tenant2' =>$_POST['nmDateCloseDefectTwoTenant'],
    //             'id_defect3' => $_POST['nmDefect3'],
    //             'tot_defect3'    => $_POST['totDefect3'],
    //             'tgl_closing_defect_tenant3' =>$_POST['nmDateCloseDefectTreeTenant'],
    //             'serah_terima_pom'  =>$_POST['nmDateToPom'],
    //             'id_status_unit' => $_POST['nmPaystatus'],
    //             'remote' => $_POST['nmRemote'],
    //             'kunci'  => $_POST['nmKunci'],
    //             'ready_ho'       => $_POST['nmKondisiUnit'],
    //             'no_seri_kwh_meter' => $_POST['nmNoSeriKWHMeter'],
    //             'daya_terpasang'    => $_POST['nmDayaTerpasang'],
    //             'start_awal_listrik' => $_POST['nmStartKwhListrik'],
    //             'no_seri_water_meter' => $_POST['nmNoSeriWaterMeter'],
    //             'start_awal_air' => $_POST['nmStartAwalAir'], 
    //             'keterangan' => $_POST['nmDesc'],
    //             'date_created' => $date
    //         );
            
    //         $this->db->insert('tbl_cta', $data);
    //         $this->session->set_flashdata('messageSuksesInsertTowerOne','<div class="alert alert-success" role="alert">
    //         Berhasil ditambahkan </div>');
    //         redirect('towerone');
    //     }
        
    
    //    }



       public function deleteuser($idUser){

            $this->db->where_in('id_users', $idUser);
            $this->db->delete('tb_users');	 
        
            $this->session->set_flashdata('msgDeleteTowerone','<div class="alert alert-success" role="alert">
            Data berhasil dihapus </div>');
            
            redirect ('user');

       }


       public function deletemultipletowerone(){
        $idUsers = $this->input->post('emp_id'); 
        $names = $idUsers;
        // $data = array (
        //     'lantai' => 'doni'
        // );
      
        // $sql = "insert into tbl_ctb (lantai)
        // values ('$names')";
        // $this->db->query($sql);

        // $sqlupdate = "UPDATE tbl_cta SET pemilik = 'koko' WHERE id_cta IN ($names)";
        // $this->db->query($sqlupdate);
                     
        $sqldel = "DELETE FROM tbl_cta WHERE id_cta IN ($names)";
        $this->db->query($sqldel);
        echo $names;
        }


      



       public function updateuser($idUser){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data['back'] = $_SERVER['HTTP_REFERER'];    
        $data ['title'] = 'Halaman Update Data User';
        $data ['users'] = $this->UserModel->getAllDataUserUpdate($idUser);
        $this->load->view('templates/header', $data);
        $this->load->view('users/updateusers', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
       }
       public function saveUpdateUser(){

        $idUser = $_POST['idUser'];
        $date = date('Y-m-d H:i:s', strtotime('now'));
        $level = $_POST['nmLevel'];
        $username = $_POST['nmUser'];
        $email = $_POST['nmEmail'];
        $status = $_POST['nmStatusUser'];
		$data = array(
            'username' => $username,
            'email' => $email,
            'status'  => $status,
            'role_id' => $level,
            'user_update' => $this->session->userdata('id_users'),
            'date_created' => $date

		);
		
		$this->db->where('id_users', $idUser);
        $this->db->update('tb_users', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Update Success</div>');
        redirect('user');

       
       }



}

?>