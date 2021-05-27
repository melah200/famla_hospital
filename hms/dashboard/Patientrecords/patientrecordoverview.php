<?php 
//chec if the page is loaded with the id
if(!isset($_GET['id']))
{
	header("Location: patientrecord.php");
}
?>
<?php include_once("../Include/header.php");?>
<?php include_once("../Include/sidebar.php");?>
<?php 
include("../inc/connect.php") ;

$patientId = escape($_GET['id']);
?>
<?php

$query=mysqli_query($db_connect, "SELECT * FROM addfiles")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
$row1=mysql_fetch_all($query);
//echo $row1;

$p_query=mysqli_query($db_connect, "SELECT * FROM patientregister")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysql_fetch_all($p_query);


function mysql_fetch_all($query)

{
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
}
//print_r($row1); 
//print_r($p_row1);exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error($db_connect));
?>
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
<i class="fa fa-user"></i> <h3 class="box-title">Patient Records &nbsp;&nbsp;<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td></h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 50px;"><i class="fa fa-plus-square"></i> Add New</button><br>
-->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-blue" style="height: 60px">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Add Files</h4>
      </div>
  <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="exampleInputPassword1">Patient</label>
             <select name="patient" class="form-control" id="exampleInputPassword1" placeholder="">
 
<?php foreach ($p_row1 as $s) {?>
<option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
                <?php } ?>
              </select>
            </div>

           <div class="form-group">
               <label for="exampleInputPassword1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="" required>
           </div>

              <td><b>Image Upload</b></font>
              <input type="file" name="file" id="fileToUpload" required></td>

            <div class="box-footer">
              <button type="submit" onclick="myfunction()"  name="submit" class="btn btn-primary submit-doc">Submit</button>
             </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>
      </div>
    </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<!-- End Comment -->
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<!--
<td>
<a href="./exceldocument.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="csvdoc.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/doc_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
-->
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
   <!-- Split button -->
   <!--
<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Overview</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Diagnotics</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Right</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Right</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Right</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary">Right</button>
  </div>
