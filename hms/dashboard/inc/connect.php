<?php
//error_reporting(0);
$db_connect =mysqli_connect("localhost","root","");
mysqli_select_db($db_connect, "hms") or die(mysql_error($db_connect));

?>