<?php
class Question_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();		
	}

	public function list_all()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('soalan');
		$query = $this->db->get();		

		return $query->result_array();
	}	

	public function list_active()
	{        
        $this->db->cache_off();
        $this->db->select('*');
        $this->db->from('soalan');             
        $this->db->where('Status', 'A');  
        $this->db->order_by('Turutan', 'ASC');  
        $query = $this->db->get();      

        return $query->result_array(); 
	}	
}

