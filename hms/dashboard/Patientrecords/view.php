<?php

function get_content_type($fname, $ext) {

	$mime_types = array(

		'txt' => 'text/plain',
		'htm' => 'text/html',
		'html' => 'text/html',
		'php' => 'text/html',
		'css' => 'text/css',
		'js' => 'application/javascript',
		'json' => 'application/json',
		'xml' => 'application/xml',
		'swf' => 'application/x-shockwave-flash',
		'flv' => 'video/x-flv',

		// images
		'png' => 'image/png',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpg' => 'image/jpeg',
		'gif' => 'image/gif',
		'bmp' => 'image/bmp',
		'ico' => 'image/vnd.microsoft.icon',
		'tiff' => 'image/tiff',
		'tif' => 'image/tiff',
		'svg' => 'image/svg+xml',
		'svgz' => 'image/svg+xml',

		// archives
		'zip' => 'application/zip',
		'rar' => 'application/x-rar-compressed',
		'exe' => 'application/x-msdownload',
		'msi' => 'application/x-msdownload',
		'cab' => 'application/vnd.ms-cab-compressed',

		// audio/video
		'mp3' => 'audio/mpeg',
		'qt' => 'video/quicktime',
		'mov' => 'video/quicktime',

		// adobe
		'pdf' => 'application/pdf',
		'psd' => 'image/vnd.adobe.photoshop',
		'ai' => 'application/postscript',
		'eps' => 'application/postscript',
		'ps' => 'application/postscript',

		// ms office
		'doc' => 'application/msword',
		'rtf' => 'application/rtf',
		'xls' => 'application/vnd.ms-excel',
		'ppt' => 'application/vnd.ms-powerpoint',

		// open office
		'odt' => 'application/vnd.oasis.opendocument.text',
		'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	);

	$ext = strtolower($ext);
	if (array_key_exists($ext, $mime_types)) {
		return $mime_types[$ext];
	}
	elseif (function_exists('finfo_open')) {
		$finfo = finfo_open(FILEINFO_MIME);
		$mimetype = finfo_file($finfo, $fname);
		finfo_close($finfo);
		return $mimetype;
	}
	else {
		return 'application/octet-stream';
	}
}
?>

<?php 
	// The location of the PDF file
	// on the server
	// $filename = ".\upload_documents\instructions_for_use.pdf";
	
	if(!isset($_GET['f'])){
		header("Location: patientrecordoverview.php");
	}
	include("../inc/connect.php");
	
	$fn = escape($_GET['f']);
	// print_r($fn);
	// exit();
	// $fn = "instructions_for_use.pdf";
	// $fn = "1624806028_test_diagramm.pdf";
	$path = dirname(__FILE__).'\\upload_documents\\';
	$filename = $path.$fn;
	$pInfo = pathinfo($filename);
	$extension = $pInfo['extension'];
	
	$type="application/pdf";
	// $type = get_content_type($filename, $extension);
	echo $type.'<br>'.$extension;
	
	// exit();
	
	// Header content type
	header('Content-type: '.$type);
	  
	header("Content-Length: " . filesize($filename));
	readfile($filename);
	

?>



