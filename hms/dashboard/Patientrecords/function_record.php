<?php
function deleteOneRecordEntry($table, $patientId, $entry)
{
	global $db_connect;
	switch($table){
		case "diagnostic":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId} AND idD = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "finding":
		{
			$queryDelDiag = "DELETE FROM befunde WHERE pid = {$patientId} AND idB = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "examination":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId} AND idE = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "vaccination":
		{
			$queryDelDiag = "DELETE FROM impfung WHERE pid = {$patientId} AND idI = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "activity":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId} AND idA = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "medicationplan":
		{
			$queryDelDiag = "DELETE FROM medikationplan WHERE pid = {$patientId} AND idMP = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "emergencydata":
		{
			$queryDelDiag = "DELETE FROM notfalldaten WHERE pid = {$patientId} AND idN = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "history":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId} AND idH = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "document":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId} AND idDo = {$entry}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		default:
		    break;
	}
}

function deleteAllEntryOfOneRecord($table, $patientId)
{
	global $db_connect;
	switch($table){
		case "diagnostic":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "finding":
		{
			$queryDelDiag = "DELETE FROM befunde WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "examination":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "vaccination":
		{
			$queryDelDiag = "DELETE FROM impfung WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "activity":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "medicationplan":
		{
			$queryDelDiag = "DELETE FROM medikationplan WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "emergencydata":
		{
			$queryDelDiag = "DELETE FROM notfalldaten WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "history":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		case "document":
		{
			$queryDelDiag = "DELETE FROM $table WHERE pid = {$patientId}";
			$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
			break;
		}
		default:
		    break;
	}
}


function deleteAllEntryOfAllRecords($patientId)
{
	global $db_connect;

	$queryDelDiag = "DELETE FROM diagnostic WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM befunde WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM examination WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM impfung WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM activity WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM medikationplan WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM notfalldaten WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM history WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));

	$queryDelDiag = "DELETE FROM document WHERE pid = {$patientId}";
	$query=mysqli_query($db_connect, $queryDelDiag)or die (mysqli_error($db_connect));
	
	UpdateHasRecordFlag($patientId, 0);
}

function UpdateHasRecordFlag($patientId, $flag){
	global $db_connect;
	if($flag == 0 || $flag == 1){
		$queryUpdate = "UPDATE patientregister SET hasrecord='$flag' WHERE id='$patientId'";
		$query = mysqli_query($db_connect, $queryUpdate);	
	}
}

function countRecordEntry($table, $patientId){
	global $db_connect;
	$countEntry = 0;
	$querySelect = "SELECT * FROM $table WHERE pid='$patientId'";
	$query = mysqli_query($db_connect, $querySelect);
	while($row=mysqli_fetch_assoc($query)){
		$countEntry++;
	}
	return $countEntry;
}

?>