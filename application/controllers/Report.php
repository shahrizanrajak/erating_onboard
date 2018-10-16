<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
	{
		parent::__construct();
		$this->load->library(array('session'));	
		$this->load->helper('url');

 		// if (($this->session->userdata('logged_user')) && ($this->session->userdata('role') == 'Pentadbir Utama')) {
 		if ($this->session->userdata('logged_user')) {
 			$user_logged = $this->session->userdata('logged_user');
 			$this->load->model('rate_model');
 			$this->load->model('user_model'); 			 			
 			$this->load->model('ministry_model');
 			$this->load->model('section_model');
 			$this->load->model('config_model');
 			$this->load->model('question_model'); 		
 			$this->load->model('photo_model');	
 			//$this->load->view('admin/dashboard'); 
 		} else {
 			redirect('/login');
 		}
		//$this->load->model(array('CI_auth', 'CI_menu'));	
	} 

	public function index() {}

	public function report() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();
		// $data['report_type'] = 'administrator';

		// get user photo	
		if ($avatar = $this->photo_model->get_photo('photo', $this->session->userdata('logged_id'))) {
			$data['avatar'] = $avatar['photo'];
		} else {
			$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		}				

		// Define JSON API
		$data['status_type'] = 'Data eRating Mengikut Agensi';
		// $data['json_data'] = 'api/report-data';		

		$this->load->view('admin/header');
		$this->load->view('report/report', $data);		
		$this->load->view('admin/footer');
	}		

	public function user_report() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();	
		$data['report_type'] = 'coordinator';

		// get user photo	
		if ($avatar = $this->photo_model->get_photo('photo', $this->session->userdata('logged_ic'))) {
			$data['avatar'] = $avatar['photo'];
		} else {
			$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		}				

		// Define JSON API
		$data['status_type'] = 'Data eRating Mengikut Agensi';
		$data['json_data'] = 'api/report-data';

		$this->load->view('admin/header');
		$this->load->view('report/report', $data);		
		$this->load->view('admin/footer');
	}		

	// public function report_data() 
	// {
	// 	$report_data = $this->rate_model->list_all();				
		
	// 	echo json_encode($report_data);
	// }

	public function report_all($id = NULL) 
	{
		// Extract to get Id, Start Date & End Date	
		$data = explode('_', $id);	
		
		$id = $data[0];

		if (empty($data[1]) && empty($data[2])) { $start = 'null'; $end = 'null'; } else { $start = $data[1]; $end = $data[2]; }	
				
		$report_data = $this->rate_model->list_filter($id, $start, $end);							

		echo json_encode($report_data);
	}

	public function report_rated($id = NULL) 
	{				
		// Extract to get Id, Start Date & End Date	
		$data = explode('_', $id);	
		
		$id = $data[0];

		if (empty($data[1]) && empty($data[2])) { $start = 'null'; $end = 'null'; } else { $start = $data[1]; $end = $data[2]; }	

		$report_data = $this->rate_model->list_filter_by_agency_with_agency_name($id, $start, $end);				
		
		echo json_encode($report_data);
	}	

	public function report_feedback($id = NULL) 
	{				
		// Extract to get Id, Start Date & End Date	
		$data = explode('_', $id);	
		
		$id = $data[0];

		if (empty($data[1]) && empty($data[2])) { $start = 'null'; $end = 'null'; } else { $start = $data[1]; $end = $data[2]; }	

		$report_data = $this->rate_model->list_filter_feedback($id, $start, $end);				
		
		echo json_encode($report_data);
	}		

	public function report_rated_category()
	{
		$report_data = $this->rate_model->list_today_by_rated_category();					 
		
		echo json_encode($report_data);		
	}

	public function report_rated_monthly()
	{
		$report_data = $this->rate_model->list_total_rating_monthly();				
		
		echo json_encode($report_data);		
	}

	public function report_rated_monthly_agency()
	{
		$report_data = $this->rate_model->list_total_rating_monthly_and_agency();				
		
		echo json_encode($report_data);		
	}	

	public function report_rated_monthly_agency_pivot($id = NULL) 
	{				
		// Extract to get Id, Start Date & End Date	
		$data = explode('_', $id);	
		
		$id = $data[0];	

		$report_data = $this->rate_model->list_total_rating_monthly_and_agency_pivot($id);				
		
		echo json_encode($report_data);
	}

	public function report_user_log($id = NULL)
	{
		$data = explode('_', $id);	
		
		$id = $data[0];	
		if (empty($data[1]) && empty($data[2])) { $start = 'null'; $end = 'null'; } else { $start = $data[1]; $end = $data[2]; }

		$report_data = $this->user_model->user_log_details_by_agency($id, $start, $end);				
		
		echo json_encode($report_data);
	}	


	public function dashboard_get_total_active() 
	{
		$total_active = $this->user_model->stats_user_active();

		echo $total_active;
		// echo json_encode($total_rating);		
	}



	public function dashboard_get_total_rating() 
	{
		$total_rating = $this->rate_model->stats_total_rating();

		echo $total_rating;
		// echo json_encode($total_rating);		
	}	

	public function dashboard_get_total_comment() 
	{
		$total_rating = $this->rate_model->stats_total_comment();				

		echo $total_rating;		
		// echo json_encode($total_rating);		
	}		

	// // cemerlang -table
	// public function dashboard_get_total_cemerlang() 
	// {
	// 	$total_rating = $this->rate_model->stats_total_cemerlang();				

	// 	echo $total_rating;		
	// 	// echo json_encode($total_rating);		
	// }



}

/* End of file report.php */
/* Location: ./application/controllers/report.php */