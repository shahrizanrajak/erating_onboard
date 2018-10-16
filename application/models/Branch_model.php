<?php
class Branch_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function list_all()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('cawangan');
		$query = $this->db->get();		

		return $query->result_array();
	}	

	public function list_by_department($id)
	{        
        $this->db->cache_off();
        $query = $this->db->query("SELECT Kod_Caw, cawangan FROM cawangan WHERE LEFT(Kod_Caw , 6) = '". $id ."'");        

        return $query->result_array();        
	}	
}

