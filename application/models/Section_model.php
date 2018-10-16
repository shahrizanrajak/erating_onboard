<?php
class Section_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function list_all()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('bahagian');
		$query = $this->db->get();		

		return $query->result_array();
	}		

	public function list_by_department($id)
	{        
        $this->db->cache_off();
        $query = $this->db->query("SELECT Kod_Bah, bahagian FROM bahagian WHERE LEFT(Kod_Bah, 6) = '". $id ."'");        

        return $query->result_array();        
	}	
}

