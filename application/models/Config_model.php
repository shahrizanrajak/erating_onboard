<?php
class Config_model extends CI_Model {    

	public function __construct()
	{
		$this->load->database();   

        // Create caching for this query
        // Ref: https://codeigniter.com/userguide3/database/caching.html
        // Set cache On
        // $this->db->cache_on();

        // Set cache Off        
        // $this->db->cache_off();

        // Delete all Cache
        // $this->db->cache_delete_all();       
        $this->role = $this->session->userdata('role');  
        $this->agency = $this->session->userdata('agency');  // get main agency ID
        //echo $this->session->userdata('agency');
	}

// Copy dan paste sistem di Production 31-10-2017
	public function list_all()
    {        
        $stmt = "SELECT 
            Kod_Erating AS record_id, 
            Kod_Bah AS code_branch, 
            Bahagian AS section,
            konfigurasi.Status AS status,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch
            FROM konfigurasi 
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(Kod_Bah, 3)
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(Kod_Bah, 6)
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(Kod_Bah, 9)
            ";

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            if (strlen($this->agency) == 6)
                $stmt .= " WHERE Kod_Bah LIKE '". $this->agency ."%'";
            else
                $stmt .= " WHERE Kod_Bah LIKE '". $this->agency ."'";          
        }

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->result_array();

        return $result;
    }

    public function list_filter($id)
    {
        $this->db->cache_off();
        $stmt = "SELECT 
            Kod_Erating AS record_id, 
            Kod_Bah AS code_branch, 
            Bahagian AS section,
            konfigurasi.Status AS status,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch
            FROM konfigurasi 
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(Kod_Bah, 3)
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(Kod_Bah, 6)
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(Kod_Bah, 9)
            ";
            // * FROM rateit ";        

        // Filter by Current Year
        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            $stmt .= " ";
        } else {            
            // $stmt .= " WHERE Kod_Bah = $id "; 
            $stmt .= " WHERE Kod_Bah LIKE '". $id ."%'"; 
        }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            if (strlen($this->agency) == 6)
                $stmt .= " WHERE Kod_Bah LIKE '". $this->agency ."%'";
            else
                $stmt .= " WHERE Kod_Bah LIKE '". $this->agency ."'";          
        }

        $query = $this->db->query($stmt);        

        // echo $this->db->last_query();    //print last query
        return $query->result_array();
    }
// Copy dan paste sistem di Production 31-10-2017 end 
    
	public function view_header($id)
	{
        $this->db->cache_off();
        $query = $this->db->query("SELECT 
            Kod_Erating AS record_id, 
            Kod_Bah AS code_branch,         	
        	Bahagian AS section,
        	konfigurasi.Status AS status,
        	LEFT(Kod_Bah, 3) AS code_ministry,
        	LEFT(Kod_Bah, 6) AS code_department,
        	LEFT(Kod_Bah, 9) AS code_branch,
        	kementerian.kementerian AS ministry,
        	jabatan.jabatan AS department,
        	cawangan.cawangan AS branch
        	FROM konfigurasi 
        	LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(Kod_Bah, 3)
        	LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(Kod_Bah, 6)
        	LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(Kod_Bah, 9)
        	WHERE Kod_Bah = $id
        	");  	

		return $query->row_array();
	}	

    public function save_agency($data)
    {
        $items = null; $values = null;
        $getAgencyId = $data['Kod_Bah'];

        foreach($data as $key => $value) {
            $items  .= "". $key .",";
            $values .= "'". $value ."',";
        }               

        // Insert Date Updated
        $items .= "Kemaskini,";
        $values .= "'". date("Y-m-d H:i:s", time()) ."',";

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                

        if ($agency = self::find_agency($getAgencyId)) 
        {
            throw new Exception('error in query');
            return false;
        } 
        else 
        {
            $result = $this->db->query("INSERT INTO konfigurasi (".$qitems.") VALUES (".$qvalues.")");   

            // Reset db cache 
            $this->db->cache_delete('api', 'erating-data');

            return $result;
        }                   
    }      

    public function update_agency($data)
    {
        // Update Record
        $this->db->set('Status', $data['Status']);
        $this->db->set('Bahagian', $data['Bahagian']);        
        $this->db->set('Kemaskini', date("Y-m-d H:i:s", time()));
        $this->db->set('Tindakan', $data['Tindakan']);   
        $this->db->where('Kod_Bah', $data['Kod_Bah']);
        $result = $this->db->update('konfigurasi');        

        // Reset db cache 
        $this->db->cache_delete('api', 'erating-data');
        // $this->db->cache_delete_all();  

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }

    public function save_config($data)
    {
        // Update Record
        $this->db->set('Soalan_Ms', $data['Soalan_Ms']);
        $this->db->set('Soalan_En', $data['Soalan_En']);
        $this->db->set('Smiley', $data['Smiley']);
        $this->db->set('Kemaskini', date("Y-m-d H:i:s", time()));
        $this->db->where('Kod_Bah', $data['Kod_Bah']);
        $result = $this->db->update('konfigurasi');        

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }

    public function find_agency($id = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('Kod_Erating');
        $this->db->from('konfigurasi');   
        $this->db->where('Kod_Bah', $id);   
        $query = $this->db->get();
       
        return $query->row_array();     
    }    

    public function get_config($id = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('Soalan_Ms, Soalan_En, Smiley');
        $this->db->from('konfigurasi');   
        $this->db->where('Kod_Bah', $id);          
        $query = $this->db->get();
       
        return $query->row_array();     
    }  

    public function stats_agency_active()
    {        
        // $query = $this->db->query("SELECT * FROM konfigurasi WHERE Status='A'");        

        // return $query->num_rows();        
        $this->db->cache_off();
        $this->db->select('COUNT(Kod_Erating)');
        $this->db->from('konfigurasi');
        $this->db->where('Status', 'A');

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $this->db->like('Kod_Bah', $this->agency, 'after');            
        }

        $query = $this->db->get();
        $row = $this->db->last_query();
        $result = implode(" ",$query->row_array());

        return  $result;      
    }                  	
}

