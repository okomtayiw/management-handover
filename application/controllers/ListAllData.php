<?php 

class ListAllData extends CI_Controller {
	public function __construct(){
       parent:: __construct();
       
      $this->load->model('AlltowerModel');   
	  $this->load->helper('tgl_indo');
	
	}
	public function index(){
		$data['user'] = $this->db->get_where('tb_users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$month = $this->input->post('nameMonth');
		$year = $this->input->post('nameYear');
		// $level = $this->input->post('nameLevel');
		$tower = $this->input->post('nameTower');

		// $month = 10;
		// $year = 2021;
		// $tower = 1;
       
		
        if ($data['user'] != null){
        $data ['title'] = 'Data All Unit';
	    // $data['listDataUnitAllTower'] = $this->AlltowerModel->allDataTowerList($month,$year,$level,$tower);	
		$data['listDataUnitLevel5'] = $this->AlltowerModel->allDataUnitLevel5($month,$year,$tower);	
		$data['listDataUnitLevel6'] = $this->AlltowerModel->allDataUnitLevel6($month,$year,$tower);	
		$data['listDataUnitLevel7'] = $this->AlltowerModel->allDataUnitLevel7($month,$year,$tower);	
		$data['listDataUnitLevel8'] = $this->AlltowerModel->allDataUnitLevel8($month,$year,$tower);	
		$data['listDataUnitLevel9'] = $this->AlltowerModel->allDataUnitLevel9($month,$year,$tower);	
		$data['listDataUnitLevel10'] = $this->AlltowerModel->allDataUnitLevel10($month,$year,$tower);
		$data['listDataUnitLevel11'] = $this->AlltowerModel->allDataUnitLevel11($month,$year,$tower);	
		$data['listDataUnitLevel12'] = $this->AlltowerModel->allDataUnitLevel12($month,$year,$tower);	
		$data['listDataUnitLevel15'] = $this->AlltowerModel->allDataUnitLevel15($month,$year,$tower);
		$data['listDataUnitLevel16'] = $this->AlltowerModel->allDataUnitLevel16($month,$year,$tower);	
		$data['listDataUnitLevel17'] = $this->AlltowerModel->allDataUnitLevel17($month,$year,$tower);	
		$data['listDataUnitLevel18'] = $this->AlltowerModel->allDataUnitLevel18($month,$year,$tower);	
		$data['listDataUnitLevel19'] = $this->AlltowerModel->allDataUnitLevel19($month,$year,$tower);	
		$data['listDataUnitLevel20'] = $this->AlltowerModel->allDataUnitLevel20($month,$year,$tower);	
		$data['listDataUnitLevel21'] = $this->AlltowerModel->allDataUnitLevel21($month,$year,$tower);	
		$data['listDataUnitLevel22'] = $this->AlltowerModel->allDataUnitLevel22($month,$year,$tower);	
		$data['listDataUnitLevel23'] = $this->AlltowerModel->allDataUnitLevel23($month,$year,$tower);	
		$data['listDataUnitLevel24'] = $this->AlltowerModel->allDataUnitLevel24($month,$year,$tower);	
		$data['listDataUnitLevel25'] = $this->AlltowerModel->allDataUnitLevel25($month,$year,$tower);
		$data['listDataUnitLevel26'] = $this->AlltowerModel->allDataUnitLevel26($month,$year,$tower);	
		$data['listDataUnitLevel27'] = $this->AlltowerModel->allDataUnitLevel27($month,$year,$tower);	
		$data['listDataUnitLevel28'] = $this->AlltowerModel->allDataUnitLevel28($month,$year,$tower);	
		$data['listDataUnitLevel29'] = $this->AlltowerModel->allDataUnitLevel29($month,$year,$tower);	
		$data['listDataUnitLevel30'] = $this->AlltowerModel->allDataUnitLevel30($month,$year,$tower);	
		$data['listDataUnitLevel31'] = $this->AlltowerModel->allDataUnitLevel31($month,$year,$tower);	
		$data['listDataUnitLevel32'] = $this->AlltowerModel->allDataUnitLevel32($month,$year,$tower);	
		$data['listDataUnitLevel33'] = $this->AlltowerModel->allDataUnitLevel33($month,$year,$tower);	
		$data['listDataUnitLevel34'] = $this->AlltowerModel->allDataUnitLevel34($month,$year,$tower);	
		$data['listDataUnitLevel35'] = $this->AlltowerModel->allDataUnitLevel35($month,$year,$tower);	
		$data['listDataUnitLevel36'] = $this->AlltowerModel->allDataUnitLevel36($month,$year,$tower);	
		$data['listDataUnitLevel37'] = $this->AlltowerModel->allDataUnitLevel37($month,$year,$tower);
		$data['listDataUnitLevel38'] = $this->AlltowerModel->allDataUnitLevel38($month,$year,$tower);	
		$data['listDataUnitLevel39'] = $this->AlltowerModel->allDataUnitLevel39($month,$year,$tower);					
		$data['nMonth'] = $month;
		$data['nYear'] = $year;	
		$data['nTower'] = $tower;
	    $this->load->view('templates/header', $data);
		$this->load->view('alldata/index', $data);
		$this->load->view('templates/footer');
		} else {

		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
		Please register to login</div>');

		redirect('auth');
		}
	}


	public function getMonth($month){
		Switch ($month){
			case 1 : $month="Januari";
				Break;
			case 2 : $month="Februari";
				Break;
			case 3 : $month="Maret";
				Break;
			case 4 : $month="April";
				Break;
			case 5 : $month="Mei";
				Break;
			case 6 : $month="Juni";
				Break;
			case 7 : $month="Juli";
				Break;
			case 8 : $month="Agustus";
				Break;
			case 9 : $month="September";
				Break;
			case 10 : $month="Oktober";
				Break;
			case 11 : $month="November";
				Break;
			case 12 : $month="Desember";
				Break;
			}
		return $month;
	}


	 // Export data in CSV format 
	 public function exportCSV(){ 

		$month = $this->input->post('nmMonth');
		$year = $this->input->post('nmYear');
		// file name 
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		// get data 
		$dataAllUnit = $this->AlltowerModel->allDataTowerList($month,$year);	
	 
		// file creation 
		$file = fopen('php://output', 'w');
	  
		$header = array("Unit"); 
		fputcsv($file, $header);
		foreach ($dataAllUnit as $key=>$line){ 
		  fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	   }


	
	
}