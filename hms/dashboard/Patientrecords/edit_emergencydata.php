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
  // $date = escape($_POST['date']);
  $specification = escape($_POST['specification']);
  $expression = escape($_POST['expression']);
  $emergencyId = escape($_GET['entry']);
  
  $queryUpdate = "UPDATE notfalldaten set Angabe='$specification', auspraegung='$expression' ";
  $queryUpdate .= "WHERE idN='$emergencyId' AND pid='$patientId'";
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
        Edit patient emergency data
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">Emergency data</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Emergency Data</h3>
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
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="emergencydata" && !isset($_GET['entry'])){ ?>
	   <!-- Section emergency data to edit -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="emergencydata">
          <!-- small box -->
			<form>	  
		  <!-- Emergency Data -->
				<fieldset>
					<legend>Emergency Data</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">Specificatons</th>
						  <th scope="col">Expression</th>
						  <th scope="col">Edit</th>
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
						  <td><?php echo $row['Angabe']; ?></td>
						  <td><?php echo $row['auspraegung']; ?></td>	
						  <td class="rows"><a name="edit" href="edit_emergencydata.php?id=<?php echo $patientId; ?>&recordtyp=emergencydata&entry=<?php echo $row['idN']; ?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit </span></a></td>
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
					<!--<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>-->
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } else { 
		$emergency='';
		$edit="";
		if(isset($_GET['entry'])){
		   $emergency=escape($_GET['entry']);
			$query = "SELECT * FROM notfalldaten WHERE idN = {$emergency}";
			$queryResult=mysqli_query($db_connect, $query)or die (mysqli_error($db_connect));
			while($row=mysqli_fetch_assoc($queryResult)){ 
				$edit = $row;
			}
		}
	  
	  ?>	
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="specification">Specificaton</label>
				  <input type="text" name="specification" class="form-control" id="specification" placeholder="" value="<?php if($edit != "") echo $edit['Angabe']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="expression">Expression</label>
				  <input type="text" name="expression" class="form-control" id="expression" placeholder="" value="<?php if($edit != "") echo $edit['auspraegung']; ?>" required>
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