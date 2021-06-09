
<?php 
include("../inc/connect.php");
	//add new record
	if(isset($_GET['addrecord']) &&  isset($_GET['id'])){
		$patientId = escape($_GET['id']);
		$queryUpdateHasRecord = "UPDATE patientregister set hasrecord='1' WHERE id='$patientId'";
		$queryAddRecordStatus=mysqli_query($db_connect, $queryUpdateHasRecord)or die (mysqli_error($db_connect));
	}
	header("Location: patientrecord.php");
?>