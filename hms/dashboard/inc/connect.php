<?php
//error_reporting(0);
if(!isset($_SESSION["username"]))
{
	header("Location: ../../");
}
$db_connect =mysqli_connect("localhost","root","");
$connection = $db_connect;
mysqli_select_db($db_connect, "hms") or die(mysql_error($db_connect));

?>