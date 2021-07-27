<?php
  // print_r($_POST);
  // exit();
  //header("Location:../index.php?act=success");
  if(!isset($_POST['name'])){
	 header("Location: ../");  
  }
  // print_r($_POST);
    // exit();
if($_POST['name'] != ""){
	include("../../hms/inc/connect.php");
	// include("../../../hms/inc/functions.php");
	// function escape($string){
		
		// Global $db_connect;
		// return mysqli_real_escape_string($db_connect, trim($string));
	// }
	$name = escape($_POST['name']);
	$email = escape($_POST['email']);
	$phone = escape($_POST['phone']);
	$date = escape($_POST['date']);
	$starttime = escape($_POST['time']);
	$endtime = date( "H:i", strtotime( $starttime.' +30 min' ) );

	// check if the appointment is already taken
	$check_query = "SELECT * FROM addappointment WHERE `app_date`='$date' AND `starttime`='$starttime'";
	$check_result=mysqli_query($db_connect, $check_query);
	$FlagAppointmentAlreadyExist = (mysqli_num_rows($check_result) > 0)?true:false;
	
	if($FlagAppointmentAlreadyExist){
		// The appointment already exist
		header("Location: ../index.php?act=unsuccess&d=$date&t=$starttime");
		
	} else {
		// The appointment does not exist
		
		$doctor = "Doctor name";  //escape($_POST['doctor']);
		$remark = escape($_POST['message']);

	  
		$queryAdd = "INSERT INTO addappointment(name, phone, email, doctor, app_date, starttime, endtime, remark) ";
		$queryAdd.= "Values('$name', '$phone', '$email', '$doctor', '$date', '$starttime', '$endtime', '$remark') ";
		$queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
		// print_r($queryAddResult);
		// exit();
		header("Location: ../index.php?act=success");
	}
}else{
header("Location: ../");
}

?>
