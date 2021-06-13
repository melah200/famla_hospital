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
  $station_room = escape($_POST['station_room']);
  $description = escape($_POST['description']);
  $historyId = escape($_GET['entry']);
  
  $queryUpdate = "UPDATE history set zeitraume='$date', Station_Raum='$station_room', ";
  $queryUpdate .= "description='$description' WHERE idH='$historyId' AND pid='$patientId'";
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
        Edit patient history
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">History</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">History</h3>
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
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="history" && !isset($_GET['entry'])){ ?>
	   <!-- Section history to edit -->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="history">
          <!-- small box -->
			<form>	  
		  <!-- Medication plan -->
				<fieldset>
					<legend>Histories</legend>
					<table class="famla-search-entry table table-striped">
					  <thead>
						<tr>
						  <th scope="col">Preriod</th>
						  <th scope="col">Station/Room</th>
						  <th scope="col">Description</th>
						  <th scope="col">Edit</th>
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
						  <td class="rows"><a name="edit" href="edit_history.php?id=<?php echo $patientId; ?>&recordtyp=history&entry=<?php echo $row['idH']; ?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit </span></a></td>
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
				<div class="record-tab text-center" id="btn-ctrl-history" style="">
				  <tr>			  
					<td><a name="cancel" href="patientrecordoverview.php?id=<?php echo $patientId; ?>"><span class="btn btn-warning"><i class="fa fa-times"></i> Cancel</span></a></td>
					<!--<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=finding&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>-->
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } else { 
		$history='';
		$edit="";
		if(isset($_GET['entry'])){
		   $history=escape($_GET['entry']);
			$query = "SELECT * FROM history WHERE idH = {$history}";
			$queryResult=mysqli_query($db_connect, $query)or die (mysqli_error($db_connect));
			while($row=mysqli_fetch_assoc($queryResult)){ 
				$edit = $row;
			}
		}
	  
	  ?>	
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="date">Period</label>
				  <input type="date" name="date" class="form-control" id="date" placeholder="" value="<?php if($edit != "") echo $edit['zeitraume']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="station_room">Station/Room</label>
				  <input type="text" name="station_room" class="form-control" id="station_room" placeholder="" value="<?php if($edit != "") echo $edit['Station_Raum']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="description">Description</label>
				  <input type="text" name="description" class="form-control" id="description" placeholder="" value="<?php if($edit != "") echo $edit['description']; ?>" required>
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