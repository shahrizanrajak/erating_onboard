<?php
class Department_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function list_all()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('jabatan');
		$query = $this->db->get();		

		return $query->result_array();
	}	

	public function list_by_ministry($id)
	{        
        $this->db->cache_off();
        $query = $this->db->query("SELECT Kod_Jab, Jabatan FROM jabatan WHERE LEFT(Kod_Jab , 3) = '". $id ."'");        


        // $query = $this->db->query("SELECT Kod_Jab, Jabatan 
        // 	FROM jabatan 
        // 	WHERE LEFT(Kod_Jab , 3) LIKE '". $id ."%'");   
        
        return $query->result_array();        
	}	
}

