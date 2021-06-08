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

if(isset($_POST['submit']) && isset($_GET['entry'])){
  $date = escape($_POST['date']);
  $activityId = escape($_GET['entry']);
  
  $activitie = escape($_POST['activitie']);
  
  $queryUpdate = "UPDATE activity set dateMassnahme='$date', massnahme='$activitie' WHERE idA='$activityId' AND pid='$patientId'";
  
  $queryAddResult=mysqli_query($db_connect, $queryUpdate)or die (mysqli_error($db_connect));
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
        Patient Add new Activitie
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">Activitie</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Activitie</h3>
      </div>
	  
      <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Patient Register</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
             <!--    <div class="form-group">
                 <label for="exampleInputEmail1">Doctor</label>
                 <input type="name" class="form-control" name="doctor" placeholder="">
                </div> -->
                <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="" required="">
               </div>
               <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input type="Email" name="email" class="form-control" placeholder="" required="">
              </div>
             <!--   <div class="form-group">
              <label for="exampleInputFile">Password</label>
              <input type="Password" name="password" class="form-control" placeholder="">
              </div> -->
               <div class="form-group">
               <label for="exampleInputPassword1">Address</label>
              <input type="text" name="address"class="form-control" placeholder="" required="">
               </div>
               <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="" required="">
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Gender</label>
              <select name="gender" class="form-control" placeholder="" required="">
              <option value="" disabled selected="selected"> Select Category</option>
              <option value="Male">Male</option> <option value="Female">Female</option>
              <option value="Other">Other</option>
              </select>
            </div>
             <div class="form-group">
            <label for="exampleInputPassword1">Birthdate</label>
            <input type="date" name="birthdate" class="form-control" placeholder="" required="">
           </div>
           <div class="form-group">
            <label for="exampleInputPassword1">Bloodgroup</label>
          <select name="bloodgroup" class="form-control" id="c" placeholder="" required="">
            <option value="" disabled selected="selected"> Select Category</option>
            <option value="A+">A+</option> <option value="A-">A-</option>
            <option value="B+">B+</option><option value="B-">B-</option> <option value="AB+">AB+</option> <option value="AB-">AB-</option> <option value="O+">O+</option><option value="O-">O-</option>
          </select>
          </div>
          <td><b>Image Upload</b></font>
          <input type="file" name="imageupload" id="fileToUpload" required=""></td>
           <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
      </div>
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
<?php } ?>
	  <?php if(isset($_GET['recordtyp']) && $_GET['recordtyp']=="activity" && !isset($_GET['entry'])){ ?>
	   <!-- Section Activities to edit -->
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
						  <th scope="col">Edit</th>
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
						  <td class="rows"><a name="edit" href="edit.php?id=<?php echo $patientId; ?>&recordtyp=activity&entry=<?php echo $row['idA']; ?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit </span></a></td>
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
					<!--<td><a class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=activity&all=true"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All </span></a></td>-->
				  </tr>
				</div>
			</form>
        </div>
		<!-- ./activities -->
	  <?php } else { 
		$activity='';
		$editAct="";
		if(isset($_GET['entry'])){
		   $activity=escape($_GET['entry']);
			$queryAct = "SELECT * FROM activity WHERE idA = {$activity}";
			$queryActResult=mysqli_query($db_connect, $queryAct)or die (mysqli_error($db_connect));
			while($row=mysqli_fetch_assoc($queryActResult)){ 
				$editAct = $row;
			}
		}
	  
	  ?>	
<div class="box-body">
	<div class="box box-success box-body">
	  <div class="modal-body">
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="dateIn">Date</label>
				  <input type="date" name="date" class="form-control" id="date" placeholder="" value="<?php if($editAct != "") echo $editAct['dateMassnahme']; ?>" required>
			   </div>
			   <div class="form-group">
				   <label for="typ">Activitie</label>
				  <input type="text" name="activitie" class="form-control" id="activitie" placeholder="" value="<?php if($editAct != "") echo $editAct['massnahme']; ?>" required>
			   </div>
			   

				<div class="box-footer">
				  <button type="submit" name="submit" class="btn btn-primary submit-doc">Update</button>
				</div>
			  <div class="modal-footer">
				<!--<button type="button" name="close" class="btn btn-default">Close</button>-->
				<a type="button" name="close" class="btn btn-default" href="patientrecordoverview.php?id=<?php echo $patientId; ?>">Close</a>
			  </div>
			  </form>
		  </div>
</div>
        
        </div>
      <?php } ?>
	  </div>       
      </div>
    </section>
  </div>
 <?php include_once("../Include/footer.php");?>