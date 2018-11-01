<?php 
class Pdfmaster extends CI_Controller{
function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->library('Pdf');
    }

       public function generate_pdf() {
         $this->load->view('pdfexample');
       }
     
 //        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
 //        $pdf->SetTitle('Pdf Example');
 //        $pdf->SetHeaderMargin(30);
 //        $pdf->SetTopMargin(20);
 //        $pdf->setFooterMargin(20);
 //        $pdf->SetAutoPageBreak(true);
 //        $pdf->SetAuthor('Author');
 //        $pdf->SetDisplayMode('real', 'default');
 //        $pdf->Write(5, 'CodeIgniter TCPDF Integration');
 //        //$pdf->Output('pdfexample.pdf', 'I');
 //    } 
 // function dispatches() {
 //        $this->load->view('pdfmaster/index');  
 //      }
}
?>