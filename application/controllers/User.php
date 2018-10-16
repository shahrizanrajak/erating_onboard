<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
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

		//$this->load->library('session');		
		$this->load->model('user_model');		
		$this->load->model('photo_model');
		$this->load->model('config_model');
		$this->load->model('rate_model');
		$this->load->model('Department_model');
		// $this->load->helper('form');  enable to use CSFR token
	} 

	public function index()
	{ 		
		// kalau data betul akan pergi ke dashboard
 		if ($this->session->userdata('logged_user')) {		
 			$user_logged = $this->session->userdata('logged_user');

 			
 			redirect('dashboard'); 			
 		} else {
 			redirect('user/login');
 			//$this->load->view('user/register'); 
 		}
		//$this->load->model(array('CI_auth', 'CI_menu'));			
	}

	public function register()
	{
		$this->load->view('user/register'); 
	}

	public function login()
	{
		$this->load->view('user/login'); 
	}

	public function validate()
	{		
		$data = $this->input->post();
 		
		$qresult = $this->user_model->validate($data);
		
		if ($qresult) {
			

			$this->session->set_userdata('login_key', $data['login-key']);
			$this->session->set_userdata('logged_id', $qresult['id_pengguna']);
			$this->session->set_userdata('logged_ic', $qresult['kad_pengenalan']);
			$this->session->set_userdata('logged_user', $qresult['nama']);
			$this->session->set_userdata('role', $qresult['tahap']);
			$this->session->set_userdata('email', $qresult['emel']);
			$this->session->set_userdata('agency', $qresult['agensi_id']);
			// $this->session->set_userdata('agencyname', $this->Department_model->find_agency_by_id($qresult['agensi_id']));
			$this->session->set_userdata('1', $qresult['jawatan']);
			// $this->session->set_userdata('2', $qresult['Cawangan']);


			//letak nama agensi
			$this->session->set_userdata('agency', $qresult['agensi_id']);

			// get user photo	
			if ($avatar = $this->photo_model->get_photo($qresult['id_pengguna'])) {
				$data['avatar'] = $avatar['photo'];
			} else {
				$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
			}

			// Get Dashboard data
			$data['stats_agency_active']  = $this->config_model->stats_agency_active();
			$data['stats_user_active']  = $this->user_model->stats_user_active();
			$data['stats_total_rating']  = $this->rate_model->stats_total_rating();
			$data['stats_total_comment']  = $this->rate_model->stats_total_comment();
			
			// $data['stats_agency_top_three']  = $this->rate_model->list_by_agency_with_agency_name_top_three();			

			// role = 1 is an administrator
			// role = 2 is a coordinator


		// EDITED 20-11-2017
		if ($qresult['tahap'] == 'Pentadbir Utama') { 				
				$this->load->view('admin/header');
				$this->load->view('admin/dashboard', $data); 
				$this->load->view('admin/footer');	

			// } else if($qresult['uaccess'] == 'Pentadbir') {
			} else if ($qresult['tahap'] == 'Pentadbir'){
				//echo "ini adalah pentadbir";
				$this->load->view('admin/header');				
				$this->load->view('coordinator/dashboard', $data); //case_new
				$this->load->view('admin/footer');	

			} else if ($qresult['tahap'] == 'Pengguna'){
				// echo "ini adalah pengguna";
				$this->load->view('admin/header');				
				$this->load->view('pengguna/dashboard', $data); //case_new
				$this->load->view('admin/footer');

			} else {
				redirect('/display/'.$qresult['agensi_id'].'');
			}
		} else {
			$data['reason'] = 'Login atau Katalaluan Tidak Wujud ';
			$data['details'] = 'Hubungi pentadbir sistem untuk maklumat lanjut.';
			$this->load->view('user/login', $data); 	
		}	
		
	
	}

	public function check_logged()
	{
		return ($this->session->userdata('logged_user'))?TRUE:FALSE;
	}
 
	public function logged_id()
	{
		return ($this->check_logged())?$this->session->userdata('logged_user'):'';
	}

	public function logout()
	{
		$this->session->sess_destroy();	
		$this->user_model->logout();
		$this->load->view('user/login'); 	
	}

	// public function logout()
	// {

	// }
}

/* End of file user.php */