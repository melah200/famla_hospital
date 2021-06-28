<?php
  // print_r($_POST);
  // exit();

  if(!isset($_POST['submit'])){
	 header("Location: ../");  
  }
include("../../../hms/inc/connect.php");
include("../../../hms/inc/functions.php");
global $db_connect;

$name = escape($_POST['name']);
$email = escape($_POST['email']);
$phone = escape($_POST['phone']);
$date = escape($_POST['date']);
$doctor = escape($_POST['doctor']);
$remark = escape($_POST['message']);

  
  $queryAdd = "INSERT INTO appointment(name, phone, email, date, doctor, remark) ";
  $queryAdd.= "Values('$name', '$phone', '$email', '$date', '$doctor', '$remark') ";
  $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
  print_r($queryAddResult);
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
