<?php
class Facility_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function facility_list()
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('facility');
		$query = $this->db->get();		

		return $query->result_array();
	}		

	public function facility_list_likes()
	{
		$this->db->cache_off();
	
        $stmt = "SELECT facility.sport_id AS sport_id, facility.id AS facility_id, facility.name AS facility_name,
        facility.district_id AS facility_district, facility.lat AS facility_lat, facility.lon AS facility_long,
        vjomfit_likes_facility.likes AS facility_likes
        FROM facility 
        INNER JOIN vjomfit_likes_facility
        ON facility.id = vjomfit_likes_facility.facility_id
        ";

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->result_array();

		return $result;		
	}	

	public function facility_list_by_sport($id)
	{
		$this->db->cache_off();
	
        $stmt = "SELECT facility.sport_id AS sport_id, facility.id AS facility_id, facility.name AS facility_name,
        facility.district_id AS facility_district, facility.location AS facility_location, facility.lat AS facility_lat, facility.lon AS facility_long,
        vjomfit_likes_facility.likes AS facility_likes
        FROM facility 
        INNER JOIN vjomfit_likes_facility
        ON facility.id = vjomfit_likes_facility.facility_id
        WHERE facility.sport_id = '". $id."'
        ";

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->result_array();

		return $result;		
	}	

	public function facility_list_by_id($id)
	{
		$this->db->cache_off();
	
        $stmt = "SELECT facility.sport_id AS sport_id, sport.name AS sport_name, facility.id AS facility_id, facility.name AS facility_name,
        facility.district_id AS facility_district, facility.lat AS facility_lat, facility.lon AS facility_long,
        facility.phone AS facility_phone, facility.desc AS facility_desc, facility.rate AS facility_rate, facility.schedule AS facility_schedule,
        vjomfit_likes_facility.likes AS facility_likes
        FROM facility 
        INNER JOIN vjomfit_likes_facility ON facility.id = vjomfit_likes_facility.facility_id
        INNER JOIN sport ON sport.id = facility.sport_id        
        WHERE facility.id = '". $id."'
        ";

        // Db cache
        $this->db->cache_off();

        $query = $this->db->query($stmt);   
        $result = $query->row_array();

		return $result;		
	}		

	public function facility_find($id)
	{
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('facility');
		$this->db->where('id', $id);
		$query = $this->db->get();		

		return $query->row_array();
	}	
}

