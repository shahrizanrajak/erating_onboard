<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'image_demo22.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('QR Code Pegawai');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 20);

$pdf->setJPEGQuality(75);

// add a page
$pdf->AddPage();

// Print a text
// $html = '<span style="background-color:yellow;color:blue;">&nbsp;QR Code Pegawai&nbsp;</span>
// <p stroke="0.2" fill="true" strokecolor="black" color="blue" style="font-family:helvetica;font-weight:bold;font-size:26pt;">Sistem e-Rating 2.0</p>';
// $pdf->writeHTML($html, true, false, true, false, '');

 $nama=$user['nama'];
 $jawatan=$user['jawatan'];
 $gambar=$user['photo'];
 $uId = $user['id_pengguna'];
 //$cawangan = $user['Cawangan'];
 $noimage = '/templates/images/no-image.png';




// keluarkan QR CODE
//$pdf->Image( base_url() . 'global/tmp/qr_codes/' . $uId . '.png' , 100, 50, 75, 80); 
$pdf->Image( $this->config->item(base_url) . 'global/tmp/qr_codes/' . $uId . '.png' , 57, 153, 98, 98); 

// keluarkan gambar
//$pdf->Image( $gambar , 20, 50, 70, 80);
//$pdf->Image( $gambar , 73, 70, 65, 80);

if ($gambar == null ) {
    $pdf->Image( $noimage , 73, 70, 65, 80);
}
else
    $pdf->Image( $gambar , 73, 70, 65, 80);






$pdf->Write(70, ''.$nama.'' , '', 0, 'C', true, 0, false, false, 0);
$html = <<<EOD
EOD;
 
// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell( 1000, 70, 50, 60, $html, 0, 1, 0, true, '', true);



//Close and output PDF document
//$pdf->Output('QRcode.pdf', 'I');
$pdf->Output(''. $nama.''.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+