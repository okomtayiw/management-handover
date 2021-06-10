<?php

class TowerFour extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('TowerFourModel');  
        $this->load->model('TowerOneModel');  
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
           
            $data ['title'] = 'Halaman Data Tower D';
            $data ['towerfour'] = $this->TowerFourModel->get_current_page_records_twd();
            
        
         
    
            $this->load->view('templates/header', $data);
            $this->load->view('towerfour/index', $data);
            $this->load->view('templates/footer');
                  
            } else {
    
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Please register to login</div>');
    
            redirect('auth');
            }
        
    
       }



       public function addtowerfour(){

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
            $data ['towerfour'] = $this->TowerFourModel->getAllDataTowerFour();
            $data ['status'] = $this->TowerOneModel->getAllDataStatus();
            $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
            $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
            $this->load->view('templates/header', $data);
            $this->load->view('towerfour/vaddtowerfour', $data);
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
            
            $this->db->insert('tbl_std', $data);
            $this->session->set_flashdata('messageSuksesInsertTowerFour','<div class="alert alert-success" role="alert">
            Berhasil ditambahkan </div>');
            redirect('towerfour');
        }
        
    
       }



       public function deletetowerfour($idTowerfour){

        $this->db->where_in('id_std', $idTowerfour);
        $this->db->delete('tbl_std');	 
    
        $this->session->set_flashdata('msgDeleteTowerFour','<div class="alert alert-success" role="alert">
        Data berhasil dihapus </div>');
        
        redirect ('towerfour');

       }


       public function deletemultipletowerfour(){

      
        $idTowerfour = $this->input->post('emp_id');
        
        $names = $idTowerfour;

        // $data = array (
        //     'lantai' => 'doni'
        // );
      
        // $sql = "insert into tbl_ctb (lantai)
        // values ('$names')";
        // $this->db->query($sql);

        // $sqlupdate = "UPDATE tbl_cta SET pemilik = 'koko' WHERE id_cta IN ($names)";
        // $this->db->query($sqlupdate);
                     
        $sqldel = "DELETE FROM tbl_std WHERE id_std IN ($names)";
        $this->db->query($sqldel);

        echo $names;
        
        }


        public function multiupdatehotowerfour(){


            $idTowerfour = $this->input->post('emp_id');
            $status = $this->input->post('status');

            $names = $idTowerfour;
            $sqlupdate = "UPDATE tbl_std SET status = '$status' WHERE id_std IN ($names)";
            $this->db->query($sqlupdate);


            echo $names;




        }



       public function updatetowerfour($idTowerFour){
     
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer = $_SERVER['HTTP_REFERER'];
             } else {
                $referer = '';
             }
        $data['back'] = $referer;    
        $data ['title'] = 'Halaman Data Tower D';
        $data ['towerfour'] = $this->TowerFourModel->getAllDataTowerFourUpdate($idTowerFour);
        $data ['status'] = $this->TowerOneModel->getAllDataStatus();
        $data ['sDefect'] = $this->TowerOneModel->getAllDataDefectStatus();
        $data ['payStatus'] =  $this->TowerOneModel->getAllDataStatusPayment();
        $this->load->view('templates/header', $data);
        $this->load->view('towerfour/vupdatetowerfour', $data);
        $this->load->view('templates/footer');
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }


       }


       public function saveUpdateTowerFour(){

        $idTowerFour = $_POST['idTowerFour'];
        if (isset($_POST['sendEmail']) != ''){
            $sendemail = $_POST['sendEmail'];
        } else {
            $sendemail = '';
        }
        $nameUnit = $_POST['nmUnit'];
        $type = $_POST['nmType'];
        $sqm =  $_POST['nmSqm'];
        $pemilik = $_POST ['nmPemilik'];
        $address = $_POST ['nmAddress'];
        $email = $_POST['nmEmail'];
        $nmUndangan = $_POST['nmUndangan'];
        $nmUndangan2 = $_POST['nmUndangan2'];
        $nmUndangan3 = $_POST['nmUndangan3'];
        $idStatus = $_POST['nmStatus'];
        $dateHO  =$_POST['nmDateHO'];
        $picHO = $_POST['nmPicHO'];
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
            'address_pemilik' => $address,
            'type_unit'  => $type,
            'sqm_unit'   => $sqm,
            'email'   => $email,
            'undangan' => $nmUndangan,
            'undangan2' => $nmUndangan2,
            'undangan3' =>$nmUndangan3,
            'tanggal_ho' => $dateHO,
            'pic_ho'  => $picHO,
            'status'   =>$idStatus,
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
        
        if ($sendemail == 'send' && $idStatus == 1){
            $query = $this->db->query("SELECT * FROM tbl_pic_project WHERE name_tower = 'TOWER D'");
            $sendemail = new SendEmail();
            foreach ($query->result_array() as $row)
            {
                
                $sendemail->index($nameUnit,$row['email']);
            }
        }
		
		$this->db->where('id_std', $idTowerFour);
        $this->db->update('tbl_std', $data);
        $this->session->set_flashdata('messageupdate','&nbsp;&nbsp;&nbsp;&nbsp;<div style="width: 500px; " class="mx-auto alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sukses!</strong> Update data berhasil!
        </div>');
        redirect('towerfour');

       
       }

       public function transaksiundangan(){

        $id = $this->input->post('emp_id');
        $jenisundangan = $this->input->post('jenisundangan');
        $dateundangan =  $this->input->post('dateundangan');
        $names = $id;
        $this->updateUndangan($dateundangan,$names);
        $query = $this->db->query("SELECT * FROM tbl_std WHERE id_std IN ($names)");
        foreach ($query->result_array() as $row)
        {
            $nameunit = $row['lantai'];    
            $no = $this->ceknumbersurat()+1;
            $kode =  sprintf("%04s", $no);
            $this->db->query("INSERT INTO tbl_transaksi_undangan (nama_unit,jenis_undangan,date_undangan,nomor_undangan) VALUES ('$nameunit','$jenisundangan','$dateundangan','$kode')");
            
          
        }
        
        echo $names;
        



       }

       function updateUndangan($dateUndangan, $names){

        $sqlupdate = "UPDATE tbl_std SET undangan = '$dateUndangan' WHERE id_std IN ($names)";
        $this->db->query($sqlupdate);


       }

       function updatezeroundangan(){
        $sqlupdate = "UPDATE tbl_std SET undangan = ''";
        $this->db->query($sqlupdate);

       }


      function ceknumbersurat(){
          
        $month = date('n');
        $query2 = $this->db->query("SELECT MAX(nomor_undangan) as maxKode FROM tbl_transaksi_undangan WHERE month(date_undangan)='$month'");
        $maxnumber = $query2->row();

        return $maxnumber->maxKode;

      }


       public function updateSyncroniseDataTowerFour(){

        $data  = $this->TowerOneModel->syncroniseData();


        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $pemilik = $row['itemStatus'];
        //     $penerimaan = $row['statusUnit'];
        //     $tunggakan = $row['tglUndangan1'];
        //     $sisadenda = $row['tglUndangan2'];


        //     $sqlupdate = "UPDATE tbl_std SET pemilik = '$pemilik', penerimaan = '$penerimaan', tunggakan_pembayaran = '$tunggakan', sisa_denda = '$sisadenda'  WHERE lantai = '$nameUnit'";
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

         
        //         $sqlupdate = "UPDATE tbl_std SET date_openQC = '$newDate1', date_closeQC = '$newDate2'  WHERE lantai = '$nameUnit'";
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
                
                
               
            
        //         $sqlupdate = "UPDATE tbl_std SET undangan = '$newDate1', undangan2 = '$newDate2', undangan3 = '$newDate3', tgl_sts = '$dateSTO'  WHERE lantai = '$nameUnit'";
        //         $this->db->query($sqlupdate);
            //  } else {

            //     echo " maaf gagal gaes";
            // }
           
           
           
            
            
       // }


       

       foreach($data as $row) {

        $nameUnit = $row['itemName'];
        $itemStatus = $row['itemStatus'];
        $statusUnit = $row['tglUndangan1'];
        $tim  = $row['statusUnit'];
        //$var = '20/04/2012';
        $date = str_replace('/', '-', $itemStatus);
        $newDate = date('Y-m-d', strtotime($date));
        $status = "Team QC Pak Remko";

        $this->db->query("INSERT INTO tbl_qc (name_unit,date_qc_thp1,tim_cek_list) VALUES ('$nameUnit','$newDate','$status')");


        }


        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     $itemStatus = $row['itemStatus'];
        //     // $statusUnit = $row['statusUnit'];
        //     //$var = '20/04/2012';
        //     $date = str_replace('/', '-', $itemStatus);
        //     $newDate = date('Y-m-d', strtotime($date));
        //     $sqlupdate = "UPDATE tbl_std SET tanggal_ho = '$newDate', status = '1' WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);
        // }


        // foreach($data as $row){
        //     $nameUnit = $row['itemName'];
        //     // $itemStatus = $row['itemStatus'];
        //     // // $statusUnit = $row['statusUnit'];
        //     // //$var = '20/04/2012';
        //     // $date = str_replace('/', '-', $itemStatus);
        //     // $newDate = date('Y-m-d', strtotime($date));
        //     $sqlupdate = "UPDATE tbl_std SET ready_ho = 'Sudah siap serah terima', keterangan = 'ready' WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);

        // }


        // foreach($data as $row){

        //     $nameUnit = $row['itemName'];
        //     $itemStatus = $row['itemStatus'];
        //     $statusUnit = $row['statusUnit'];
        //     //$var = '20/04/2012';
        //     $date = str_replace('/', '-', $itemStatus);
        //     $newDate = date('Y-m-d', strtotime($date));
        //     $sqlupdate = "UPDATE tbl_std SET pemilik = '$statusUnit', tgl_trs = '$newDate', ready_ho = 'Sudah siap serah terima',status_unit_barter = 'barter' WHERE lantai = '$nameUnit'";
        //     $this->db->query($sqlupdate);
        // }

    }
    
 
    
    

}