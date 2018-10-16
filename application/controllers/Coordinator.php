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
 			$this->load->model('user_model');
 			$this->load->model('ministry_model');
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

		// Define JSON API
		$data['status_type'] = 'Senarai Workspace eRating';				
		$data['json_data'] = 'api/erating-data/list';

		$this->load->view('admin/header');
		$this->load->view('coordinator/user', $data);		
		$this->load->view('admin/footer');
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
		//$data['json_data'] = 'api/erating-data';

		$this->load->view('admin/header');
		$this->load->view('coordinator/erating', $data);		
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
}


/* End of file Coordinator.php */
/* Location: ./application/controllers/coordinator.php */