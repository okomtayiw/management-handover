<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReportUndangan  extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('Pdf');
        $this->load->model('ReportModel');  
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
    }
 
    
    function index(){

        $unit = $this->uri->segment(2);
     
        
        $pdf = new PDF_MC_Table('P','mm',array(210,330));
        
        $exportpdf = $this->ReportModel->getReportUndangan($unit);
       
        if ($exportpdf > null ) {
        foreach ($exportpdf as $row){

    
           
            
        // membuat halaman baru
        $pdf->AddPage();
        // mencetak string 

        
            // Logo
     
        // Arial bold 15
        $pdf->Image('assets/img/logoleft.png',10,6,40);
        $pdf->Image('assets/img/logoright.png',160,6,40);
        $pdf->SetFont('Arial','B',15);
        // Move to the right
        $pdf->Cell(80);
        // Title
        $pdf->Cell(30,10,'PT MANDIRI BANGUN MAKMUR',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(200,0,'ASG Headquarter - PIK Office',0,1,'C');
        $pdf->Cell(200,8,'Jl. Pantai Indah Kapuk Boulevard',0,1,'C');
        $pdf->Cell(200,0,'Kamal Muara Penjaringan - Jakarta Utara ( 14470 )',0,1,'C');
        $pdf->Cell(200,8,'Telp. (021) 50 282 888 , 50 525 999',0,1,'C');
      
        // number undangan 
        $year = $row['year'];
        $bulan = $row['month'];
        $numlet = $row['nomor_undangan'].'/SU-TOK/MBM/'.romawi_bulan($bulan).'/'.$year;
        // $date = date('Y-m-d');
        $datenow = date_indo($row['date_undangan']);
        
       

        $dateinterval =date_create($row['date_undangan']);
        date_add($dateinterval,date_interval_create_from_date_string("7 days"));
        $dateaarival = longdate_indo(date_format($dateinterval,"Y-m-d"));
     
        $pdf->line(10,35,200,35,'C');
        $pdf->line(10,36,200,36,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'',0,1,true);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,0,'No. Ref : '.$numlet,0,1);
        $pdf->Cell(0,0,'Jakarta, '.$datenow,0,1,'R');
        $pdf->Ln(8);
        $pdf->Cell(0,0,'Kepada Yth.',0,1,'L');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'Bapak/Ibu '.$row['pemilik'],0,1,'L');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'Pemilik Tokyo Residences',0,1,'L');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'Unit Tower '.$unit,0,1,'L');
        $pdf->ln(5);
        $pdf->Cell(0,0,'Di',0,1,'L');
        $pdf->Ln(5);
        $pdf->Cell(0,0,$row['alamat'],0,1,'L');
        $pdf->Ln(15);
        $pdf->SetFont('Times','U','B');
        $pdf->Cell(0,0,'Hal : Undangan (Pemberitahuan) untuk Serah Terima Unit Tokyo Residences',0,1,'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,0,'Dengan Hormat,',0,1,'L');
        $pdf->Ln(5);
        $pdf->MultiCell(190,5,'Pertama-tama kami mengucapkan terima kasih atas kesediaan Bapak/Ibu yang telah bergabung dalam keluarga besar Tokyo Residences.',0,'J',false);
        $pdf->Ln(8);
        $pdf->MultiCell(190,5,'Dalam kesempatan ini kami mengundang Bapak/Ibu untuk melakukan serah terima dan menandatangani Berita Acara Serah Terima Unit Tokyo Residences, yang telah siap untuk diserahterimakan. Kami harap Bapak/Ibu dapat hadir untuk menandatangani Berita Acara Serah Terima Unit, serta pengambilan kunci pada:',0,'J',false);
        $pdf->Ln(8);
        $pdf->Cell(20,0,'Hari/Tanggal', 0, 0, 'L');
        $pdf->Cell(15,0,':', 0, 0, 'C');
        $pdf->Cell(0,0,$dateaarival, 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->Cell(20,0,'Waktu', 0, 0, 'L');
        $pdf->Cell(15,0,':', 0, '0', 'C');
        $pdf->Cell(0,0,'10.00 WIB', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(20,0,'Tempat', 0, 0, 'L');
        $pdf->Cell(15,0,':', 0, '0', 'C');
        $pdf->Cell(0,0,'Tower B, Lantai Basement 1 Kantor Defect & Handover', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(20,0,'Agenda/Acara', 0, 0, 'L');
        $pdf->Cell(15,0,':', 0, '0', 'C');
        $pdf->Cell(0,0,'Serah terima dan menandatangani Berita Acara Serah Terima Unit Tokyo Residences', 0, 0, 'L');
        $pdf->Ln(8);
        $pdf->MultiCell(190,5,"Sekiranya Bapak/Ibu berhalangan hadir, Bapak/Ibu dapat mewakilkan kepada pihak yang ditunjuk dengan membawa Surat Kuasa yang telah diLegalisasi Notaris. Adapun persyaratan yang harus dibawa untuk serah terima unit  tersebut adalah:",0,'J',false);
        $pdf->Ln(5);
        $pdf->Cell(5,0,'1.', 0, 0, 'L');
        $pdf->Cell(0,0,'Tanda bukti diri yang masih berlaku (KTP asli)', 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->Cell(5,0,'2.', 0, 0, 'L');
        $pdf->Cell(0,0,'Fotokopi Akta Nikah', 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->Cell(5,0,'3.', 0, 0, 'L');
        $pdf->Cell(0,0,'Fotokopi Kartu Keluarga', 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->Cell(5,0,'4.', 0, 0, 'L');
        $pdf->Cell(0,0,'Bukti Pembayaran yang sudah disetorkan (asli)', 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->Cell(5,0,'5.', 0, 0, 'L');
        $pdf->Cell(0,0,'Surat Kuasa dilegalisir Notaris dan tanda bukti diri pihak yang ditunjuk (bila diwakilkan)', 0, '0', 'L');
        $pdf->Ln(5);
        $pdf->MultiCell(190,5,"Kami mohon perhatian Bapak/Ibu bahwa apabila dalam jangka waktu 7 (tujuh) hari setelah tanggal untuk pelaksanaan serah terima tersebut di atas ternyata Bapak/Ibu tidak hadir, maka akan dianggap telah memberikan kuasa kepada pihak pengelola Tokyo Residences untuk sewaktu-waktu melakukan serah terima sepihak (dalam arti serah terima kepada Bapak/Ibu dianggap telah dilakukan walaupun tanpa kehadiran Bapak/Ibu)." ,0,'J',false);
        $pdf->Ln(2);
        $pdf->MultiCell(190,5,"Untuk informasi lebih lanjut atau apabila ada hal-hal yang kurang jelas, Bapak/Ibu dapat menghubungi customer service di telp. (021) 29200833",0,'J',false);
        $pdf->Ln(2);
        $pdf->MultiCell(190,5,"Demikian kami sampaikan atas perhatian dan kerjasamanya kami ucapkan terimakasih.",0,'J',false);
        $pdf->Ln(2);
        $pdf->Cell(0,0,'Hormat kami,',0,1,'L');
        $pdf->Image('assets/img/signature.jpeg',10,262,40);
        $pdf->Ln(50);
        $pdf->SetFont('Times','U','B');
        $pdf->Cell(10,0,'Nama Terang',0,1);
        // $pdf->Cell(150,0,'Rogers Kwandou',0,1,'R');
        $pdf->line(10,315,200,315,'C');
        $pdf->line(10,316,200,316,'C');
        
        }
        $pdf->Output();
    } else {

        $this->session->set_flashdata('messExportpdf','<div class="alert alert-danger" role="alert">
        Data belum ada</div>');

        redirect('report');
        }

    
    }

}