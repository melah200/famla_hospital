<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "famla";

foreach($db as $key => $value){
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection)
{
	//die("No connection");
}
define('CHARSET', 'ISO-8859-1');
define('REPLACE_FLAGS', ENT_COMPAT | ENT_XHTML);

// This function check if the connection to Database was OK
function confirmQuery($result){
		
	Global $connection;
		
	if(!$result){
		//An Error is occur: Stop the script
		die('QUERY FAILED '. mysqli_error($connection));
	}
}

function escape($string){
	
	Global $connection;
	return mysqli_real_escape_string($connection, trim($string));
}

function html($string) {
    return htmlspecialchars($string, REPLACE_FLAGS, CHARSET);
}

function add2table($table, $key, $value){
	global $connection;
	$arrValue = explode(",", $value);
	$query = "INSERT INTO $table($key) VALUE(";//'$value'})";
	$firstCall = 1;
	foreach($arrValue as $input){
		// echo $input.'<br>';
		if($firstCall){
			$query .= "'$input'";
		} else{
		$query .= ", '$input'";
		}
		$firstCall = 0;
	}
	$query .= ") ";
	//print_r($query);
	$query_add = mysqli_query($connection, $query);
	//print_r($query_add);

	return $query_add;
	
}
// Function to check if an entry already exist
function checkEntryInDB($table, $key, $value){
	Global $connection;
	
	$query = "SELECT $key FROM $table WHERE $value";
	$query_check = mysqli_query($connection, $query);
	
	 // print_r($query_check);
	
	if(isset($query_check) && (mysqli_num_rows($query_check) > 0))
	{
		 // die("Check : true");
		return true;
	}
	else{
		 // die("Check : false");
		return false;
	}
	
}

// read all data in the table
function readAllDbTable($table){
	global $connection;
	$query = "SELECT * FROM $table";
		
	$query_red = mysqli_query($connection, $query);
	return $query_red;
}

// Function to read data with specific column value
function readDataWithSpecColumn($table, $key, $value){
	global $connection;
	
	$query = "SELECT $key FROM $table WHERE $value";
	$query_readcol = mysqli_query($connection, $query);
	
	return $query_readcol;
	
}

?>