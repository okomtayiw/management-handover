<?php

class ListDefect extends CI_Controller {

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
    
        $nameunit = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['user'] = $this->db->get_where('tb_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        if ($data['user'] != null){

     

        $data ['title'] = 'Halaman Data List Defect '.$nameunit;
        $data ['unit'] = $nameunit;
        $data ['listdefect'] = $this->AlltowerModel->get_current_page_records_lisdefect($nameunit);
        $data ['statusDefect'] = $this->AlltowerModel->getAllDataDefectStatus();
      

        $this->load->view('templates/header', $data);
        $this->load->view('listdefect/index', $data);
        $this->load->view('templates/footer');
              
        } else {

        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Please register to login</div>');

        redirect('auth');
        }
    

   }

   public function adddefect(){

            $date = date('Y-m-d H:i:s', strtotime('now'));
            $data = array (
                'name_unit' => $_POST ['nmunit'],
                'status_defect' => $_POST['nmStatusDefect'],
                'jenis_defect'  => $_POST['nmFaseDefect'],
                'tot_defect' => $_POST['nmJmlDefect'],
                'date_open_defect'   => $_POST['nmDateDefect'],
                'keterangan'        => $_POST['nmKeterangan'],
                'date_created' => $date
            );
            
            $this->db->insert('tbl_transaksi_defect', $data);
            $this->session->set_flashdata('messageupdate','&nbsp;&nbsp;&nbsp;&nbsp;<div style="width: 500px; " class="mx-auto alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sukses!</strong>Data berhasil ditambahkan!
            </div>');
            redirect('listDefect/'.$_POST['nmunit']);


   }


   public function updatedefect(){

    $date = date('Y-m-d H:i:s', strtotime('now'));
    $data = array (
        'name_unit' => $_POST ['nmunit'],
        'status_defect' => $_POST['nmStatusDefect'],
        'jenis_defect'  => $_POST['nmFaseDefect'],
        'tot_defect' => $_POST['nmJmlDefect'],
        'date_open_defect'   => $_POST['nmDateDefect'],
        'date_close_defect'  => $_POST['nmDateCloseDefect'],
        'keterangan'        => $_POST['nmKeterangan'],
        'date_update' => $date
    );

    $this->db->where('id_transaksi_defect', $_POST['idTranDefect']);
    $this->db->update('tbl_transaksi_defect', $data);
    $this->session->set_flashdata('messageupdate','&nbsp;&nbsp;&nbsp;&nbsp;<div style="width: 500px; " class="mx-auto alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sukses!</strong> Update data berhasil!
    </div>');
     
    redirect('listDefect/'.$_POST['nmunit']);

   }

   public function deleteDefect($idtransaksidefect){

    $unit = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


    $this->db->where_in('id_transaksi_defect', $idtransaksidefect);
    $this->db->delete('tbl_transaksi_defect');	 
    
    redirect('listDefect/'.$unit);


   }



   




}