<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter extends CI_Controller {

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

 		if ($this->session->userdata('logged_user')) {
 			$user_logged = $this->session->userdata('logged_user'); 			
 			$this->load->model('user_model');
 			$this->load->model('config_model'); 			
 			$this->load->model('photo_model'); 			
 			$this->load->model('rate_model'); 			
 			$this->load->model('question_model'); 			
 			$this->load->model('smiley_model'); 			
 		} else {
 			redirect('/login');
 		}	
	} 

	public function index() {}

	public function display($agency_id = NULL)
	{ 		
		$data['agency_data'] = $this->config_model->view_header($agency_id);	
		$data['config_data'] = $this->config_model->get_config($agency_id);	
		//$data['user_data'] = $this->user_model->find_user($this->session->userdata('logged_user'));		
		$data['photo_data'] = $this->photo_model->get_photo('logo', $agency_id);	
		$data['question_data'] = $this->question_model->list_active();	
		$data['smiley_data'] = $this->smiley_model->list_active();	
			
		$smiley_image = $this->photo_model->get_smiley();	
	
		foreach ($smiley_image as $key => $smiley) {
			$smileys[$smiley['parentid']] = $smiley['photo'];			
		}

		$data['smiley_image'] = $smileys;		

		// get user photo	
		if ($avatar = $this->photo_model->get_photo('photo', $this->session->userdata('logged_ic'))) {
			$data['avatar'] = $avatar['photo'];
		} else {
			$data['avatar'] = base_url().'templates/adminlte/dist/img/avatar.png';
		}			
		
		// $this->load->view('admin/header');
		// $this->load->view('user/display', $data);
		$this->load->view('coordinator/displayv1', $data);
	}

	// public function smiley_active()
	// {
 //        $data['smileys'] = $this->smiley_model->list_all();	
	// }	

	public function rate_it()
	{
        $dataObject = $_POST['data'];               
		
        if ($dataObject) {
        	$json = json_decode($dataObject,true);
        	$rate_data = $this->rate_model->save_rate($json);             	
        } else {        	
        	log_message('error', 'Unable save Selection');
        }		
	}				
}



/* End of file counter.php */
/* Location: ./application/controllers/counter.php */