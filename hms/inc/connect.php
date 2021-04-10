<?php
/* This script connect the database */

$db['db_host'] = "localhost";  /* Enter your host here */
$db['db_user'] = "root";	   /* Enter your database username */
$db['db_pass'] = "";		   /* Enter your database password here */
$db['db_name'] = "hms";	   /* Enter your database name here */

/* define the key of array "db" as constant */ 
foreach($db as $key => $value){
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_connect = $connection;
if(!$connection)
{
	//die("No connection");
}

/* include necessary function for read and write to database */
include "functions.php";
?>