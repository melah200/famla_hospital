<?php
  // print_r($_POST);
  // exit();

  if(!isset($_POST['name'])){
	 header("Location: ../");  
  }
  // print_r($_POST);
    // exit();
include("../../../hms/inc/connect.php");
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
$endtime = date( "H:i:s", strtotime( $starttime.' +30 min' ) );

$doctor = "Doctor name";  //escape($_POST['doctor']);
$remark = escape($_POST['message']);

  
  $queryAdd = "INSERT INTO addappointment(name, phone, email, doctor, app_date, starttime, endtime, remark) ";
  $queryAdd.= "Values('$name', '$phone', '$email', '$doctor', '$date', '$starttime', '$endtime', '$remark') ";
  $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
  // print_r($queryAddResult);
  // exit();
  header("Location: ../");
  
  
 /* 
Vollständige Texte	
id
doctor
name
email
password
address
phone
gender
birthdate
bloodgroup
imageupload
status
hasrecord
*/
?>
