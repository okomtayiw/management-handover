<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExportExcel extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('AlltowerModel');     
    $this->load->helper('url');
  }
  
 
  
  public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    $month = $this->input->get('nmMonth');
		$year = $this->input->get('nmYear');
    $tower = $this->input->get('nmTower');
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();




    $dataUnitlevel5 = $this->AlltowerModel->allDataUnitLevel5($month,$year,$tower);	
		$dataUnitlevel6 = $this->AlltowerModel->allDataUnitLevel6($month,$year,$tower);	
		$dataUnitlevel7 = $this->AlltowerModel->allDataUnitLevel7($month,$year,$tower);	
		$dataUnitlevel8 = $this->AlltowerModel->allDataUnitLevel8($month,$year,$tower);	
		$dataUnitlevel9 = $this->AlltowerModel->allDataUnitLevel9($month,$year,$tower);	
		$dataUnitlevel10 = $this->AlltowerModel->allDataUnitLevel10($month,$year,$tower);
		$dataUnitlevel11 = $this->AlltowerModel->allDataUnitLevel11($month,$year,$tower);	
    $dataUnitlevel12 = $this->AlltowerModel->allDataUnitLevel12($month,$year,$tower);	
		$dataUnitlevel15= $this->AlltowerModel->allDataUnitLevel15($month,$year,$tower);
		$dataUnitlevel16 = $this->AlltowerModel->allDataUnitLevel16($month,$year,$tower);	
		$dataUnitlevel17 = $this->AlltowerModel->allDataUnitLevel17($month,$year,$tower);	
		$dataUnitlevel18 = $this->AlltowerModel->allDataUnitLevel18($month,$year,$tower);	
		$dataUnitlevel19 = $this->AlltowerModel->allDataUnitLevel19($month,$year,$tower);	
		$dataUnitlevel20 = $this->AlltowerModel->allDataUnitLevel20($month,$year,$tower);	
		$dataUnitlevel21 = $this->AlltowerModel->allDataUnitLevel21($month,$year,$tower);	
		$dataUnitlevel22 = $this->AlltowerModel->allDataUnitLevel22($month,$year,$tower);	
		$dataUnitlevel23 = $this->AlltowerModel->allDataUnitLevel23($month,$year,$tower);	
		$dataUnitlevel24 = $this->AlltowerModel->allDataUnitLevel24($month,$year,$tower);	
		$dataUnitlevel25 = $this->AlltowerModel->allDataUnitLevel25($month,$year,$tower);
		$dataUnitlevel26 = $this->AlltowerModel->allDataUnitLevel26($month,$year,$tower);	
		$dataUnitlevel27 = $this->AlltowerModel->allDataUnitLevel27($month,$year,$tower);	
		$dataUnitlevel28 = $this->AlltowerModel->allDataUnitLevel28($month,$year,$tower);	
		$dataUnitlevel29 = $this->AlltowerModel->allDataUnitLevel29($month,$year,$tower);	
		$dataUnitlevel30 = $this->AlltowerModel->allDataUnitLevel30($month,$year,$tower);	
		$dataUnitlevel31 = $this->AlltowerModel->allDataUnitLevel31($month,$year,$tower);	
		$dataUnitlevel32 = $this->AlltowerModel->allDataUnitLevel32($month,$year,$tower);	
		$dataUnitlevel33 = $this->AlltowerModel->allDataUnitLevel33($month,$year,$tower);	
		$dataUnitlevel34 = $this->AlltowerModel->allDataUnitLevel34($month,$year,$tower);	
		$dataUnitlevel35 = $this->AlltowerModel->allDataUnitLevel35($month,$year,$tower);	
		$dataUnitlevel36 = $this->AlltowerModel->allDataUnitLevel36($month,$year,$tower);	
		$dataUnitlevel37 = $this->AlltowerModel->allDataUnitLevel37($month,$year,$tower);
		$dataUnitlevel38 = $this->AlltowerModel->allDataUnitLevel38($month,$year,$tower);	
		$dataUnitlevel39 = $this->AlltowerModel->allDataUnitLevel39($month,$year,$tower);	

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Koko')
                 ->setLastModifiedBy('Koko')
                 ->setTitle("Data Serah Terima")
                 ->setSubject("Siswa")
                 ->setDescription("Tokyo")
                 ->setKeywords("Data Serah Terima");

    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA UNIT TOKYO"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Unit"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Jumlah"); // Set kolom B3 dengan tulisan "NIS"


    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
   
    


    $numrow = 5;
    
    foreach($dataUnitlevel5 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 6;
    foreach($dataUnitlevel6 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 7;
    foreach($dataUnitlevel7 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 8;
    foreach($dataUnitlevel8 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 9;
    foreach($dataUnitlevel9 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 10;
    foreach($dataUnitlevel10 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 11;
    foreach($dataUnitlevel11 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 12;
    foreach($dataUnitlevel12 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 15;
    foreach($dataUnitlevel15 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 16;
    foreach($dataUnitlevel16 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 17;
    foreach($dataUnitlevel17 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 18;
    foreach($dataUnitlevel18 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 19;
    foreach($dataUnitlevel19 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 20;
    foreach($dataUnitlevel20 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 21;
    foreach($dataUnitlevel21 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 22;
    foreach($dataUnitlevel22 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 23;
    foreach($dataUnitlevel23 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 24;
    foreach($dataUnitlevel24 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 25;
    foreach($dataUnitlevel25 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 26;
    foreach($dataUnitlevel26 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 27;
    foreach($dataUnitlevel27 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 28;
    foreach($dataUnitlevel28 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 29;
    foreach($dataUnitlevel29 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 30;
    foreach($dataUnitlevel30 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 31;
    foreach($dataUnitlevel31 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 32;
    foreach($dataUnitlevel32 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 33;
    foreach($dataUnitlevel33 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 34;
    foreach($dataUnitlevel34 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 35;
    foreach($dataUnitlevel35 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 36;
    foreach($dataUnitlevel36 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 37;
    foreach($dataUnitlevel37 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }


    $numrow = 38;
    foreach($dataUnitlevel38 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }

    $numrow = 39;
    foreach($dataUnitlevel39 as $data){ 
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['lantai']);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['sumData']);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    }



    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B

 
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Serah Terima");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    $filename = $tower.'_'.$month.'_'.$year.'.xlsx'; 
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=$filename"); 
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}