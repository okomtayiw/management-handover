<?php 

class SitePlan extends CI_Controller {
	public function __construct(){
       parent:: __construct();
       
      $this->load->model('SitePlanModel');   
	 
	
	}
	public function index(){
		$data['user'] = $this->db->get_where('tb_users', ['email' =>
		$this->session->userdata('email')])->row_array();
        if ($data['user'] != null){
        $tower = $this->input->post('nameTower');
        if($tower == 1) {
            $tower = 'TRA';
        } else if($tower == 2){
            $tower = 'TRB';
        } else if($tower == 3){
            $tower = 'TRC';
        } else if($tower == 4){
            $tower = 'TRD';
        } else if($tower == 5){
            $tower = 'TRE';
        } else if($tower == 6){
            $tower = 'TRF';
        } 
        $data['siteplan5'] = $this->SitePlanModel->getUnitLevel5($tower);    
        $data['siteplan6'] = $this->SitePlanModel->getUnitLevel6($tower);  
        $data['siteplan7'] = $this->SitePlanModel->getUnitLevel7($tower);  
        $data['siteplan8'] = $this->SitePlanModel->getUnitLevel8($tower);    
        $data['siteplan9'] = $this->SitePlanModel->getUnitLevel9($tower);  
        $data['siteplan10'] = $this->SitePlanModel->getUnitLevel10($tower);  

        $data['siteplan11'] = $this->SitePlanModel->getUnitLevel11($tower);    
        $data['siteplan12'] = $this->SitePlanModel->getUnitLevel12($tower);  
        $data['siteplan15'] = $this->SitePlanModel->getUnitLevel15($tower);  
        $data['siteplan16'] = $this->SitePlanModel->getUnitLevel16($tower);    
        $data['siteplan17'] = $this->SitePlanModel->getUnitLevel17($tower);  
        $data['siteplan18'] = $this->SitePlanModel->getUnitLevel18($tower);  

        
        $data['siteplan19'] = $this->SitePlanModel->getUnitLevel19($tower);    
        $data['siteplan20'] = $this->SitePlanModel->getUnitLevel20($tower);  
        $data['siteplan21'] = $this->SitePlanModel->getUnitLevel21($tower);  
        $data['siteplan23'] = $this->SitePlanModel->getUnitLevel23($tower);    


        $data['siteplan25'] = $this->SitePlanModel->getUnitLevel25($tower);    
        $data['siteplan26'] = $this->SitePlanModel->getUnitLevel26($tower);  
        $data['siteplan27'] = $this->SitePlanModel->getUnitLevel27($tower);  
        $data['siteplan28'] = $this->SitePlanModel->getUnitLevel28($tower);    


        $data['siteplan29'] = $this->SitePlanModel->getUnitLevel29($tower);  
        $data['siteplan30'] = $this->SitePlanModel->getUnitLevel30($tower); 
        $data['siteplan31'] = $this->SitePlanModel->getUnitLevel31($tower);  
        $data['siteplan32'] = $this->SitePlanModel->getUnitLevel32($tower);  
        $data['siteplan33'] = $this->SitePlanModel->getUnitLevel33($tower);  
        
        $data['siteplan35'] = $this->SitePlanModel->getUnitLevel35($tower);  
        $data['siteplan36'] = $this->SitePlanModel->getUnitLevel36($tower);  
        $data['siteplan37'] = $this->SitePlanModel->getUnitLevel37($tower);  
        $data['siteplan38'] = $this->SitePlanModel->getUnitLevel38($tower);  
        $data['siteplan39'] = $this->SitePlanModel->getUnitLevel39($tower);  

        
      
      
		
	    $data ['title'] = 'Halaman Site Plan';
        $data ['tower'] = $this->input->post('nameTower');
	    $this->load->view('siteplan/header', $data);
		$this->load->view('siteplan/index', $data);
        $this->load->view('templates/footer', $data);

		} else {

		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
		Please register to login</div>');

		redirect('auth');
		}
	}

	
}