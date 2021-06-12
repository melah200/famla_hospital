<?php
if(isset($_GET['delete'])){
	print_r($_GET);
	die('delete is pressed');
}
//chec if the page is loaded with the id
if(!isset($_GET['id']))
{
	header("Location: patientrecord.php");
}
?>

<?php 
include("../inc/connect.php");
include("function_record.php");

$patientId = escape($_GET['id']);
?>
<?php

// include("../inc/connect.php");


if(isset($_GET['id']))
$patientId = escape($_GET['id']);

if(isset($_GET['recordtyp'])){
  $table = escape($_GET['recordtyp']);
   
  if(isset($_GET['all'])){
	deleteAllEntryOfOneRecord($table, $patientId);
  }else if(isset($_GET['entry'])){
	  $entry = escape($_GET['entry']);
	  deleteOneRecordEntry($table, $patientId, $entry);  
  }

  // $queryDel = "DELETE FROM $table WHERE pid = {$patientId}";

  // $queryAddResult=mysqli_query($db_connect, $queryDel)or die (mysqli_error($db_connect));

}
function deleteAllRecord($table, $pId){
	Global $db_connect;
	$queryDelAll = "DELETE FROM $table WHERE pid = {$pId}";
	$queryDelResult=mysqli_query($db_connect, $queryDelAll)or die (mysqli_error($db_connect));
}

  // header("Location: patientrecordoverview.php?id=$patientId");
?>
<?php include_once("../Include/header.php");?>
<?php include_once("../Include/sidebar.php");?>
<?php
//session_start();
if(isset($_POST['submit']))
{ 
  $d1=date('Y-m-d');
$patient=$_POST['patient'];

$title=$_POST['title'];

$target_dir="../Upload/File/";
$name=$_FILES["file"]["name"];
$type = $_FILES["file"]["type"];
$size = $_FILES["file"]["size"];

$temp = $_FILES["file"]["tmp_name"]; 
$error = $_FILES["file"]["error"];//size
if($error>0)
{
// die("Error uploading file! Code $error.");
}
else
{ 
if ($type=="images/" || $size > 5000000)
{
  // die("that format is not allowed or file size is too big!");
}
else
{ //echo "string"; exit;
 move_uploaded_file($temp,"../Upload/File/".$name);//move upload file  
 // echo"Upload Complete";  
}
}
//print_r($_FILES); exit();

  $write =mysqli_query($db_connect, "INSERT INTO addfiles( `doc_date`,`patient`,`title`,`file`) VALUES (' $d1','$patient','$title','$name')") or die(mysqli_error($db_connect));
  //$query=mysqli_query($db_connect, "SELECT * FROM user ")or die (mysqli_error($db_connect));
  //$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
 // echo " <script>alert('Records Successfully Inserted..');</script>";
}


?>

<div class="content-wrapper">
  <section class="content-header">
  <h1>
  Patient Records
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Patient</li>
    <li class="active"> Records</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<!-- Comment -->

<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">Patient Records &nbsp;&nbsp;</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php 

	$queryPInfo=mysqli_query($db_connect, "SELECT * FROM patientregister WHERE id = {$patientId}")or die (mysqli_error($db_connect));
	while($patient=mysqli_fetch_assoc($queryPInfo)){  

?>
<div class="box-header">
	<p>Name		: &nbsp;&nbsp;&nbsp;<?php echo $patient['name']; ?></p>
    <p>Birth	: &nbsp;&nbsp;&nbsp;<?php echo $patient['birthdate']; ?></p>
    <p>Gender	: &nbsp;&nbsp;&nbsp;<?php echo $patient['gender']; ?></p>

</div>
	<?php } ?>
<div class="box box-success box-body">
		  <!--<input type="text" id="myInput" class="form-control search-in-list" placeholder="Search...">-->
	
</div>

<script>
	function show(id, btn, linkId){
		
		var tab = document.getElementsByClassName("record-tab");
		var li = document.getElementsByClassName("record");
		// var tmpId;
		for(var i=0; i<tab.length; i++){
			if(tab[i].id == id || tab[i].id == btn){
				tab[i].style.display = "block";
				tab[i].style.width = "100%";
				
			}else{
				tab[i].style.display = "none";
			}
		}
		for(var n=0; n<li.length; n++){
			if(li[n].id == linkId){
				// backcolor for the link clicked
				// li[n].style.backgroundColor = 'red';
			}else{
				// li[n].style.backgroundColor = 'none';
			}
		}
	}

