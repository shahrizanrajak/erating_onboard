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
	public function get_question($id)
	{        
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('soalan');
		$this->db->where('Id_Soalan', $id);
		$query = $this->db->get();		
		// echo 'xxxxxxxxxxxxxxxxxxxxxxxxx';
		
		return $query->row_array();

	}

	public function update_question($data)
    {        
        $this->db->set('Soalan_Ms', $data['Soalan_Ms']);
        $this->db->set('Soalan_En', $data['Soalan_En']);        
        $this->db->set('Turutan', $data['Turutan']);
        // $this->db->set('Order', date("Y-m-d H:i:s", time()));
        $this->db->set('Status', $data['Status']);   
        $this->db->where('Id_Soalan', $data['Id_Soalan']);
        $result = $this->db->update('soalan'); 

          // echo $this->db->last_query();        

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }	


}

