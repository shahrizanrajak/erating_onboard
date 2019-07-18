<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/REST_Controller.php';

class Mobile extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->library(array('session'));	
		$this->load->helper('url');

		$this->load->model('user_model');		
		$this->load->model('department_model');		
		$this->load->model('branch_model');		
		$this->load->model('question_model');	

		// $this->load->model('rate_model'); 
		$this->load->model('photo_model');
		$this->load->model('smiley_model');
	} 

	public function index()
	{ 		
		// $this->load->view('admin/header');

		$this->load->view('mobile/qrprofile');
	}

	// public function mobile()
	// { 		
	// 	// $this->load->view('admin/header');
	// 	$this->load->view('mobile/index');
	// }

	public function mobile($id = NULL) {	
		$data['id']	= $id;
		$data['soalan'] = $this->question_model->list_active();
			
		//icon
		$data['smiley_data'] = $this->smiley_model->list_active();	
		$smiley_image = $this->photo_model->get_smiley();	
		foreach ($smiley_image as $key => $smiley) {
			$smileys[$smiley['parentid']] = $smiley['photo'];			
		}
		$data['smiley_image'] = $smileys;	

		$this->load->view('mobile/index', $data);
	}	

	public function mobilev2()
	{ 		
		// $this->load->view('admin/header');
		$this->load->view('mobilev2/index');
	}

	public function find_agency($id = NULL)
	{
		if ($result = $this->department_model->find_agency_by_id($id))
		{			
			// print_r($result);
			$status = array("response" => "Valid");
			$ministry = array("ministry" => $result['ministry']);
			$department = array("department" => $result['department']);
			$branch = array("branch" => $result['branch']);
			$logo = array("logo" => $result['logo']);

			$agency_data = array_merge($status, $ministry, $department, $branch, $logo);
		} else {
			$agency_data = array("response" => "Invalid");
		}

	    header('Content-Type: application/json');
	    echo json_encode($agency_data);			
	}

	public function list_counter($id = NULL)
	{
		if ($result = $this->user_model->list_by_agency_counter($id))
		{			
			// print_r($result);
			// $status = array("response" => "Valid");
			// $agency = array("name" => $result['nama']);
			// $agency_data = array_merge($status, $agency);			
		} else {
			$result = array("response" => "Invalid");
		}

	    header('Content-Type: application/json');
	    echo json_encode($result);			
	}

	public function rate($id = NULL)
	{
		if ($result = $this->user_model->list_by_agency_counter($id))
		{			
			// print_r($result);
			// $status = array("response" => "Valid");
			// $agency = array("name" => $result['nama']);
			// $agency_data = array_merge($status, $agency);
		} else {
			$result = array("response" => "Invalid");
		}

	    header('Content-Type: application/json');
	    echo json_encode($result);			
	}	

	public function get_rating($id = NULL)
	{
		$result = $this->user_model->find_user_with_photo($id);	
		

		$agencyid = array("agencyid" => $result['agensi_id']);
		$counterid = array("counterid" => $id);
		$countername = array("countername" => $result['nama']);		
		$counterphoto = array("photo" => $result['photo']);					
		$result = array_merge($agencyid, $counterid, $countername, $counterphoto);

	    header('Content-Type: application/json');
	    echo json_encode($result);			
	}

	public function rate_it_mobile($agency, $user, $picked, $soalan)
	{
        // $dataObject = $_POST['data'];               
		if($picked >= 3) $soalan = '0';

        if ($agency) {        	
        	$rate_data = $this->user_model->save_rate_mobile($agency, $user, $picked, 'qr', $soalan);             	
        } else {        	
        	log_message('error', 'Unable save Selection');
        }		
	}						
}


/* End of file mobile.php */
/* Location: ./application/controllers/mobile.php */