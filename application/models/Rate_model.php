<?php
class Rate_model extends CI_Model {

    // transform table row to column:
    // http://stackoverflow.com/questions/1241178/mysql-rows-to-columns
    // http://stackoverflow.com/questions/14834290/mysql-query-to-dynamically-convert-rows-to-columns
    // http://sqlfiddle.com/#!2/70129/13

    public function __construct()
    {
        // date_default_timezone_set("Asia/Kuala_Lumpur");
        // echo date_default_timezone_get();
        // ini_set("date.timezone", "Asia/Kuala_Lumpur");
        
        $this->load->database();  
        $this->role = $this->session->userdata('role');  
        $this->agency = substr($this->session->userdata('agency'), 0, 6);  // get main agency ID
        
        
        $this->today = date("Y-m-d");
        $this->year = "2019";
      //  $this->year = date("Y");       
        
        // echo $this->today;            
    }

    public function list_filter($id, $start, $end, $petugas)
    {
        $this->db->cache_off();
        $stmt = "SELECT rateit.*,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            konfigurasi.Bahagian AS section,
            pengguna.nama AS name
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(rateit.agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(rateit.agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(rateit.agency_id, 9)
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = rateit.agency_id 
            LEFT JOIN pengguna ON pengguna.id_pengguna = rateit.user_id
            ";
            // * FROM rateit ";        

        // Filter by Current Year
        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            $stmt .= " WHERE Year(date_update) = '". $this->year ."'";
        } else {
            // $stmt .= " WHERE LEFT(agency_id, 9) = $id AND Year(date_update) = YEAR(CURDATE())"; 
            $stmt .= " WHERE agency_id = $id AND Year(date_update) = '". $this->year ."'"; 
        }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }

         // Filter by pengguna]
        if ($petugas == 'all') $stmt .= " AND agency_id = '$id'";
        else  $stmt .= " AND pengguna.id_pengguna = '$petugas'";

        // Filter by Date Range
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_update) BETWEEN date('$start') AND date('$end')";
        } else {
            $stmt .= " LIMIT 1000";
        }

        $query = $this->db->query($stmt);        

        return $query->result_array();
    }

    public function list_by_rated_group_by_agency()
    {
        $this->db->cache_off();
        $query = $this->db->query("SELECT agency_id,
            SUM(picked = 1) as '1',
            SUM(picked = 2) as '2',
            SUM(picked = 3) as '3',
            SUM(picked = 4) as '4',
            SUM(picked = 5) as '5',
            COUNT(picked) as 'total'
            FROM rateit 
            WHERE Year(date_update) = '". $this->year ."'
            Group By agency_id
            ");     

        return $query->result_array();
    }

    // SUM(picked = 1) as 'Cemerlang',
    // SUM(picked = 2) as 'Memuaskan',
    // SUM(picked = 3) as 'Sederhana Memuaskan',
    // SUM(picked = 4) as 'Kurang Memuaskan',
    // SUM(picked = 5) as 'Tidak Memuaskan',
    // COUNT(picked) as 'Jumlah Keseluruhan'

    public function list_by_rated_category()
    {
        $this->db->cache_off();
        $query = $this->db->query("SELECT 
            SUM(picked = 1) as 'rate_1',
            SUM(picked = 2) as 'rate_2',
            SUM(picked = 3) as 'rate_3',
            SUM(picked = 4) as 'rate_4',
            SUM(picked = 5) as 'rate_5',
            COUNT(picked) as 'total'            
            FROM rateit
            WHERE Year(date_update) = '". $this->year ."'
            ");     

        return $query->result_array();
    }    

    public function list_today_by_rated_category()
    {
        // Reset cache every 25th each month
        $cache = ((date('d') == '25')? $this->db->cache_on() :  $this->db->cache_delete('api', 'report-by-rated-category'));        

        $stmt = "SELECT 
            SUM(picked = 1) as 'rate_1',
            SUM(picked = 2) as 'rate_2',
            SUM(picked = 3) as 'rate_3',
            SUM(picked = 4) as 'rate_4',
            SUM(picked = 5) as 'rate_5',
            COUNT(picked) as 'total'            
            FROM rateit            
            WHERE Date(date_update) = '". $this->today ."'
            ";

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }    

        $query = $this->db->query($stmt);

        return $query->result_array();
    }       

    public function list_filter_by_agency_with_agency_name($id, $start, $end)
    {
        $this->db->cache_off();
        $stmt = "SELECT agency_id,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            konfigurasi.Bahagian AS section,
            SUM(picked = 1) as 'rate_1',
            SUM(picked = 2) as 'rate_2',
            SUM(picked = 3) as 'rate_3',
            SUM(picked = 4) as 'rate_4',
            SUM(picked = 5) as 'rate_5',
            COUNT(picked) as 'total'
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id ";

        // Filter by Current Year
        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            $stmt .= " WHERE Year(date_update) = '". $this->year ."'";
        } else {
            // $stmt .= " WHERE LEFT(agency_id, 9) = $id AND Year(date_update) = YEAR(CURDATE())"; 
            $stmt .= " WHERE agency_id = $id AND Year(date_update) = '". $this->year ."'"; 
        }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }

        // Filter by Date Range
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_update) BETWEEN date('$start') AND date('$end')";
        }        

        $stmt .= " GROUP BY agency_id";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    } 

    public function list_filter_feedback($id, $start, $end)
    {
        $this->db->cache_off();
        $stmt = "SELECT agency_id,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            konfigurasi.Bahagian AS section,
            SUM(reason = 2) as 'feedback_1',
            SUM(reason = 1) as 'feedback_2',
            SUM(reason = 3) as 'feedback_3',
            SUM(reason = 11) as 'feedback_4',
            SUM(reason = 32) as 'feedback_5',
            vtotal_feedback_reason.total
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id 
            LEFT JOIN vtotal_feedback_reason ON vtotal_feedback_reason.agency = agency_id ";

        // Filter by Current Year
        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            $stmt .= " WHERE Year(date_update) = '". $this->year ."'";
        } else {
            // $stmt .= " WHERE LEFT(agency_id, 9) = $id AND Year(date_update) = YEAR(CURDATE())"; 
            $stmt .= " WHERE agency_id = $id AND Year(date_update) = '". $this->year ."'"; 
        }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }
        
        // Filter by Date Range
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_update) BETWEEN date('$start') AND date('$end')";
        }        

        $stmt .= " GROUP BY agency_id";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    } 


    // laporan Purata 

    public function list_filter_laporan_purata($id, $start, $end,$petugas, $pilihanlaporan)
    {
       // if ($pilihanlaporan == '3' ) $picked = '2';
       //  elseif ($pilihanlaporan == '4') $picked = '1';

        $this->db->cache_off();
        $stmt = "SELECT rate_id,
            pengguna.nama AS petugas,
            soalan.Soalan_Ms AS perkara,
            smiley.Caption_Ms As tahap,  
            rateit.date_update AS tarikh,
            rateit.date_update AS masa
            
        FROM rateit
        LEFT JOIN pengguna ON pengguna.id_pengguna = rateit.user_id
        LEFT JOIN soalan ON soalan.Id_Soalan = rateit.reason
        LEFT JOIN smiley ON smiley.Id_Smiley = rateit.picked

        WHERE rateit.picked = '$picked' ";
            
        // Filter by Current Year
        // AND/OR Filter by Agency Id
        // if ($id == "all") { 
        //     $stmt .= " AND Year(date_update) = '". $this->year ."'";
        // } else {
        //     // $stmt .= " WHERE LEFT(agency_id, 9) = $id AND Year(date_update) = YEAR(CURDATE())"; 
        //     $stmt .= " AND agency_id = '$id' AND Year(date_update) = '". $this->year ."'"; 
        // }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }

        // Filter by Date Range
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_update) BETWEEN date('$start') AND date('$end')";
        } 

        // Filter by pengguna]
        if ($petugas == 'all') $stmt .= " AND agency_id = '$id'";
        else  $stmt .= " AND pengguna.id_pengguna = '$petugas'";
 
        //$stmt .= " GROUP BY rate_1";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    } 

    // end laporan Purata 

    // laporan kurang memuaskan dan tidak memuaskan

    public function list_filter_laporan_keseluruhan($id, $start, $end, $petugas, $pilihanlaporan)
    {
        if ($pilihanlaporan == '3' ) $picked = '2';
        elseif ($pilihanlaporan == '4') $picked = '1';

      

        $this->db->cache_off();
        $stmt = "SELECT rate_id,
            pengguna.nama AS petugas,
            soalan.Soalan_Ms AS perkara,
            smiley.Caption_Ms As tahap,  
            rateit.date_update AS tarikh,
            rateit.date_update AS masa
            
        FROM rateit
        LEFT JOIN pengguna ON pengguna.id_pengguna = rateit.user_id
        LEFT JOIN soalan ON soalan.Id_Soalan = rateit.reason
        LEFT JOIN smiley ON smiley.Id_Smiley = rateit.picked ";

        if (($pilihanlaporan =='3' ) || ($pilihanlaporan == '4'))
            $stmt .= "WHERE rateit.picked = '$picked' ";
        else $stmt .= "WHERE 1=1 ";
            
        // Filter by Current Year
        // AND/OR Filter by Agency Id
        // if ($id == "all") { 
        //     $stmt .= " AND Year(date_update) = '". $this->year ."'";
        // } else {
        //     // $stmt .= " WHERE LEFT(agency_id, 9) = $id AND Year(date_update) = YEAR(CURDATE())"; 
        //     $stmt .= " AND agency_id = '$id' AND Year(date_update) = '". $this->year ."'"; 
        // }

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }

        // Filter by Date Range
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_update) BETWEEN date('$start') AND date('$end')";
        } 

        // Filter by pengguna]
        if ($petugas == 'all') $stmt .= " AND agency_id = '$id'";
        else  $stmt .= " AND pengguna.id_pengguna = '$petugas'";
 
        //$stmt .= " GROUP BY rate_1";     
        $stmt .= " ORDER BY petugas ASC";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    } 

    // end laporan kurang memuaskan dan tidak memuaskan

    // public function list_by_agency_with_agency_name()
    // {
    //     $this->db->cache_off();
    //     $query = $this->db->query("SELECT agency_id,
    //         kementerian.kementerian AS ministry,
    //         jabatan.jabatan AS department,
    //         cawangan.cawangan AS branch,
    //         konfigurasi.Bahagian AS section,
    //         SUM(picked = 1) as '1',
    //         SUM(picked = 2) as '2',
    //         SUM(picked = 3) as '3',
    //         SUM(picked = 4) as '4',
    //         SUM(picked = 5) as '5',
    //         COUNT(picked) as 'total'
    //         FROM rateit
    //         LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
    //         LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
    //         LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
    //         LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id
    //         WHERE Year(date_update) = '". $this->year ."'
    //         GROUP BY agency_id
    //         ");     

    //     return $query->result_array();
    // }    




    public function list_total_rating_monthly()
    {
        // Reset cache every 25th each month
        $cache = ((date('d') == '25')? $this->db->cache_on() :  $this->db->cache_delete('api', 'report-by-rated-category'));   

        $this->db->cache_off();
        // $query = $this->db->query("SELECT Month(date_update) AS month,
        //     SUM(picked = 1) as 'rate_1',
        //     SUM(picked = 2) as 'rate_2',
        //     SUM(picked = 3) as 'rate_3',
        //     SUM(picked = 4) as 'rate_4',
        //     SUM(picked = 5) as 'rate_5',            
        //     COUNT(picked) as 'total'
        //     FROM rateit
        //     LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
        //     LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
        //     LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
        //     LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id
        //     WHERE Year(date_update) = '". $this->year ."'            
        //     ");

        $stmt = "SELECT Month(date_update) AS month,
            SUM(picked = 1) as 'rate_1',
            SUM(picked = 2) as 'rate_2',
            SUM(picked = 3) as 'rate_3',
            SUM(picked = 4) as 'rate_4',
            SUM(picked = 5) as 'rate_5',            
            COUNT(picked) as 'total'
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id
            WHERE Year(date_update) = '". $this->year ."' 
            ";

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }     

        $stmt .= " GROUP BY Month(date_update)";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    }  

    public function list_total_rating_monthly_and_agency()
    {
        $this->db->cache_off();
        $query = $this->db->query("SELECT agency_id, 
            MONTH(date_update) AS month, 
            COUNT(picked) AS 'total'
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab = LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9) 
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id
            WHERE YEAR( date_update) = '". $this->year ."'
            GROUP BY MONTH(date_update), agency_id
            ORDER BY MONTH(date_update) ASC            
            ");

        return $query->result_array();
    }

    public function list_total_rating_monthly_and_agency_pivot($id)
    {
        $this->db->cache_off();
        // Fetch data from view
        $stmt = "SELECT 
            vtotal_agency_month_final.*, 
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            konfigurasi.Bahagian AS section            
            FROM vtotal_agency_month_final
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab = LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9) 
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id                     
            ";

        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            // Filter by User Roles
            if ($this->role == 'Pentadbir') {
                $stmt .= " WHERE agency_id LIKE '". $this->agency ."%'";
            }
        } else {
            // $stmt .= " WHERE Year(date_update) = YEAR(CURDATE()) AND LEFT(agency_id, 9) = $id"; 
            $stmt .= " WHERE agency_id = $id"; 
        }

        $query = $this->db->query($stmt);

        return $query->result_array(); 
    }

    public function list_by_agency_with_agency_name_top_three()
    {
        $this->db->cache_off();
        $stmt = "SELECT agency_id,
            kementerian.kementerian AS ministry,
            jabatan.jabatan AS department,
            cawangan.cawangan AS branch,
            konfigurasi.Bahagian AS section,
            COUNT(picked) as 'total'
            FROM rateit
            LEFT JOIN kementerian ON kementerian.Kod_Kem = LEFT(agency_id, 3) 
            LEFT JOIN jabatan ON jabatan.Kod_Jab= LEFT(agency_id, 6) 
            LEFT JOIN cawangan ON cawangan.Kod_Caw = LEFT(agency_id, 9)
            LEFT JOIN konfigurasi ON konfigurasi.Kod_Bah = agency_id
            WHERE Date(date_update) = '". $this->today ."'
            ";     

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $stmt .= " AND agency_id LIKE '". $this->agency ."%'";
        }     

        $stmt .= " GROUP BY agency_id ORDER BY total DESC LIMIT 3";     
        
        $query = $this->db->query($stmt);

        return $query->result_array();
    }  

    public function list_by_date_range($from, $to)
    {
        $this->db->cache_off();
        $query = $this->db->query("SELECT * FROM rateit
            WHERE 
            date(date_update) BETWEEN date('2016-10-01') AND date('2016-11-26')
            ");     

        return $query->result_array();
    }

    public function list_by_agency_group_by_month_in_selected_year($year)
    {
        $this->db->cache_off();
        $query = $this->db->query("SELECT agency_id, 
            COUNT(rate_id) AS 'Total Rating', 
            Date(date_update) 
            FROM rateit 
            WHERE Year(date_update) = $year
            GROUP BY agency_id, Month(date_update)
            ");     

        return $query->result_array();
    }

    // SELECT agency_id, COUNT(rate_id) AS 'Total Rating', Date(date_update) FROM rateit GROUP BY agency_id, Month(date_update)
    // SELECT * FROM `rateit` where date_update between STR_TO_DATE('2016-11-24 00:00:00','%Y-%c-%e %H:%i:%s') and STR_TO_DATE('2016-11-26 23:59:00', '%Y-%c-%e %H:%i:%s')
    // SELECT * FROM rateit where date_update between STR_TO_DATE('2016-10-01 00:00:00','%Y-%m-%d %H:%i:%s') and STR_TO_DATE('2016-11-26 23:59:00', '%Y-%m-%d %H:%i:%s')
    // SELECT agency_id, picked, STR_TO_DATE(date_update,'%Y-%c-%e') AS r_date, STR_TO_DATE(date_update,'%m') AS r_month FROM rateit 

    public function save_rate($data)
    {
        $items = null; $values = null;     
        $sessionid = md5(uniqid(rand()));   

        foreach($data as $key => $value) {
            $items  .= "". $key .",";
            $values .= "'". $value ."',";
        }               

        // Generete unique session id
        $items .= "session_id,";
        $values .= "'". $sessionid ."',";

        // Insert Date Updated
        $items .= "date_update,";
        $values .= "'". date("Y-m-d H:i:s", time()) ."',";

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                

        $result = $this->db->query("INSERT INTO rateit (".$qitems.") VALUES (".$qvalues.")");              
            
        return $result;
    }      

    public function save_rate_mobile($agency, $user, $picked)
    {
        $items = null; $values = null;     
        $sessionid = md5(uniqid(rand()));   
       
        $items .= "agency_id,";
        $values .= "'". $agency ."',";

        $items .= "user_id,";
        $values .= "'". $user ."',";   

        $items .= "picked,";
        $values .= "'". $picked ."',";             

        // Generete unique session id
        $items .= "session_id,";
        $values .= "'". $sessionid ."',";

        // Insert Date Updated
        $items .= "date_update,";
        $values .= "'". date("Y-m-d H:i:s", time()) ."',";

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                

        $result = $this->db->query("INSERT INTO rateit (".$qitems.") VALUES (".$qvalues.")");              
            
        return $result;
    } 
    public function update_agency($data)
    {
        // Update Record
        $this->db->set('Status', $data['Status']);
        $this->db->set('Bahagian', $data['Bahagian']);        
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

       public function stats_total_rating()
    {        
        $this->db->cache_off();
        // $query = $this->db->query("SELECT * FROM rateit WHERE Year(date_update) = YEAR(CURDATE())");
        // return $query->num_rows();        

        $this->db->select('COUNT(rate_id)');
        $this->db->from('rateit');
        $this->db->where('Date(date_update)', $this->today);

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $this->db->like('agency_id', $this->agency, 'after');            
        }

        $query = $this->db->get();
        $result = implode(" ",$query->row_array());

        // echo $this->db->last_query();    //print last query

        return  $result;           
    } 

     public function stats_total_comment()
    {        
        $this->db->cache_off();
        // $query = $this->db->query("SELECT * FROM rateit WHERE picked <= 2 AND Year(date_update) = YEAR(CURDATE())");
        // return $query->num_rows(); 

        $this->db->select('COUNT(rate_id)');
        $this->db->from('rateit');
        $this->db->where('picked <=', 2);
        // $this->db->where('Year(date_update)', $this->year);
        $this->db->where('Date(date_update)', $this->today);

        // Filter by User Roles
        if ($this->role == 'Pentadbir') {
            $this->db->like('agency_id', $this->agency, 'after');            
        }

        $query = $this->db->get();
        
        $result = implode(" ",$query->row_array());

        // echo $this->db->last_query();    //print last query

        return  $result;              
    }               
}

