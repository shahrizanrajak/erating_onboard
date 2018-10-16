<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/REST_Controller.php';

class Api extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();		
		$this->load->model('user_model');		
		$this->load->model('department_model');
		$this->load->model('branch_model');
	} 

	public function index()
	{ 		

	}

	public function department_by_ministry($id = NULL)
	{           
		$dept_data = $this->department_model->list_by_ministry($id);		

	    header('Content-Type: application/json');
	    echo json_encode($dept_data);		    
	}	

	public function branch_by_department($id = NULL)
	{           
		$branch_data = $this->branch_model->list_by_department($id);		

	    header('Content-Type: application/json');
	    echo json_encode($branch_data);		    
	}

	public function petugas_by_selection($id = NULL)
	{           
		
		$user_data = $this->user_model->list_by_agency_sortname($id);		

	    header('Content-Type: application/json');
	    echo json_encode($user_data);		    
	}
	

	public function trans_message($status)
	{
		switch ($status) {
			// event number - success messages
			// odd number - error/unsuccess messages
			case '0':
				$result = '{"status":"'. $status .'", "message":"Data tidak berjaya disimpan."}';
				break;

			case '1':
				$result = '{"status":"'. $status .'", "message":"Data berjaya disimpan."}';
				break;		

			case '2':
				$result = '{"status":"'. $status .'", "message":"Missing values..."}';
				break;

			case '5':
				$result = '{"status":"'. $status .'", "message":"Akaun anda telah didaftarkan sebelum ini. Hubungi pentadbir untuk maklumat lanjut."}';
				break;

			case '7':
				$result = '{"status":"'. $status .'", "message":"Transaksi ditolak. Pastikan akaun anda telah didaftarkan."}';
				break;

			default:
				# code...
				break;
		}

		return $result;
	}	

	public function rest_call()
	{

	// $user = json_decode(
	//     file_get_contents('http://admin:moja2015@mojaapi.com/index.php/api/user/id/1/format/json')
	// );
	 
		$this->load->library('rest', array(
	        'server' => 'http://www.mojaapi.com/index.php/api/example/users/id/1',
	        'http_user' => 'admin',
	        'http_pass' => '1234',
	        'http_auth' => 'basic' // or 'digest'
	    ));
	     
	    $user = $this->rest->get('user', array('id' => $id), 'json');
	     
	    echo $user->name;
	}


}


/* End of file api.php */
/* Location: ./application/controllers/api.php */