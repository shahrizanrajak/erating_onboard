<?php
class Smiley_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();		
	}

	public function list_all()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('smiley');
		$query = $this->db->get();		

		return $query->result_array();
	}	

	public function list_active()
	{        		
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('smiley');
		$this->db->where('Status', 'A');  
		$this->db->order_by('Order', 'ASC'); 
		$query = $this->db->get();		

		return $query->result_array();            
	}	

	public function get_smiley($id)
	{        
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('smiley');
		$this->db->where('Id_Smiley', $id);
		$query = $this->db->get();		

		return $query->row_array();
	}	

    public function update_smiley($data)
    {        
        $this->db->set('Caption_Ms', $data['Caption_Ms']);
        $this->db->set('Caption_En', $data['Caption_En']);        
        $this->db->set('Order', $data['Order']);
        // $this->db->set('Order', date("Y-m-d H:i:s", time()));
        $this->db->set('Status', $data['Status']);   
        $this->db->where('Id_Smiley', $data['Id_Smiley']);
        $result = $this->db->update('smiley'); 

        // echo $this->db->last_query();        

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }	
}

