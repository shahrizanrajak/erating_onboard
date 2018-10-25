<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        
        // $this->agency = substr($this->session->userdata('agency'), 0, 3);  // get main agency ID        
    }

    public function list_all()
    {
        $this->db->cache_off();
        $this->db->select('id_pengguna, nama, agensi_id');
        $this->db->from('pengguna');
        $query = $this->db->get();      

        return $query->result_array();
    }   

    public function list_by_agency($id = NULL)
    {
        $this->db->cache_off();
        $this->db->select('id_pengguna, kad_pengenalan, nama, tahap, jawatan');
        $this->db->from('pengguna');
        $this->db->where('agensi_id', $id);  
        $query = $this->db->get();      

        return $query->result_array();
    }   

      public function list_by_agency_sortname($id = NULL)
    {
        $this->db->cache_off();
        $this->db->select('id_pengguna, UPPER(nama) as nama');
        $this->db->from('pengguna');
        $this->db->where('agensi_id', $id); 
        $this->db->order_by("UPPER(nama)","asc"); 

        $query = $this->db->get();      

        return $query->result_array();
    }      

    public function list_by_agency_counter($id = NULL)
    {
        $this->db->cache_off();
        $this->db->select('pengguna.id_pengguna, pengguna.nama, pengguna.tahap, photo.photo');
        $this->db->from('pengguna');
        $this->db->join('photo', 'pengguna.id_pengguna = photo.parentid', 'left'); 
        $this->db->where('pengguna.agensi_id', $id);  
        $this->db->where('pengguna.tahap', 'Kaunter');  
        $this->db->where('status', 'A');  
        $query = $this->db->get();      

        return $query->result_array();
    } 

    public function validate($data)
    {       
        // $query = $this->db->get_where('user', array('email' => $data['email'], 'password' => $data['password']));
        if ($data) 
        {
            $this->db->cache_off();
            // kalau password @ username kosong balik ke login page
             if (($data['loginname'] == '') || ($data['password']==''))
            {
                return false;
            }

            // end
            
            $query = $this->db->get_where('pengguna', array('kad_pengenalan' => $data['loginname'], 'kata_laluan' => $data['password'], 'status' => 'A'));      
            $result = $query->row_array();

            if ($result) {        
                // Update user log - login
                self::update_user_log($result['id_pengguna'], $data['login-key']);
                return $result;                
            } else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    public function save($data)
    {
        $items = null; 
        $values = null;
        // $sessionid = md5(uniqid(rand()));
        $getIc = $data['kad_pengenalan'];

        foreach($data as $key => $value) {
            $items  .= "". $key .",";
            $values .= "'". $value ."',";
        }       

        // $items .= "session_id,";
        // $values .= "'". $passkey ."',";

        $items .= "tarikh_kemaskini,";
        $values .= "'". date("Y-m-d h:m:s") ."',";

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                
 
        if ($findIc = self::find_user_by_ic($getIc)) 
        {
            // return 5;
            throw new Exception('duplicate IC found');            
            return false;            
        } 
        else 
        {
            $result = $this->db->query("INSERT INTO pengguna (".$qitems.") VALUES (".$qvalues.")");             
            return $result;
        }                       
    }

    public function update($data)
    {
        // Update Record        
        $this->db->set('kad_pengenalan', $data['kad_pengenalan']);
        $this->db->set('kata_laluan', $data['kata_laluan']);
        $this->db->set('nama', $data['nama']);
        $this->db->set('jawatan', $data['jawatan']);
        $this->db->set('emel', $data['emel']);
        $this->db->set('no_telefon', $data['no_telefon']);
        $this->db->set('tahap', $data['tahap']);
        $this->db->set('status', $data['status']);
        $this->db->set('tarikh_kemaskini', date("Y-m-d H:i:s", time()));
        $this->db->where('id_pengguna', $data['id_pengguna']);
        $result = $this->db->update('pengguna');        

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }    

    public function remove($data)
    {           
        $this->db->where('id_pengguna', $data['uid']);
        $result = $this->db->delete('pengguna');

        // echo $this->db->last_query();    //print last query
        
        return $result;     
    }       

    public function find_user($id = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('*');
        $this->db->from('pengguna');   
        $this->db->where('id_pengguna', $id);   
        $query = $this->db->get();
       
        return $query->row_array();     
    }   

    public function find_user_with_photo($id = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('pengguna.*, photo.photo');
        $this->db->from('pengguna');
        $this->db->join('photo', 'pengguna.id_pengguna = photo.parentid', 'left');         
        // $this->db->where('photo.type =', 'photo');                 
        $this->db->where('pengguna.id_pengguna =', $id);          
        $this->db->order_by('photo.id', 'DESC');       
        $query = $this->db->get();
       
        return $query->row_array();     
    }    

   





    public function find_user_by_ic($ic = NULL)
    {           
        $this->db->cache_off();
        $this->db->select('*');
        $this->db->from('pengguna');   
        $this->db->where('kad_pengenalan', ''. $ic .'');   
        $this->db->where('status', 'A');   
        $query = $this->db->get();
       
        return $query->row_array();     
    }    

    public function update_user_log($id, $key)
    {           
        $data = array(
            'user_id' => $id,
            'session_id' => $key,
            'date_login' => date("Y-m-d H:i:s", time()),
            'status' => 1
        );

        $result = $this->db->insert('user_log', $data);      

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }    
    } 

    public function user_log_details_by_agency($id, $start, $end)
    {           
        $this->db->cache_off();
        $stmt = "SELECT user_log.*, 
            pengguna.agensi_id,
            pengguna.nama,
            pengguna.jawatan
            FROM user_log 
            LEFT JOIN pengguna ON user_log.user_id = pengguna.id_pengguna             
        ";

        // AND/OR Filter by Agency Id
        if ($id == "all") { 
            // Filter by User Roles
            if ($this->session->userdata('role') == 'Pentadbir') {
                $stmt .= " WHERE agensi_id LIKE '". substr($this->session->userdata('agency'), 0, 3) ."%'";
            }
        } else {
            // $stmt .= " WHERE LEFT(pengguna.agensi_id,9) = $id"; 
            $stmt .= " WHERE pengguna.agensi_id = $id"; 
        }        

        // Filter by Login Date
        if (($start != 'null') && ($end != 'null')) {
            $stmt .= " AND date(date_login) BETWEEN date('$start') AND date('$end')";
        }              

        $query = $this->db->query($stmt);

        return $query->result_array(); 
    }        

    public function logout()
    {
        // Update user log - logout        
        $this->db->set('date_logout', date("Y-m-d H:i:s", time()));
        $this->db->set('status', 0);
        $this->db->where('user_id', $this->session->userdata('logged_id'));
        $this->db->where('session_id', $this->session->userdata('login_key'));
        $result = $this->db->update('user_log');        

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }            
    }   

    public function stats_user_active()
    {        
        // $query = $this->db->query("SELECT * FROM pengguna WHERE status='A'");

        // return $query->num_rows();  

        // $this->db->select('COUNT(id_pengguna)');
        // $this->db->from('pengguna');
        // $this->db->where('Status', 'A'); 

        $this->db->cache_off();   
        
        $this->db->select('COUNT(DISTINCT user_log.user_id)');
        $this->db->from('user_log');
        $this->db->join('pengguna', 'pengguna.id_pengguna = user_log.user_id');
        $this->db->where('user_log.status', 1);          

        // Filter by User Roles
        if ($this->session->userdata('role')== 'Pentadbir') {
            $this->db->like('pengguna.agensi_id', substr($this->session->userdata('agency'), 0, 3), 'after');            
        }

        $query = $this->db->get();        
        $row = $this->db->last_query();
        $result = implode(" ",$query->row_array());

        // echo $this->db->last_query(); 

        return  $result;         
    }     

    public function update_inactive_session()
    {           
        // $data = array(
        //     'user_id' => substr(time(), -2),
        //     'session_id' => time(),
        //     'date_logout' => date("Y-m-d H:i:s", time()),
        //     'status' => 1
        // );

        // $result = $this->db->insert('user_log', $data);     

        $this->db->set('date_logout', date("Y-m-d H:i:s", time()));
        $this->db->set('status', 3);
        $this->db->where('user_id', '2358');
        $this->db->where('session_id', '5912ce3f80888');
        
        $result = $this->db->update('user_log');           

        if ($result) {
            return $result; 
        } else {
            throw new Exception('error in query');
            return false;
        }    
    }

   public function save_rate_mobile($agency, $user, $picked, $qr='qr', $soalan)
    {
        $items = null; $values = null;     
        $sessionid = md5(uniqid(rand()));   
       
        $items .= "agency_id,";
        $values .= "'". $agency ."',";

        $items .= "user_id,";
        $values .= "'". $user ."',";   

        $items .= "picked,";
        $values .= "'". $picked ."',";   

         $items .= "reason,";
        $values .= "'". $soalan ."',";           

        // Generete unique session id
        $items .= "session_id,";
        $values .= "'". $sessionid ."',";

        // status mobile qr
        $items .= "qr,";
        $values .= "'". $qr ."',";

        // Insert Date Updated
        $items .= "date_update,";
        $values .= "'". date("Y-m-d H:i:s", time()) ."',";

        $qitems = substr($items, 0, -1);
        $qvalues = substr($values, 0, -1);                

        $result = $this->db->query("INSERT INTO rateit (".$qitems.") VALUES (".$qvalues.")");              
            
        return $result;
    }                  
}

