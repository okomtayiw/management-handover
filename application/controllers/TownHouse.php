<?php

class TownHouse extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('TownHouseModel');  
        $this->load->model('TowerOneModel');  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');  
        $this->load->library('pagination');
    }
    public function index(){
    
        $totDataTownhouse = $this->TownHouseModel->totDataTownhouse();
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
           
            $data ['title'] = 'Halaman Data Tower D';
            $data ['townhouse'] = $this->TownHouseModel->get_current_page_records_twh($limit_per_page, $data['start']);
            
            $config['base_url'] = base_url().'townhouse/page';
            $config['total_rows'] = $totDataTownhouse;
            $config['per_page'] = $limit_per_page;
    
            $this->pagination->initialize($config);
    
            $this->load->view('templates/header', $data);
            $this->load->view('townhouse/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }



       public function addtownhouse(){

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
            $data ['townhouse'] = $this->TownHouseModel->getAllDataTownHouse();
            $data ['status'] = $this->TowerOneModel->getAllDataStatus();
            $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
            $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
            $this->load->view('templates/header', $data);
            $this->load->view('townhouse/vaddtownhouse', $data);
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
                'id_defect'    => $_POST['nmDefect'],
                'tot_defect'    => $_POST['totDefect1'],
                'tgl_closing_defect_tenant' => $_POST['nmDateCloseDefectOneTenant'],
                'id_defect2' => $_POST['nmDefect2'],
                'tot_defect2'    => $_POST['totDefect2'],
                'tgl_closing_defect_tenant2' =>$_POST['nmDateCloseDefectTwoTenant'],
                'id_defect3' => $_POST['nmDefect3'],
                'tot_defect3'    => $_POST['totDefect3'],
                'tgl_closing_defect_tenant3' =>$_POST['nmDateCloseDefectTreeTenant'],
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
            
            $this->db->insert('tbl_townhouse', $data);
            $this->session->set_flashdata('messageSuksesInsertTowerFour','<div class="alert alert-success" role="alert">
            Berhasil ditambahkan </div>');
            redirect('townhouse');
        }
        
    
       }



       public function deletetownhouse($idTownhouse){

        $this->db->where_in('id_twnhouse', $idTownhouse);
        $this->db->delete('tbl_townhouse');	 
    
        $this->session->set_flashdata('msgDeleteTownHouse','<div class="alert alert-success" role="alert">
        Data berhasil dihapus </div>');
        
        redirect ('townhouse');

       }


       public function deletemultipletownhouse(){

      
        $idTownhouse = $this->input->post('emp_id');
        
        $names = $idTownhouse;

        // $data = array (
        //     'lantai' => 'doni'
        // );
      
        // $sql = "insert into tbl_ctb (lantai)
        // values ('$names')";
        // $this->db->query($sql);

        // $sqlupdate = "UPDATE tbl_cta SET pemilik = 'koko' WHERE id_cta IN ($names)";
        // $this->db->query($sqlupdate);
                     
        $sqldel = "DELETE FROM tbl_townhouse WHERE id_twnhouse IN ($names)";
        $this->db->query($sqldel);

        echo $names;
        
        }


        public function multiupdatehotownhouse(){


            $idTownhouse = $this->input->post('emp_id');
            $status = $this->input->post('status');

            $names = $idTownhouse;
            $sqlupdate = "UPDATE tbl_townhouse SET status = '$status' WHERE id_twnhouse IN ($names)";
            $this->db->query($sqlupdate);


            echo $names;




        }



       public function updatetownhouse($idTownhouse){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back'] = $referer;    
        $data ['title'] = 'Halaman Data Townhouse';
        $data ['townhouse'] = $this->TownHouseModel->getAllDataTownHouseUpdate($idTownhouse);
        $data ['status'] = $this->TowerOneModel->getAllDataStatus();
        $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
        $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
        $this->load->view('templates/header', $data);
        $this->load->view('townhouse/vupdatetownhouse', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }


       }


       public function saveUpdateTownHouse(){

        $idTownHouse = $_POST['idTownHouse'];
        $nameUnit = $_POST['nmUnit'];
        $type = $_POST['nmType'];
        $sqm =  $_POST['nmSqm'];
        $pemilik = $_POST ['nmPemilik'];
        $email = $_POST['nmEmail'];
        $nmUndangan = $_POST['nmUndangan'];
        $nmUndangan2 = $_POST['nmUndangan2'];
        $nmUndangan3 = $_POST['nmUndangan3'];
        $idStatus = $_POST['nmStatus'];
        $dateHO  =$_POST['nmDateHO'];
        $picHO = $_POST['nmPicHO'];
        $idDefect = $_POST['nmDefect'];
        $totDefect = $_POST['totDefect1'];
        $dateCloseDefectTenant = $_POST['nmDateCloseDefectOneTenant'];
        $idDefect2 = $_POST['nmDefect2'];
        $totDefect2 = $_POST['totDefect2'];
        $dateCloseDefectTenant2=$_POST['nmDateCloseDefectTwoTenant'];
        $idDefect3 = $_POST['nmDefect3'];
        $totDefect3  = $_POST['totDefect3'];
        $dateCloseDefectTenant3 = $_POST['nmDateCloseDefectTreeTenant'];
        $dateToPom  = $_POST['nmDateToPom'];
        $payStatus = $_POST['nmPaystatus'];
        $remote = $_POST['nmRemote'];
        $kunci = $_POST['nmKunci'];
        $kondisiUnit = $_POST['nmKondisiUnit'];
        $noKwhListrik = $_POST['nmNoSeriKWHMeter'];
        $dayaTerpasang    = $_POST['nmDayaTerpasang'];
        $startListrik = $_POST['nmStartKwhListrik'];
        $noWaterMeter = $_POST['nmNoSeriWaterMeter'];
        $startAir = $_POST['nmStartAwalAir']; 
        $desc  = $_POST['nmDesc'];
        $date = date('Y-m-d H:i:s', strtotime('now'));
		$data = array(
            'lantai' => $nameUnit,
            'pemilik' => $pemilik,
            'type_unit'  => $type,
            'sqm_unit'   => $sqm,
            'email'   => $email,
            'undangan' => $nmUndangan,
            'undangan2' => $nmUndangan2,
            'undangan3' =>$nmUndangan3,
            'tanggal_ho' => $dateHO,
            'pic_ho'  => $picHO,
            'status'   =>$idStatus,
            'id_defect'    => $idDefect,
            'tot_defect'  => $totDefect,
            'tgl_closing_defect_tenant' => $dateCloseDefectTenant,
            'id_defect2' => $idDefect2,
            'tot_defect2' => $totDefect2,
            'tgl_closing_defect_tenant2' => $dateCloseDefectTenant2,
            'id_defect3' => $idDefect3,
            'tot_defect3' => $totDefect3,
            'tgl_closing_defect_tenant3' => $dateCloseDefectTenant3,
            'id_status_unit' => $payStatus,
            'remote' => $remote,
            'kunci'  => $kunci,
            'ready_ho'       => $kondisiUnit,
            'no_seri_kwh_meter' => $noKwhListrik,
            'start_awal_listrik' => $startListrik,
            'daya_terpasang' => $dayaTerpasang,
            'no_seri_water_meter' => $noWaterMeter,
            'start_awal_air' => $startAir,
            'serah_terima_pom'  => $dateToPom,
            'keterangan' => $desc,
            'user_update' => $this->session->userdata('id_users'),
            'date_update' => $date

		);
		
		$this->db->where('id_twnhouse', $idTownHouse);
        $this->db->update('tbl_townhouse', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Update Success</div>');
        redirect('townhouse');

       
       }


       public function updateSyncroniseDataTownHouse(){

        $data  = $this->TowerOneModel->syncroniseData();

        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $pemilik = $row['itemStatus'];
        //     $penerimaan = $row['statusUnit'];
        //     $tunggakan = $row['tglUndangan1'];
        //     $sisadenda = $row['tglUndangan2'];


        //     $sqlupdate = "UPDATE tbl_townhouse SET pemilik = '$pemilik', penerimaan = '$penerimaan', tunggakan_pembayaran = '$tunggakan', sisa_denda = '$sisadenda'  WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);

        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $openqc = $row['itemStatus'];
        //     $closeqc = $row['statusUnit'];
        
        
        //     //$var = '20/04/2012';
           
        //         if($openqc != null ){
        //             $date = str_replace('/', '-', $openqc);
        //             $newDate1 = date('Y-m-d', strtotime($date));
        //         } else {
        //            $newDate1 ='';
        //         }

        //         if ($closeqc != null) {

        //             $date2 = str_replace('/', '-', $closeqc);
        //             $newDate2 = date('Y-m-d', strtotime($date2));
                    
        //         } else {

        //            $newDate2 = '';
        //         } 

         
        //         $sqlupdate = "UPDATE tbl_townhouse SET date_openQC = '$newDate1', date_closeQC = '$newDate2'  WHERE lantai = '$nameUnit'";
        //         $this->db->query($sqlupdate);

        //     }




              
        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $itemStatus = $row['itemStatus'];
        //     $undangan1 = $row['tglUndangan1'];
        //     $undangan2 = $row['tglUndangan2'];
        //     $undangan3 = $row['tgl_undangan3'];
        //     $tanggalSto =  $row['tanggal_sto'];
        //     //$var = '20/04/2012';
           
        //         if($undangan1 != null ){
        //             $date = str_replace('/', '-', $undangan1);
        //             $newDate1 = date('Y-m-d', strtotime($date));
        //         } else {
        //            $newDate1 ='';
        //         }

        //         if ($undangan2 != null) {

        //             $date2 = str_replace('/', '-', $undangan2);
        //             $newDate2 = date('Y-m-d', strtotime($date2));
                    
        //         } else {

        //            $newDate2 = '';
        //         } 

        //         if ( $undangan3 != null ) {
        //             $date3 = str_replace('/', '-', $undangan3);
        //             $newDate3 = date('Y-m-d', strtotime($date3));
                    
        //         } else {

        //             $newDate3 = '';

        //         } 

        //         if ($tanggalSto != null) {

        //             $datesto = str_replace('/', '-', $tanggalSto);
        //             $dateSTO =   date('Y-m-d', strtotime($datesto));
        //         } else {
        //             $dateSTO = '';
        //         }
                
                
               
            
        //         $sqlupdate = "UPDATE tbl_townhouse SET undangan = '$newDate1', undangan2 = '$newDate2', undangan3 = '$newDate3', tgl_sts = '$dateSTO'  WHERE lantai = '$nameUnit'";
        //         $this->db->query($sqlupdate);
            //  } else {

            //     echo " maaf gagal gaes";
            // }
           
           
           
            
            
       // }


        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $itemStatus = $row['itemStatus'];
        //     // $statusUnit = $row['statusUnit'];
        //     //$var = '20/04/2012';
        //     $date = str_replace('/', '-', $itemStatus);
        //     $newDate = date('Y-m-d', strtotime($date));
        //     $sqlupdate = "UPDATE tbl_townhouse SET tanggal_ho = '$newDate', status = '1' WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);
        // }


        // foreach($data as $row){

        //     $nameUnit = $row['itemName'];
        //     $itemStatus = $row['itemStatus'];
        //     $statusUnit = $row['statusUnit'];
        //     //$var = '20/04/2012';
        //     $date = str_replace('/', '-', $itemStatus);
        //     $newDate = date('Y-m-d', strtotime($date));
        //     $sqlupdate = "UPDATE tbl_townhouse SET pemilik = '$statusUnit', tgl_trs = '$newDate', ready_ho = 'Sudah siap serah terima',status_unit_barter = 'barter' WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);


        // }

    }
    
 
    
    

}