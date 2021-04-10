<?php
//error_reporting(0);
if(!isset($_SESSION["username"]))
{
	//redirect to home page if the user is not logged
	header("Location: ../../");
}
$db_connect =mysqli_connect("localhost","root","");
$connection = $db_connect;
mysqli_select_db($db_connect, "hms") or die(mysqli_error($db_connect));

?>