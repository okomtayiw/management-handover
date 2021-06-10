<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReportPdf  extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('Pdf');
        $this->load->model('ReportModel');  
        $this->load->helper('url');
    }
 
    
    function index(){

        $status = $this->uri->segment(2);
     
        
        $pdf = new PDF_MC_Table('L','mm','A4');
        if ($status != ''){
        $exportpdf = $this->ReportModel->getAllDataReportAllStatus($status);
        } else {
            $exportpdf = $this->ReportModel->getAllDataTowerReport();
        }
        if ($exportpdf > null ) {
        // membuat halaman baru
        $pdf->AddPage();
        // mencetak string 
        
        $pdf->SetFont('Arial','B',16);
        
        $pdf->SetFont('Arial','B',8);
        $pdf->SetFillColor(210,221,242);
        $pdf->Cell(15,10,'NO.',1,0,'C', true);
        $pdf->Cell(30,10,'UNIT',1,0,'C', true);
        $pdf->Cell(40,10,'PEMILIK',1,0,'C', true);
        $pdf->Cell(30,10,'STATUS',1,0,'C', true);
        $pdf->Cell(30,10,'PIC HO',1,0,'C', true);
        $pdf->Cell(30,10,'TANGGAL HO',1,0,'C', true);
        $pdf->Cell(30,5,'TYPE/SQM',1,0,'C', true);
        $pdf->cell(35,10,'STATUS UNIT READY',1,0,'C', true);
        $pdf->Cell(40,10,'KETERANGAN',1,0,'C', true);
        $pdf->cell(0,5,'',0,1);
        //multi cell
        $pdf->cell(175,5,'', 0, 0);
        $pdf->cell(15,5,'TYPE', 1,0,'C', true);
        $pdf->cell(15,5,'SQM', 1,0,'C', true);
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $pdf->SetWidths(Array(15,30,40,30,30,30,15,15,35,40));

        $pdf->SetAligns(array('C','L','C','C','C','C','C','C','L','L'));
    

        
        
        $no = 1;
        foreach ($exportpdf as $row){

            if($row['tanggal_ho'] == '0000-00-00') {

                 $tanggalHO = '';
             } else {

               $tanggalHO = $row['tanggal_ho'];
            }
            $pdf->Row(Array($no++,
                $row ['lantai'],
                $row ['pemilik'],
                $row ['nameStatus'],
                $row ['pic_ho'],
                $tanggalHO,
                $row ['type_unit'],
                $row ['sqm_unit'],
                $row ['id_status_unit'],
                $row ['keterangan']
            ));
           
        }
        $pdf->Output();
    } else {

        $this->session->set_flashdata('messExportpdf','<div class="alert alert-danger" role="alert">
        Data belum ada</div>');

        redirect('report');
        }

    
    }

}