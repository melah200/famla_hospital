<?php if(!isset($_GET['id']))
{
	header("Location: patientrecord.php");
}
?>

<?php

include("../inc/connect.php");

$patientId = escape($_GET['id']);

if(isset($_POST['submit'])){
  $period = escape($_POST['period']);
  $pName = escape($_POST['pName']);
  $station_room = escape($_POST['station_room']);
  $description = escape($_POST['description']);

  $queryAdd = "INSERT INTO history(pid, zeitraume, Station_Raum, description) ";
  $queryAdd.= "Values('$patientId', '$period', '$station_room', '$description') ";
  $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
  header("Location: patientrecordoverview.php?id=$patientId");

}else if(isset($_POST['close'])){
	header("Location: patientrecordoverview.php?id=$patientId");
}

?>
<?php include_once("../Include/header.php"); ?>
<?php include_once("../Include/sidebar.php"); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add new patient history
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
	  
<?php 

	$queryPInfo=mysqli_query($db_connect, "SELECT * FROM patientregister WHERE id = {$patientId}")or die (mysqli_error($db_connect));
	$patientName = '';
	while($patient=mysqli_fetch_assoc($queryPInfo)){  
	$patientName = $patient['name'];
?>
<div class="box-header">
	<p>Name		: &nbsp;&nbsp;&nbsp;<?php echo $patient['name']; ?></p>
    <p>Birth	: &nbsp;&nbsp;&nbsp;<?php echo $patient['birthdate']; ?></p>
    <p>Gender	: &nbsp;&nbsp;&nbsp;<?php echo $patient['gender']; ?></p>

</div>
<?php } ?>
	
<div class="box-body">
	<div class="box box-success box-body">
	  <div class="modal-body">
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="period">Period</label>
				  <input type="date" name="period" class="form-control" id="period" placeholder="" required>
			   </div>
			   <div class="form-group">
				   <label for="pName">Patient Name</label>
				  <input type="text" name="pName" class="form-control" id="pName" placeholder="" value="<?php echo $patientName; ?>" readonly>
			   </div>
			   <div class="form-group">
				   <label for="station_room">Station/Room</label>
				  <input type="text" name="station_room" class="form-control" id="station_room" placeholder="" required>
			   </div>
			   <div class="form-group">
				   <label for="description">Description</label>
				  <input type="text" name="description" class="form-control" id="description" placeholder="" required>
			   </div>

				<div class="box-footer">
				  <button type="submit" name="submit" class="btn btn-primary submit-doc">Submit</button>
				</div>
			  <div class="modal-footer">
				<!--<button type="button" name="close" class="btn btn-default">Close</button>-->
				<a type="button" name="close" class="btn btn-default" href="patientrecordoverview.php?id=<?php echo $patientId; ?>">Close</a>
			  </div>
			  </form>
		  </div>
</div>
        
        </div>
      </div>       
      </div>
    </section>
  </div>
 <?php include_once("../Include/footer.php");?>