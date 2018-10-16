<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
		// $this->load->helper('form');   enable to use CSFR token

 		if (($this->session->userdata('logged_user')) 
 			&& (($this->session->userdata('role') == 'Pentadbir Utama') 
 			|| ($this->session->userdata('role') == 'Pentadbir'))) {
 		// if ($this->session->userdata('logged_user')) {
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
 			redirect('user/login');
 		}

		//$this->load->model(array('CI_auth', 'CI_menu'));	
	} 

	public function index() {}

	public function dashboard()
	{ 		
		// Get summary data
		$data['stats_agency_active']  = $this->config_model->stats_agency_active();
		$data['stats_user_active']  = $this->user_model->stats_user_active();
		$data['stats_total_rating']  = $this->rate_model->stats_total_rating();
		$data['stats_total_comment']  = $this->rate_model->stats_total_comment();
		// $data['stats_agency_top_three']  = $this->rate_model->list_by_agency_with_agency_name_top_three();

		// $stats_agency = ($data['stats_agency_active'])?'valid':'invalid';
		// print("data: ". $stats_agency); die();


		// get user photo	
		$data['avatar'] = self::get_image('photo', $this->session->userdata('logged_id'));					  	    

		$this->load->view('admin/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');	
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
		$this->load->view('admin/config', $data);		
		$this->load->view('admin/footer');
	}		

	public function erating_list() 
	{								
		
		$data['ministry_data']	=  $this->ministry_model->list_all();		
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();		

		// get user photo	
		$data['avatar'] = self::get_image('photo', $this->session->userdata('logged_id'));
		// $data['json_data'] = 'asnaf-data-new';

		// Define JSON API
		$data['status_type'] = 'Senarai Workspace eRating';				
		$data['json_data'] = 'api/erating-data';

		// List User Roles
		if ($this->session->userdata('role') == 'Pentadbir Utama') {
			$data['roles'] =  array('Pentadbir Utama'=>'Pentadbir Utama',
								'Pentadbir'=>'Pentadbir',
								'Pengguna'=>'Pengguna',
								'Kaunter'=>'Kaunter');
		} else if ($this->session->userdata('role') == 'Pentadbir') {
			$data['roles'] =  array(
								'Pentadbir'=>'Pentadbir',
								'Pengguna'=>'Pengguna',
								'Kaunter'=>'Kaunter');
		}



		$this->load->view('admin/header');
		$this->load->view('admin/erating2', $data);		
		$this->load->view('admin/footer');
	}	

	// kemaskini serupa report

	// public function erating_list2() 
	// {								
		
	// 	$data['ministry_data']	=  $this->ministry_model->list_all();		
	// 	$data['question_data'] = $this->question_model->list_active();
	// 	$data['user_data'] = $this->user_model->list_all();		

	// 	// get user photo	
	// 	$data['avatar'] = self::get_image('photo', $this->session->userdata('logged_id'));
	// 	// $data['json_data'] = 'asnaf-data-new';

	// 	// Define JSON API
	// 	$data['status_type'] = 'Senarai Workspace eRating';				
	// 	$data['json_data'] = 'api/erating-data';

	// 	// List User Roles
	// 	$data['roles'] = $this->setRole();

	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/erating2', $data);		
	// 	$this->load->view('admin/footer');
	// }	




	public function report() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();		

		// Define JSON API
		$data['status_type'] = 'Data eRating Mengikut Agensi';
		$data['json_data'] = 'api/report-data';

		$this->load->view('admin/header');
		$this->load->view('admin/report', $data);		
		$this->load->view('admin/footer');
	}	

	public function user_view() 
	{								
		$data['ministry_data']	=  $this->ministry_model->list_all();
		$data['question_data'] = $this->question_model->list_active();
		$data['user_data'] = $this->user_model->list_all();		

		// get user photo	
		$data['avatar'] = self::get_image('photo', $this->session->userdata('logged_id'));
		// if ($avatar = $this->photo_model->get_photo($this->session->userdata('logged_id'))) {
		// 	$data['avatar'] = $avatar['photo'];
		// } else {
		// 	$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		// }				

		// List User Roles
		$data['roles'] = $this->setRole();

		// Define JSON API
		$data['status_type'] = 'Senarai Workspace eRating';				
		$data['json_data'] = 'api/erating-data/list';

		$this->load->view('admin/header');
		$this->load->view('admin/user', $data);		
		$this->load->view('admin/footer');
	}	

	// public function get_photo($type, $id)
	// {		
	// 	if ($avatar = $this->photo_model->get_photo($type, $id)) {
	// 		$avatar = $avatar['photo'];
	// 	} else {
	// 		$avatar= base_url().'templates/adminlte/dist/img/avatar.png';
	// 	}	

	// 	return $avatar;	
	// }

	// public function get_photo_smiley($id)
	// {		
	// 	if ($avatar = $this->photo_model->get_photo_smiley($id)) {
	// 		$smiley_photo = $smiley_photo['photo'];
	// 	} else {
	// 		$avatar= base_url().'templates/adminlte/dist/img/avatar.png';
	// 	}	

	// 	return $avatar;	
	// }	

	public function list_smiley() 
	{
		$smiley_data = $this->smiley_model->list_all();				
		
		echo json_encode($smiley_data);
	}

	public function get_smiley($id = NULL) 
	{
		$smiley_data = $this->smiley_model->get_smiley($id);
		//$smiley_photo = array('photo' => self::get_photo_smiley($id));		

		//$smiley_data = array_push($smiley_data, $smiley_photo);

		echo json_encode($smiley_data);
	}	

	public function get_question($id = NULL) 
	{
		$question_data = $this->question_model->get_question($id);
		//$smiley_photo = array('photo' => self::get_photo_smiley($id));		

		//$smiley_data = array_push($smiley_data, $smiley_photo);

		echo json_encode($question_data);
	}	

	public function list_question() 
	{
		$question_data = $this->question_model->list_all();				
		
		echo json_encode($question_data);
	}

	public function erating_data() 
	{
		$erating_data = $this->config_model->list_all();				
		
		echo json_encode($erating_data);
	}	

	public function erating_details($id = NULL) 
	{
		$erating_data = $this->config_model->view_header($id);	

		echo json_encode($erating_data);
	}	

	public function erating_save_agency()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->config_model->save_agency($json);             	
        } else {
        	//show_error('message' [, int $status_code= 500 ] );
        	log_message('error', 'Unable save Erating Agency');
        }		
	}

	public function erating_update_agency()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->config_model->update_agency($json);             	
        } else {
        	//show_error('message' [, int $status_code= 500 ] );
        	log_message('error', 'Unable update Erating Agency');
        }		
	}

	public function erating_save_config()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->config_model->save_config($json);             	
        } else {        	
        	log_message('error', 'Unable save Erating Config');
        }		
	}	

	public function erating_update_smiley()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_smiley_data = $this->smiley_model->update_smiley($json);             	
        } else {
        	//show_error('message' [, int $status_code= 500 ] );
        	log_message('error', 'Unable update Smiley');
        }		
	}

	public function erating_update_question()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_question_data = $this->question_model->update_question($json);             	
        } else {
        	//show_error('message' [, int $status_code= 500 ] );
        	log_message('error', 'Unable update Soalan');
        }		
	}

	public function erating_get_config($id = NULL) 
	{
		$config_data = $this->config_model->get_config($id);				
		
		echo json_encode($config_data);
	}		

	public function save_image()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->photo_model->save_photo($json);             	
        } else {        	
        	log_message('error', 'Unable save Photo');
        }		
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

	public function report_data($status = NULL) 
	{
		$report_data = $this->report_model->list_by_agency();				
		
		echo json_encode($report_data);
	}	

	public function user_list_all() 
	{				
		$data['status_type'] = 'Senarai Pengguna';
		//$data['json_data']	=  $this->user_model->view();				
		$data['json_data'] = 'api/user-data';

		$this->load->view('admin/header');
		$this->load->view('admin/view_user', $data);		
		$this->load->view('admin/footer');
	}	

	public function user_list($id = NULL) 
	{
		$user_data = $this->user_model->list_all();				
		
		echo json_encode($user_data);
	}

	public function user_list_by_agency($id = NULL) 
	{
		$user_data = $this->user_model->list_by_agency($id);				

		echo json_encode($user_data);
	}	

	public function user_register() 
	{				
		$data['status_type'] = 'Daftar Pengguna';					

		$this->load->view('admin/header');
		$this->load->view('admin/register_user', $data);		
		$this->load->view('admin/footer');
	}	

	public function user_details($id = NULL) 
	{
		$user_data	= $this->user_model->find_user_with_photo($id);
		// $user_data	= $this->user_model->find_user($id);		
		echo json_encode($user_data);
	}				

	public function user_save()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->user_model->save($json);             	
        } else {
        	//show_error('message' [, int $status_code= 500 ] );
        	log_message('error', 'Unable save User information');        	
        }		
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

	public function user_update()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->user_model->update($json);             	
        } else {        	
        	log_message('error', 'Unable update User information');
        }		
	}	

	public function user_remove()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$erating_agency_data = $this->user_model->remove($json);             	
        } else {        	
        	log_message('error', 'Unable remove User information');
        }		
	}	
}

/* End of file adnimistrator.php */
/* Location: ./application/controllers/administrator.php */
