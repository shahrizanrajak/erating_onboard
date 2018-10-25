<?php
class Photo_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();                
	}

    public function save_photo($data)
    {
        $items = null; $values = null;

        foreach($data as $key => $value) {
            $items  .= "". $key .",";
            $values .= "'". $value ."',";
        }               

        // Insert Date Updated
        $items .= "date_updated,";
        $values .= "'". date("Y-m-d H:i:s", time()) ."',";        

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                

        $result = $this->db->query("INSERT INTO photo (".$qitems.") VALUES (".$qvalues.")");          

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }                  
    }      

    public function get_photo($type, $id = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('photo');
        $this->db->from('photo');   
        $this->db->where('type', $type); 
        $this->db->where('parentid', $id);  
        $this->db->order_by('id', 'DESC'); 
        $query = $this->db->get();
       
           // echo $this->db->last_query(); 
        return $query->row_array();     
    }                  	

    public function get_smiley()
    {
        $this->db->cache_off();
        // $this->db->select('id, parentid, photo, MAX(date_updated)');
        // $this->db->from('photo');
        // $this->db->where('type', 'smiley');  
        // $this->db->group_by('parentid'); 

        $this->db->select('id, parentid, photo, date_updated');
        $this->db->from('photo');
        $this->db->where('type', 'smiley');  
        $this->db->where('id IN (SELECT MAX(id) FROM photo GROUP BY parentid)');
        // $this->db->group_by('parentid');         
        $query = $this->db->get();      

        // echo $this->db->last_query(); 
        return $query->result_array();      
    }
    // public function get_photo_smiley($id = NULL)
    // {           
    //     $this->db->cache_off();
    //     $this->db->select('photo');
    //     $this->db->from('photo');   
    //     $this->db->where('type', 'smiley'); 
    //     $this->db->where('parentid', $id);  
    //     $this->db->order_by('id', 'DESC'); 
    //     $query = $this->db->get();
       
    //     return $query->row_array();     
    // }     
}

