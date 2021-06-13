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
  $vaccination = escape($_POST['vaccination']);
  $disease = escape($_POST['disease']);
  $dosis = escape($_POST['dosis']);
  $vaccinationId = escape($_GET['entry']);
  
  $queryUpdate = "UPDATE impfung set dateImpfung='$date', nameImpfung='$vaccination', ";
  $queryUpdate .= "krankheit='$disease', dosis='$dosis' WHERE idI='$vaccinationId' AND pid='$patientId'";
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
        Edit patient vaccination
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">Vaccinations</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Vaccinations</h3>
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
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="vaccination" && !isset($_GET['entry'])){ ?>
	   <!-- Section Vaccinations to edit -->
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
						  <th scope="col">disease</th>
						  <th scope="col">dosis</th>
						  <th scope="col">Edit</th>
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
						  <td class="rows"><a name="edit" href="edit_vaccination.php?id=<?php echo $patientId; ?>&recordtyp=vaccination&entry=<?php echo $row['idI']; ?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit </span></a></td>
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
					<!--<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>-->
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } else { 
		$vaccination='';
		$edit="";
		if(isset($_GET['entry'])){
		   $vaccination=escape($_GET['entry']);
			$query = "SELECT * FROM impfung WHERE idI = {$vaccination}";
			$queryResult=mysqli_query($db_connect, $query)or die (mysqli_error($db_connect));
			while($row=mysqli_fetch_assoc($queryResult)){ 
				$edit = $row;
			}
		}
	  
	  ?>	
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="date">Date</label>
				  <input type="date" name="date" class="form-control" id="date" placeholder="" value="<?php if($edit != "") echo $edit['dateImpfung']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="vaccination">Name of vaccine</label>
				  <input type="text" name="vaccination" class="form-control" id="vaccination" placeholder="" value="<?php if($edit != "") echo $edit['nameImpfung']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="disease">Disease</label>
				  <input type="text" name="disease" class="form-control" id="disease" placeholder="" value="<?php if($edit != "") echo $edit['krankheit']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="dosis">Dosis</label>
				  <input type="text" name="dosis" class="form-control" id="dosis" placeholder="" value="<?php if($edit != "") echo $edit['dosis']; ?>" required>
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