<?php if(!isset($_GET['id']))
{
	header("Location: patientrecord.php");
	// exit();
}
?>

<?php

include("../inc/connect.php");


if(isset($_GET['id']))
$patientId = escape($_GET['id']);

if(isset($_POST['update']) && isset($_GET['entry'])){
  $date = escape($_POST['date']);
  $medicament = escape($_POST['medicament']);
  $freq = escape($_POST['freq']);
  $dayprofil = escape($_POST['dayprofil']);
  $description = escape($_POST['description']);
  $medicationplanId = escape($_GET['entry']);
  
  $queryUpdate = "UPDATE medikationplan set dateMedicationplan='$date', medicament='$medicament', ";
  $queryUpdate .= "freq='$freq', tagesprofil='$dayprofil', Description='$description' WHERE idMP='$medicationplanId' AND pid='$patientId'";
  $queryResult=mysqli_query($db_connect, $queryUpdate)or die (mysqli_error($db_connect));
  header("Location: patientrecordoverview.php?id=$patientId");
  	// exit();

}else if(isset($_POST['close'])){
	header("Location: patientrecordoverview.php?id=$patientId");
		// exit();
}
?>
<?php include_once("../Include/header.php"); ?>
<?php include_once("../Include/sidebar.php"); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit patient medication plan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">Medication plan</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Medication plan</h3>
      </div>
	  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php 

	$queryPInfo=mysqli_query($db_connect, "SELECT * FROM patientregister WHERE id = {$patientId}")or die (mysqli_error($db_connect));
	while($patient=mysqli_fetch_assoc($queryPInfo)){  

?>
<div class="box-header">
	<p>Name		: &nbsp;&nbsp;&nbsp;<?php echo $patient['name']; ?></p>
    <p>Birth	: &nbsp;&nbsp;&nbsp;<?php echo $patient['birthdate']; ?></p>
    <p>Gender	: &nbsp;&nbsp;&nbsp;<?php echo $patient['gender']; ?></p>

</div>
<div class="box-body">
	<div class="box box-success box-body">
	  <div class="modal-body">
<?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="medicationplan" && !isset($_GET['entry'])){ ?>
	   <!-- Section medication plan to edit -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="medicationplan">
          <!-- small box -->
			<form>	  
		  <!-- Medication plan -->
				<fieldset>
					<legend>Medication plan</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">date</th>
						  <th scope="col">medicament</th>
						  <th scope="col">freq</th>
						  <th scope="col">day profil</th>
						  <th scope="col">description</th>
						  <th scope="col">Edit</th>
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
						  <td class="rows"><a name="edit" href="edit_medicationplan.php?id=<?php echo $patientId; ?>&recordtyp=medicationplan&entry=<?php echo $row['idMP']; ?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit </span></a></td>
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
				<div class="record-tab text-center" id="btn-ctrl-medication-plan" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<!--<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>-->
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } else { 
		$medicationplan='';
		$edit="";
		if(isset($_GET['entry'])){
		   $medicationplan=escape($_GET['entry']);
			$query = "SELECT * FROM medikationplan WHERE idMP = {$medicationplan}";
			$queryResult=mysqli_query($db_connect, $query)or die (mysqli_error($db_connect));
			while($row=mysqli_fetch_assoc($queryResult)){ 
				$edit = $row;
			}
		}
	  
	  ?>	
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="date">Date</label>
				  <input type="date" name="date" class="form-control" id="date" placeholder="" value="<?php if($edit != "") echo $edit['dateMedicationplan']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="medicament">Medicament</label>
				  <input type="text" name="medicament" class="form-control" id="medicament" placeholder="" value="<?php if($edit != "") echo $edit['medicament']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="freq">Freq</label>
				  <input type="text" name="freq" class="form-control" id="freq" placeholder="" value="<?php if($edit != "") echo $edit['freq']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="dayprofil">Day Profil</label>
				  <input type="text" name="dayprofil" class="form-control" id="dayprofil" placeholder="" value="<?php if($edit != "") echo $edit['tagesprofil']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="description">Description</label>
				  <input type="text" name="description" class="form-control" id="description" placeholder="" value="<?php if($edit != "") echo $edit['Description']; ?>" required>
			   </div>

				<div class="box-footer">
				  <button type="submit" name="update" class="btn btn-primary submit-doc">Update</button>
				</div>
			  <div class="modal-footer">
				<!--<button type="button" name="close" class="btn btn-default">Close</button>-->
				<a type="button" name="close" class="btn btn-default" href="patientrecordoverview.php?id=<?php echo $patientId; ?>">Close</a>
			  </div>
			</form>
	  <?php } ?>
		  </div>
</div>
        
        </div>
	  </div>       
      </div>
    </section>
  </div>
 <?php include_once("../Include/footer.php");?>