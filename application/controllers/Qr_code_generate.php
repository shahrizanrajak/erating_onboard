<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qr_code_generate extends CI_Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model', 'user');
        $this->load->model('user_model');
        $this->load->library('ci_qr_code');
        $this->config->load('qr_code');
        $this->load->library('pdf');

    }

    /**
     * success_link
     * to display user info and see print link
     * @access public
     * @param user_id
     * @return
     */
    function index(){
        $data['user']=$this->user_model->find_user(60);
        // $data['user']='cubaan sahaja nie';
        $this->load->view('admin/qrcode',$data);
        // $this->load->view('admin/qrcode');           
    }

    /**
     * print_qr
     *
     * @access public
     * @param user_id
     * @return
     */

    function print_pdf($user_id)
    {
        //$this->load->library('Pdf');
        $data['user']=$this->user_model->find_user_with_photo($user_id);
       // var_dump($data); exit;
        $this->load->view('pdf_kaunter3',$data);
    }

    function root_url()
    {
      return $_SERVER['HTTP_HOST'] . '/';
    }
    function print_qr($user_id)
    {

        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);
    
        // mkdir($qr_code_config['imagedir'] . 'test');

        // get full name and user details
        $user_details = $this->user_model->find_user($user_id);
        $image_name = $user_id . ".png";


        // print_r($user_details);        

        // create user content
        // $codeContents = "user_name:";
        // $codeContents .= $user_details['nama'];
        // $codeContents .= " user_jawatan:";
        // $codeContents .= $user_details['jawatan'];
        // $codeContents .= "\n";
        // $codeContents .= "user_email :";
        // $codeContents .= $user_details['emel'];

        // $rootUrl = 'http://erating2.mampu.gov.my/';
        $codeContents = $this->config->item(base_url) . 'index.php/mobile/' . $user_details['id_pengguna'];   
        // mkdir($qr_code_config['imagedir'] . $user_details['id_pengguna']);     

        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 50;

        $params['savename'] = $qr_code_config['imagedir'] . $image_name;     

        // echo $params['savename'];

        $this->ci_qr_code->generate($params);


        // $this->data['qr_code_image_url'] = '/global/tmp/qr_codes/' . $qr_code_config['imagedir'] . $image_name;

        // save image path in tree table
        // $this->user_model->change_userqr($user_id, $image_name);

        // then redirect to see image link
        echo $file = $params['savename'];

        if(file_exists($file)){
            header('Content-Description: File Transfer');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            //unlink($file); // deletes the temporary file

            //exit;
        }
       return $file; 
       // $this->load->view('coordinator/qr_preview');
    }

}
// END qr_code_generate Controller class
/* End of file qr_code_generate.php */
/* Location: ./application/controllers/qr_code_generate.php */