</div>
	-->

	<ul class="nav nav-pills" style="font-size:16px">
	  <li class="text-center record " style="border:1px solid #0b00ff30"><a href="patientrecordoverview.php?id=<?php echo $patientId; ?>">Overview<p><i class="fa fa-list"></i></p></a></li>
	  <li class="text-center record nav-item" id="diag"><a class="nav-link" onclick="show('diagnostics', 'btn-ctrl-diagnostics', 'diag')" href="#">Diagnostics<p><i class="fa fa-user-md"></i></p></a></li>
	  <li class="text-center record nav-item" id="find"><a class="nav-link" onclick="show('findings', 'btn-ctrl-findings', 'find')" href="#">Findings<p><i class="fa fa-heartbeat"></i></p></a></li>
	  <li class="text-center record nav-item" id="exam"><a class="nav-link" onclick="show('examinations', 'btn-ctrl-examinations', 'exam')" href="#">Examinations<p><i class="fa fa-stethoscope"></i></p></a></li>
	  <li class="text-center record nav-item" id="vacc"><a class="nav-link" onclick="show('vaccinations', 'btn-ctrl-vaccinations', 'vacc')" href="#">Vaccinations<p><i class="fa fa-heart-o"></i></p></a></li>
	  <li class="text-center record nav-item" id="acti"><a class="nav-link" onclick="show('activities', 'btn-ctrl-activities', 'acti')" href="#">Activities<p><i class="fa fa-medkit"></i></p></a></li>
	  <li class="text-center record nav-item" id="medi"><a class="nav-link" onclick="show('medication-plan', 'btn-ctrl-medication-plan', 'medi')" href="#">Medication Plan<p><i class="fa fa-plus-square"></i></p></a></li>
	  <li class="text-center record nav-item" id="emer"><a class="nav-link" onclick="show('emergency-data', 'btn-ctrl-emergency-data', 'emer')" href="#">Emergency Data<p><i class="fa fa-ambulance"></i></p></a></li>
	  <li class="text-center record nav-item" id="hist"><a class="nav-link" onclick="show('histories', 'btn-ctrl-histories', 'hist')" href="#">Histories<p><i class="fa fa-hospital-o"></i></p></a></li>
	  <li class="text-center record nav-item" id="docx"><a class="nav-link" onclick="show('documents', 'btn-ctrl-documents', 'docx')" href="#">Documents<p><i class="fa fa-folder"></i></p></a></li>

	</ul>
	
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
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="diagnostics">
          <!-- small box -->
		  <!-- Diagnostics -->
	<fieldset>
		<legend>Diagnostics</legend>
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th scope="col">Date</th>
			  <th scope="col">typ</th>
			  <th scope="col">text</th>
			  <th scope="col">codessys</th>
			  <th scope="col">code</th>
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
			</tr>
		    <?php
				}
			?>
		  </tbody>
		</table>
	</fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-diagnostics" style="display:none">
			  <tr>
			    <td><a href="add_diagnostic.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a href="delete.php?id=<?php echo $patientId; ?>&recordtyp=diagnostic"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>
        </div>

        <!-- ./col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="findings">
          <!-- small box -->
		   <!-- Findings -->
	<fieldset>
		<legend>Findings</legend>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">date</th>
				  <th scope="col">finding</th>
				  <th scope="col">description</th>
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
				  <td><?php echo $row['dateBefunde']; ?></td>
				  <td><?php echo $row['befunde']; ?></td>
				  <td><?php echo $row['description']; ?></td>
				</tr>
					<?php } ?>
			  </tbody>
			</table>
    </fieldset>    
			<br>
			<div class="record-tab text-center" id="btn-ctrl-findings" style="display:none">
			  <tr>
			    <td><a href="add_finding.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>		
		</div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="examinations">
          <!-- small box -->
		   <!-- Examination -->
	<fieldset>
		<legend>Examinations</legend>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">date</th>
				  <th scope="col">examinations</th>
				  <th scope="col">result</th>
				  <th scope="col">description</th>				
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>Jacob</td>
				  <td>Thornton</td>
				  <td>@fat</td>
				</tr>
				<tr>
				  <th scope="row">3</th>
				  <td>Larry</td>
				  <td>the Bird</td>
				  <td>@twitter</td>
				</tr>
			  </tbody>
			</table>
	</fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-examinations" style="display:none">
			  <tr>
			    <td><a href="add_examination.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>	
		</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="vaccinations">
          <!-- small box -->
		  <!-- vaccinations -->
	<fieldset>
	  <legend>Vaccinations</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">date</th>
					  <th scope="col">name of vaccine</th>
					  <th scope="col">desease</th>
					  <th scope="col">dosis</th>		
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
					  <td><?php echo $row['dateImpfung']; ?></td>
					  <td><?php echo $row['nameImpfung']; ?></td>
					  <td><?php echo $row['krankheit']; ?></td>
					  <td><?php echo $row['dosis']; ?></td>
					</tr>
						<?php } ?>
				  </tbody>
				</table>
	</fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-vaccinations" style="display:none">
			  <tr>
			    <td><a href="add_vaccination.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>        
		</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="activities">
          <!-- small box -->
		  <!-- activities -->
	 <fieldset>
	  <legend>Activities</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">date</th>
					  <th scope="col">activities</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td>Mark</td>
					  <td>Otto</td>
					  
					</tr>
					<tr>
					  <th scope="row">2</th>
					  <td>Jacob</td>
					  <td>Thornton</td>
					  
					</tr>
					<tr>
					  <th scope="row">3</th>
					  <td>Larry</td>
					  <td>the Bird</td>
					  
					</tr>
				  </tbody>
				</table>
	 </fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-activities" style="display:none">
			  <tr>
			    <td><a href="add_activitie.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>        
		</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="medication-plan">
          <!-- small box -->
		  <!-- medication plan -->
	 <fieldset>
	  <legend>Medication Plan</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">date</th>
					  <th scope="col">medicament</th>
					  <th scope="col">freq</th>
					  <th scope="col">day profil</th>
					  <th scope="col">description</th>
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
					  <td><?php echo $row['dateMedicationplan']; ?></td>
					  <td><?php echo $row['medicament']; ?></td>
					  <td><?php echo $row['freq']; ?></td>
					  <td><?php echo $row['tagesprofil']; ?></td>
					  <td><?php echo $row['Description']; ?></td>
					</tr>
						<?php } ?>
				  </tbody>
				</table>
	 </fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-medication-plan" style="display:none">
			  <tr>
			    <td><a href="add_medication_plan.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="emergency-data">
          <!-- small box -->
		  <!-- emergency data -->
	 <fieldset>
	  <legend>Emergency Data</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">specification</th>
					  <th scope="col">expression</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php   
						$query=mysqli_query($db_connect, "SELECT * FROM notfalldaten WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						while($EmergencyData=mysqli_fetch_assoc($query)){
				  ?>				  
					<tr>
					  <td><?php echo $EmergencyData['Angabe']; ?></td>
					  <td><?php echo $EmergencyData['ausprägung']; ?></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
	 </fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-emergency-data" style="display:none">
			  <tr>
			    <td><a href="add_emergency.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>        
		</div>
        <!-- ./col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="histories">
          <!-- small box -->
		  <!-- Histories -->
	 <fieldset>
	  <legend>Histories</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">Period</th>
					  <th scope="col">Station/Room</th>
					  <th scope="col">Descriptions</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php   
						$query=mysqli_query($db_connect, "SELECT * FROM history WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						while($patientHistory=mysqli_fetch_assoc($query)){
				  ?>
					<tr>
					  <td><?php echo $patientHistory['zeitraume']; ?></td>
					  <td><?php echo $patientHistory['Station_Raum']; ?></td>
					  <td><?php echo $patientHistory['description']; ?></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
	 </fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-histories" style="display:none">
			  <tr>
			    <td><a href="add_history.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>        
		</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 record-tab" id="documents">
          <!-- small box -->
		  <!-- Documents -->
	 <fieldset>
	  <legend>Documents</legend>
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">date</th>
					  <th scope="col">title</th>
					  <th scope="col">description</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php   
						$query=mysqli_query($db_connect, "SELECT * FROM document WHERE pid = {$patientId}")or die (mysqli_error($db_connect));
						while($patientdoc=mysqli_fetch_assoc($query)){
				  ?>
					<tr>
					  <td><?php echo $patientdoc['dateDokument']; ?></td>
					  <td><?php echo $patientdoc['title']; ?></td>
					  <td><?php echo $patientdoc['Description']; ?></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
	 </fieldset>
			<br>
			<div class="record-tab text-center" id="btn-ctrl-documents" style="display:none">
			  <tr>
			    <td><a href="add_document.php?id=<?php echo $patientId; ?>"><span class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</span></a></td>
			    <td><a href="edit.php?id=<?php echo $patientId; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a></td>
			    <td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>        
		</div>
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
