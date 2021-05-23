<?php 
	//check if file is already in use
	if(!isset($connect_in_use)){
		$connect_in_use = "";
?>
<?php
//error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['username']))
{
	//redirect to home page if the user is not logged
	header("Location: ../../");
}
$db_connect =mysqli_connect("localhost","root","");
$connection = $db_connect;
mysqli_select_db($db_connect, "hms") or die(mysqli_error($db_connect));

function escape($string){
	global $db_connect;
  return mysqli_real_escape_string($db_connect, trim($string));
}

?>

	<?php } ?>