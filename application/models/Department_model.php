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
        
        return $query->result_array();        
	}	

	// For Mobile App purpose
	// Check Agency based on Key
    public function find_agency_by_key($key)
    {        
        $this->db->cache_off();
        $this->db->select('*');
        $this->db->from('konfigurasi');   
        $this->db->where('Kod_Bah', $key);   
        $query = $this->db->get();
       
        return $query->row_array();         
    }   	

	public function find_agency_by_id($id)
	{        
        $stmt = "SELECT 
            Kod_Erating AS record_id, 
            Kod_Bah AS code_branch, 
            Bahagian AS section,
            konfigurasi.Status AS status,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            photo.photo AS logo
            FROM konfigurasi 
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(Kod_Bah, 3)
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(Kod_Bah, 6)
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(Kod_Bah, 9)
            LEFT JOIN photo ON Kod_Bah = photo.parentid
            WHERE photo.type = 'logo'
            AND Kod_Bah = '". $id ."'
            ";

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->row_array();

		return $result;
	}    
}

