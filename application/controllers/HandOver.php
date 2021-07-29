<?php

class HandOver extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('TransactionModel');  
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
    
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data ['transaction'] = $this->TransactionModel->getAllDataTransaction();  
        $data['title'] = "Halaman serah terima";
        $this->load->view('templates/header', $data);
        $this->load->view('HandOver/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    

   }

   public function updatehandover($idTransaction){

        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data['title'] = "Halaman serah terima";    
        $data ['transaction'] = $this->TransactionModel->getDataTransaction($idTransaction);  
        $data ['towera'] = $this->TransactionModel->getAllDataUnitA();
        $data ['towerb'] = $this->TransactionModel->getAllDataUnitB();
        $data ['towerc'] = $this->TransactionModel->getAllDataUnitC();
        $data ['towerd'] = $this->TransactionModel->getAllDataUnitD();
        $data ['towere'] = $this->TransactionModel->getAllDataUnitE();
        $data ['towerf'] = $this->TransactionModel->getAllDataUnitF();
        $this->load->view('templates/header', $data);
        $this->load->view('HandOver/vupdatehandover', $data);
        $this->load->view('templates/footer');
        
            
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }

   }
   public function updatehandoverdetail($idTransaction){

        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $data['title'] = "Halaman serah terima";
        $nounit = $this->cekNameUnit($idTransaction);    
        $data ['transaction'] = $this->TransactionModel->getDataTransaction($idTransaction);  
        $data ['fileupload'] = $this->TransactionModel->getDataFileUpload($nounit);
        $data ['towera'] = $this->TransactionModel->getAllDataUnitA();
        $data ['towerb'] = $this->TransactionModel->getAllDataUnitB();
        $data ['towerc'] = $this->TransactionModel->getAllDataUnitC();
        $data ['towerd'] = $this->TransactionModel->getAllDataUnitD();
        $data ['towere'] = $this->TransactionModel->getAllDataUnitE();
        $data ['towerf'] = $this->TransactionModel->getAllDataUnitF();
        $this->load->view('templates/header', $data);
        $this->load->view('HandOver/vupdatehandoverdetail', $data);
        $this->load->view('templates/footer');
        
            
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
   }
   public function getunit(){
    $nmTower = $this->input->post('idTower');
    if($nmTower == 'A') {
        $data=$this->TransactionModel->getAllDataUnitA();
        echo json_encode($data);
    } else if ($nmTower == 'B'){
        $data=$this->TransactionModel->getAllDataUnitB();
        echo json_encode($data);
    } else if ($nmTower == 'C'){
        $data=$this->TransactionModel->getAllDataUnitC();
        echo json_encode($data);
    } else if ($nmTower == 'D'){
        $data=$this->TransactionModel->getAllDataUnitD();
        echo json_encode($data);
    } else if ($nmTower == 'E'){
        $data=$this->TransactionModel->getAllDataUnitE();
        echo json_encode($data);
    } else if ($nmTower == 'F'){
        $data=$this->TransactionModel->getAllDataUnitF();
        echo json_encode($data);
    }else {

    }
         
   }

   private function ceknumbertransaction(){
    $query = $this->db->query("SELECT MAX(number_trans) as maxKode FROM tbl_transaction");
    $maxnumber = $query->row();
    return $maxnumber->maxKode;
   } 

   private function cekNameUnit($idTransaction){
    $query = $this->db->query("SELECT id_unit as nounit FROM tbl_transaction WHERE id_transaction = '$idTransaction'");
    $numberunit = $query->row();
    return $numberunit->nounit;
   }

   public function saveHandOver(){
    $nmUnit =$this->input->post('nmUnit');
    $dateho = $this->input->post('dateho');
    $this->db->where('id_unit',$nmUnit);
    $result = $this->db->get('tbl_transaction')->num_rows();
    if($result == null){
        $no = $this->ceknumbertransaction()+1;
        $kode =  sprintf("%04s", $no);
        $userUpdate = $this->session->userdata('id_users');
        $datetimenow = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO tbl_transaction (id_unit, status,tgl_hand_over,date_created,created_at,number_trans) VALUES ('$nmUnit','Active','$dateho','$datetimenow','$userUpdate','$kode')");
        } else {

            $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data yang anda pilih sudah ada.
            </div>');  

        }
    }

    public function saveUpdateData(){

    $idTransaction = $this->input->post('idTransaction');
    $nmUnit = $this->input->post('nmUnit');
    $dateho = $this->input->post('dateho');

        $data = array(
            'id_unit' => $nmUnit,
            'tgl_hand_over' => $dateho
        );

        $this->db->where('id_transaction', $idTransaction);
        $this->db->update('tbl_transaction', $data);
    

        redirect('HandOver');
    
    }


    public function saveUpdateDetail(){


        $idTransaction = $this->input->post('idTransaction');
        $idTransDetail = $this->input->post('idTransactionDetail');
        $dateho = $this->input->post('dateHo');
        $nmTiar = $this->input->post('nmTiar');
        $noKwhListrik  =  $this->input->post('noKwhListrik');
        $startKwhListrik = $this->input->post('startKwhListrik');
        $noKwhAir  =  $this->input->post('noKwhAir');
        $startKwhAir = $this->input->post('startKwhAir');

        $data = array(
            'id_transaction' => $idTransaction,
            'tiar_tenant' => $nmTiar,
            'no_kwh_listrik' => $noKwhListrik,
            'start_kwh_listrik' => $startKwhListrik,
            'no_kwh_air' => $noKwhAir,
            'start_kwh_air' => $startKwhAir
        );


        $data2 = array(

            'tgl_hand_over' => $dateho

        );

        if ($idTransDetail == '') {
            
            //inserttabeltransactiondetail
            $this->db->insert('tbl_transaction_detail',$data);

            
            //updatetabeltransaction
            $this->db->where('id_transaction', $idTransaction);
            $this->db->update('tbl_transaction', $data2);

            echo "success insert data";

        } else {
            //updatetabeltransactiondetail
            $this->db->where('id_transaction_detail', $idTransDetail);
            $this->db->update('tbl_transaction_detail',$data);

            //updatetbltransaction
            $this->db->where('id_transaction', $idTransaction);
            $this->db->update('tbl_transaction', $data2);

            echo "success update data";

        }


       
        
        
    }

    public function saveHandOverEditStatus(){
        $idTransaction = $this->input->post('idTransaction');
        $nmStatus = $this->input->post('nameStatus');
        $data = array(
            'status' => $nmStatus
        );
        $this->db->where('id_transaction', $idTransaction);
        $this->db->update('tbl_transaction', $data);
        redirect("HandOver");
    }

   public function deletehandover($idhandover){
    if($idhandover != ''){
        $this->db->where_in('id_transaction', $idhandover);
        $this->db->delete('tbl_transaction');	
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        Success delete data.
        </div>');   
    } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        Maaf data tidak ada
        </div>');

    }
    redirect ('HandOver');

    }

    public function deleteFileUpload(){
        $idFileUpload = $this->input->post('idFileUpload'); 
        // $this->TransactionModel->deleteDataFileUpload($idFileUpload);

        $this->db->where_in('id_fileupload', $idFileUpload);
        $this->db->delete('tbl_fileupload');	
        
    }
}