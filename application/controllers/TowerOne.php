<?php

class TowerOne extends CI_Controller {


    public function __construct()
    {
        parent:: __construct();
        $models = array(
            'AlltowerModel' => 'AlltowerModel',
            'TowerOneModel' => 'TowerOneModel'
         );
        $this->load->model($models);
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
        $this->load->helper('tgl_indo');
        $this->load->helper('date');
        $this->load->library('session');
        require APPPATH.'controllers/SendEmail.php';
    }
    public function index(){
            $data['user'] = $this->db->get_where('tb_users', ['email' =>
            $this->session->userdata('email')])->row_array();
            if ($data['user'] != null){

           
            $data ['title'] = 'Tower A';
            $data ['towerone'] = $this->TowerOneModel->get_current_page_records_twa();    
           
        
    
            $this->load->view('templates/header', $data);
            $this->load->view('towerone/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }

       public function addtowerone(){

        $this->form_validation->set_rules('nmUnit','Nama Unit','required');
        $this->form_validation->set_rules('nmPemilik','Nama Pemilik','required');
        $this->form_validation->set_rules('nmStatus','Status','required');
    
    
        
        if ($this->form_validation->run() == false) {
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
            $data ['towerone'] = $this->TowerOneModel->getAllDataTowerOne();
            $data ['status'] = $this->TowerOneModel->getAllDataStatus();
            $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
            $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
            $this->load->view('templates/header', $data);
            $this->load->view('towerone/vaddtowerone', $data);
            $this->load->view('templates/footer');
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
    
        } else {
            $date = date('Y-m-d H:i:s', strtotime('now'));
            $data = array (
                'lantai' => $_POST ['nmUnit'],
                'type_unit' => $_POST['nmType'],
                'sqm_unit'  => $_POST['nmSqm'],
                'pemilik' => $_POST['nmPemilik'],
                'email'   => $_POST['nmEmail'],
                'undangan' => $_POST['nmUndangan1'],
                'undangan2' => $_POST['nmUndangan2'],
                'undangan3' => $_POST['nmUndangan3'],
                'status'   =>$_POST['nmStatus'],
                'tanggal_ho' => $_POST['nmDateHO'],
                'pic_ho'   => $_POST['nmPicHO'],
                'serah_terima_pom'  =>$_POST['nmDateToPom'],
                'id_status_unit' => $_POST['nmPaystatus'],
                'remote' => $_POST['nmRemote'],
                'kunci'  => $_POST['nmKunci'],
                'ready_ho'       => $_POST['nmKondisiUnit'],
                'no_seri_kwh_meter' => $_POST['nmNoSeriKWHMeter'],
                'daya_terpasang'    => $_POST['nmDayaTerpasang'],
                'start_awal_listrik' => $_POST['nmStartKwhListrik'],
                'no_seri_water_meter' => $_POST['nmNoSeriWaterMeter'],
                'start_awal_air' => $_POST['nmStartAwalAir'], 
                'keterangan' => $_POST['nmDesc'],
                'date_created' => $date
            );
            
            $this->db->insert('tbl_cta', $data);
            $this->session->set_flashdata('messageSuksesInsertTowerOne','<div class="alert alert-success" role="alert">
            Berhasil ditambahkan </div>');
            redirect('towerone');
        }
        
    
       }



       public function deletetowerone($idTowerone){
            if($idTowerone != ''){
                $this->db->where_in('id_cta', $idTowerone);
                $this->db->delete('tbl_cta');	
                $this->session->set_flashdata('messageupdate','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Success delete data.
                </div>');

                
            } else {

                $this->session->set_flashdata('messageupdate','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Maaf data tidak ada
                </div>');

            }
            redirect ('towerone');

       }
       public function updatetowerone($idTowerone){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back'] = $referer;   
        $data ['title'] = 'Halaman Data Tower A';
        $data ['towerone'] = $this->TowerOneModel->getAllDataTowerOneUpdate($idTowerone);
        $data ['identitas'] = $this->TowerOneModel->gatDataIdentitasAddress($idTowerone); 
        $this->load->view('templates/header', $data);
        $this->load->view('towerone/vupdatetowerone', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
       }
       public function saveUpdateTowerOne(){
        $idTowerOne = $_POST['idTowerOne'];
        $nameUnit = $_POST['nmUnit'];
        $nmOwner = $_POST['nmOwner'];
        $date = date('Y-m-d H:i:s', strtotime('now'));
		$data = array(
            'lantai' => $nameUnit,
            'pemilik' => $nmOwner,
            'user_update' => $this->session->userdata('id_users'),
            'date_update' => $date
        );
     
       
		
   
        if ($nameUnit ==  '') {
            $this->session->set_flashdata('messageupdate','<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            Silahkan lengkapi data   
            </div>');

        } else {
            $this->db->where('id_cta', $idTowerOne);
            $this->db->update('tbl_cta', $data);
            $this->session->set_flashdata('messageupdate','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success update data berhasil.
            </div>');
        }
     
        redirect('towerOne');

       
       }


       public function saveUpdateAddress(){

        $nmAddress = $this->input->post('nmAddress');
        $noTelp = $this->input->post('noTelp');
        $nmUnit = $this->input->post('nmUnit');
        $idAddress = $this->input->post('idAddress');


        
        $this->AlltowerModel->saveUpdateDataAddress($nmAddress,$noTelp,$nmUnit, $idAddress);

       }

       public function saveAddAddress(){

        $nmAddress = $this->input->post('nmAddress');
        $noTelp = $this->input->post('noTelp');
        $nmUnit = $this->input->post('nmUnit');
       
        $this->AlltowerModel->saveAddDataAddress($nmAddress,$noTelp,$nmUnit);

       }


       public function deleteAddress(){
         $idAddres = $this->input->post('id');
         $this->AlltowerModel->deleteDataAddress($idAddres);
       }  
}