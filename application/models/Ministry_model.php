<?php
class Ministry_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->table = 'kementerian';
        $this->role = $this->session->userdata('role');  
        $this->agency = substr($this->session->userdata('agency'), 0, 3);  // get main agency ID		
	}

	public function list_all()
	{		
        $stmt = "SELECT * FROM ". $this->table ."";

        if ($this->role == 'Pentadbir') {
            $stmt .= " WHERE Kod_Kem LIKE '". $this->agency ."%'";
        }

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->result_array();

		return $result;		
	}	

	public function list_user($id)
	{
        $this->db->cache_off();
        $this->db->select('id, fullname');
        $this->db->from('user');    
        $this->db->where('parliment', $id);   
        $this->db->where('role', 2);  	// 2 - Coordinator
        $this->db->where('status', 1);    
        $query = $this->db->get();
        // var_dump( $this->db );die();
        return $query->result_array(); 
	}	
}