</script>
 
 <!--<div class="content-wrapper">-->
    <section class="content">
      <div class="row">
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="diagnostic"){ ?>
	   <!-- Section diagnostic to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="diagnostics">
          <!-- small box -->
			<form>	  
		  <!-- Diagnostics -->
				<fieldset>
					<legend>Diagnostics</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">Date</th>
						  <th scope="col">typ</th>
						  <th scope="col">text</th>
						  <th scope="col">codessys</th>
						  <th scope="col">code</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM diagnostic WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateDiagnoctic']; ?></td>
						  <td><?php echo $row['typ']; ?></td>
						  <td><?php echo $row['text']; ?></td>
						  <td><?php echo $row['codessys']; ?></td>
						  <td><?php echo $row['code']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=diagnostic&entry=<?php echo $row['idD']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-diagnostics" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=diagnostic&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./diagnostic -->
	  <?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="finding"){ ?>
	   <!-- Section finding to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="findings">
          <!-- small box -->
			<form>	  
		  <!-- Findings -->
				<fieldset>
					<legend>Findings</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">finding</th>
						  <th scope="col">description</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM befunde WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateBefunde']; ?></td>
						  <td><?php echo $row['befunde']; ?></td>
						  <td><?php echo $row['description']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&entry=<?php echo $row['idB']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-findings" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./finding -->
	  <?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="examination"){ ?>
	   <!-- Section examination to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="examinations">
          <!-- small box -->
			<form>	  
		  <!-- Examinations -->
				<fieldset>
					<legend>Examinations</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">examinations</th>
						  <th scope="col">result</th>
						  <th scope="col">description</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM examination WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateUntersuchung']; ?></td>
						  <td><?php echo $row['untersuchung']; ?></td>
						  <td><?php echo $row['untersuchung_ergebnisse']; ?></td>
						  <td><?php echo $row['notizen']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=examination&entry=<?php echo $row['idE']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-examinations" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=examination&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./examination -->
	  <?php } ?>	  
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="vaccination"){ ?>
	   <!-- Section vaccination to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="vaccinations">
          <!-- small box -->
			<form>	  
		  <!-- Vaccinations -->
				<fieldset>
					<legend>Vaccinations</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">name of vaccine</th>
						  <th scope="col">desease</th>
						  <th scope="col">dosis</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM impfung WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateImpfung']; ?></td>
						  <td><?php echo $row['nameImpfung']; ?></td>
						  <td><?php echo $row['krankheit']; ?></td>
						  <td><?php echo $row['dosis']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=vaccination&entry=<?php echo $row['idI']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-vaccinations" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=vaccination&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./vaccination -->
	  <?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="activity"){ ?>
	   <!-- Section Activities to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="activities">
          <!-- small box -->
			<form>	  
		  <!-- Activities -->
				<fieldset>
					<legend>Activities</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">Activities</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM activity WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateMassnahme']; ?></td>
						  <td><?php echo $row['massnahme']; ?></td>	
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=activity&entry=<?php echo $row['idA']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-activities" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=activity&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="medicationplan"){ ?>
	   <!-- Section Medication Plan to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="medicationplan">
          <!-- small box -->
			<form>	  
		  <!-- Medication Plan -->
				<fieldset>
					<legend>Medication Plan</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">medicament</th>
						  <th scope="col">freq</th>
						  <th scope="col">day profil</th>
						  <th scope="col">description</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM medikationplan WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateMedicationplan']; ?></td>
						  <td><?php echo $row['medicament']; ?></td>
						  <td><?php echo $row['freq']; ?></td>
						  <td><?php echo $row['tagesprofil']; ?></td>
						  <td><?php echo $row['Description']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=medicationplan&entry=<?php echo $row['idMP']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-medicationplan" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=medicationplan&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./Medication plan -->
	  <?php } ?>	  
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="emergencydata"){ ?>
	   <!-- Section Emergency Data to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="emergency-data">
          <!-- small box -->
			<form>	  
		  <!-- Emergency Data -->
				<fieldset>
					<legend>Emergency Data</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">specification</th>
						  <th scope="col">expression</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM notfalldaten WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $EmergencyData['Angabe']; ?></td>
						  <td><?php echo $EmergencyData['auspraegung']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=emergencydata&entry=<?php echo $row['idN']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-emergency-data" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=emergencydata&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./Emergency Data -->
	  <?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="history"){ ?>
	   <!-- Section Historty to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="histories">
          <!-- small box -->
			<form>	  
		  <!-- Historty -->
				<fieldset>
					<legend>Historty</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">Period</th>
						  <th scope="col">Station/Room</th>
						  <th scope="col">Descriptions</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM history WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['zeitraume']; ?></td>
						  <td><?php echo $row['Station_Raum']; ?></td>
						  <td><?php echo $row['description']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=history&entry=<?php echo $row['idH']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-histories" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=history&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./Historty -->
	  <?php } ?>    
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="document"){ ?>
	   <!-- Section Documents to delete -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="documents">
          <!-- small box -->
			<form>	  
		  <!-- Documents -->
				<fieldset>
					<legend>Documents</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">title</th>
						  <th scope="col">description</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php   					  
						$query=mysqli_query($db_connect, "SELECT * FROM document WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
						//echo $numrows; exit;
						while($row=mysqli_fetch_assoc($query)){
					  ?>
						<tr>
						  <!--<th scope="row">1</th>-->
						  <td><?php echo $row['dateDokument']; ?></td>
						  <td><?php echo $row['title']; ?></td>
						  <td><?php echo $row['Description']; ?></td>
						  <td class="rows"><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=document&entry=<?php echo $row['idDo']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
						<!--  <td class="rows"><input type="checkbox" class="form-check-input check" name="entry2delete[]"/></td>
						-->
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</fieldset>
				<br>
				<div class="record-tab text-center" id="btn-ctrl-documents" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=document&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./Documents -->
	  <?php } ?>
      </div>      
	  
	  <div class="row">
	  
	  </div>
	  <!-- /.row -->
      <!-- Main row -->
    </section>
    <!-- /.content -->

<!--  </div> -->
 
 
 
 
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>
