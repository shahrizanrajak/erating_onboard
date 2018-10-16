<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coordinator extends CI_Controller {

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

 		// if ($this->session->userdata('logged_user')) {
 		if (($this->session->userdata('logged_user')) && ($this->session->userdata('role') == 'Pentadbir')) {
 			$user_logged = $this->session->userdata('logged_user'); 			
 			$this->load->model('rate_model'); 			
 			$this->load->model('user_model'); 				
 			$this->load->model('ministry_model');
 			$this->load->model('section_model');
 			$this->load->model('config_model');
 			$this->load->model('smiley_model');
 			$this->load->model('question_model');
 			$this->load->model('photo_model');
 			//$this->load->view('admin/dashboard'); 
 		} else {
 			redirect('/login');
 		}

		//$this->load->model(array('CI_auth', 'CI_menu'));	
	} 

	public function index() {}

	public function dashboard()
	{ 		
		$data['stats_agency_active']  = $this->config_model->stats_agency_active();
		$data['stats_user_active']  = $this->user_model->stats_user_active();
		$data['stats_total_rating']  = $this->rate_model->stats_total_rating();
		$data['stats_total_comment']  = $this->rate_model->stats_total_comment();
		// get user photo	
		if ($avatar = $this->photo_model->get_photo($this->session->userdata('logged_ic'))) {
			$data['avatar'] = $avatar['photo'];
		} else {
			$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		}		

		$this->load->view('admin/header');
		$this->load->view('coordinator/dashboard', $data);
		$this->load->view('admin/footer');	
	}


	public function user_view() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();		

		// get user photo	
		if ($avatar = $this->photo_model->get_photo($this->session->userdata('logged_ic'))) {
			$data['avatar'] = $avatar['photo'];
		} else {
			$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		}

		// List User Roles
		$data['roles'] = $this->setRole();				

		// Define JSON API
		$data['status_type'] = 'Senarai Workspace eRating';				
		$data['json_data'] = 'api/erating-data/list';

		$this->load->view('admin/header');
		$this->load->view('coordinator/user', $data);		
		$this->load->view('admin/footer');
	}	

	public function setRole() {
		// List User Roles
		if ($this->session->userdata('role') == 'Pentadbir Utama') { 
			$roles =  array("Pentadbir Utama", 'Pentadbir', 'Pengguna', 'Kaunter');
		} else if ($this->session->userdata('role') == 'Pentadbir') {
			$roles =  array('Pentadbir'=>'Pentadbir',
								'Pengguna'=>'Pengguna',
								'Kaunter'=>'Kaunter');
		}
		return $roles;
	}	

	public function user_details($id = NULL) 
	{
		$user_data	= $this->user_model->find_user_with_photo($id);
		// $user_data	= $this->user_model->find_user($id);
		echo json_encode($user_data);
	}	

	public function erating_list() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();		
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();		

		// get user photo	
		$data['avatar'] = self::get_photo($this->session->userdata('logged_id'));
		// $data['json_data'] = 'asnaf-data-new';

		// Define JSON API
		$data['status_type'] = 'Senarai Workspace eRating';				
		$data['json_data'] = 'api/erating-data';

		$this->load->view('admin/header');
		$this->load->view('coordinator/erating1', $data);		
		$this->load->view('admin/footer');
	}			

	public function get_photo($id)
	{		
		if ($avatar = $this->photo_model->get_photo($id)) {
			$avatar = $avatar['photo'];
		} else {
			$avatar= base_url().'templates/adminlte/dist/img/avatar.png';
		}	

		return $avatar;	
	}

	public function configuration() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		// $data['smiley_data'] = $this->smiley_model->list_active();
		$data['question_data'] = $this->question_model->list_active();
		// $data['user_data'] = $this->user_model->list_all();	

		// get user photo	
		$data['avatar'] = self::get_image('photo', $this->session->userdata('logged_id'));			

		// Define JSON API
		$data['status_type'] = 'Data eRating Mengikut Agensi';
		// $data['json_data'] = 'api/report-data';

		$this->load->view('admin/header');
		$this->load->view('coordinator/config', $data);		
		$this->load->view('admin/footer');
	}	

	public function get_image($type, $id = NULL) 
	{
		if ($photo_data = $this->photo_model->get_photo($type, $id)) {
			$photo = $photo_data['photo'];
			// $photo = json_encode($photo_data);
		} else {
			$photo= base_url().'templates/adminlte/dist/img/avatar.png';
		}	

		return $photo;			
	}	

	public function api_get_image($type, $id = NULL) 
	{
		$photo_data = $this->photo_model->get_photo($type, $id);				
		
		echo json_encode($photo_data);		
	}				
}


/* End of file Coordinator.php */
/* Location: ./application/controllers/coordinator.php */