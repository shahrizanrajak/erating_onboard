<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->library(array('session'));	
		$this->load->helper('url');
	} 
	
	public function index() {}

	public function harian() {
		$data['status'] = 'Ini adalah testing';

		$this->load->view('statistik/header');
		$this->load->view('statistik/harian', $data);
		$this->load->view('statistik/footer');
	}

	public function bulanan() {
		$data['status'] = 'Ini adalah testing';

		$this->load->view('statistik/header');
		$this->load->view('statistik/bulanan', $data);
		$this->load->view('statistik/footer');
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */