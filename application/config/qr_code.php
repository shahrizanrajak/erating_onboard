<?php



// $config['cacheable']	= true; //boolean, the default is true
// $config['cachedir']		= ''; //string, the default is application/cache/
// $config['errorlog']		= ''; //string, the default is application/logs/
// $config['ciqrcodelib']	= 'application/third_party/qrcode/'; 
// $config['quality']		= true; //boolean, the default is true
// $config['size']			= ''; //interger, the default is 1024
// $config['black']		= array(224,255,255); // array, default is array(255,255,255)
// $config['white']		= array(70,130,180); // array, default is array(0,0,0)


$config['cacheable'] 	= TRUE; //boolean, the default is true
$config['cachedir'] 	= 'global/tmp/cache/'; //string, the default is tmp/cache/
// simpan qr code user untuk paparkan pada view QR Kaunter.
$config['imagedir'] 	= 'global/qr_user/'; //string, the default is codes/
$config['imagedir'] 	= 'global/tmp/qr_codes/'; //string, the default is tmp/qr_codes/
$config['errorlog'] 	= 'global/tmp/logs/'; //string, the default is tmp/logs/
$config['ciqrcodelib'] 	= 'application/third_party/qrcode/'; //string, the default is application/third_party/qr_code/
$config['quality'] 		= TRUE; //boolean, the default is true
$config['size'] 		= 1024; 	//interger, the default is 1024
$config['black']        = array(224,255,255); // array, default is array(255,255,255)
$config['white']        = array(70,130,180); // array, default is array(0,0,0)