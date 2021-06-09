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

if(isset($_POST['submit'])){
  $date = escape($_POST['date']);
  $title = escape($_POST['title']);
  $description = escape($_POST['description']);
  
  $queryAdd = "INSERT INTO document(pid, dateDokument, title, Description) ";
  $queryAdd.= "Values('$patientId', '$date', '$title', '$description') ";
  $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
  upload_documents();
  header("Location: patientrecordoverview.php?id=$patientId");
  	// exit();

}else if(isset($_POST['close'])){
	header("Location: patientrecordoverview.php?id=$patientId");
		// exit();
}
?>
<?php include_once("../Include/header.php"); ?>
<?php include_once("../Include/sidebar.php"); ?>

<?php
//session_start();
function upload_documents()
{ 
	$time=time();

	$target_dir="./upload_documents/";
	$name=$_FILES["uploaddoc"]["name"];
	$type = $_FILES["uploaddoc"]["type"];
	$size = $_FILES["uploaddoc"]["size"];

	$temp = $_FILES["uploaddoc"]["tmp_name"]; 
	$error = $_FILES["uploaddoc"]["error"];//size
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
		 move_uploaded_file($temp,$target_dir.$time.'_'.$name);//move upload file  
		 // echo"Upload Complete";  
		}
	}
	//print_r($_FILES); exit();

	  // $write =mysqli_query($db_connect, "INSERT INTO addfiles( `doc_date`,`patient`,`title`,`file`) VALUES (' $d1','$patient','$title','$name')") or die(mysqli_error($db_connect));

}


?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add new patient document
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient record</li>
        <li class="active">Document</li>
      </ol>
    </section>

    <section class="content">
	<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Document</h3>
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
	
<div class="box-body">
	<div class="box box-success box-body">
	  <div class="modal-body">
			<form method="POST" enctype="multipart/form-data">

			   <div class="form-group">
				   <label for="dateIn">Date</label>
				  <input type="date" name="date" class="form-control" id="dateIn" placeholder="" required>
			   </div>
			   <div class="form-group">
				   <label for="typ">Title</label>
				  <input type="Varchar" name="title" class="form-control" id="typ" placeholder="" required>
			   </div>
			   <div class="form-group">
				   <label for="text">Descriptiont</label>
				  <input type="text" name="description" class="form-control" id="text" placeholder="" required>
			   </div>
			  <td><b>Upload Documents</b></font>
			  <input type="file" name="uploaddoc" id="fileToUpload" required=""></td><br>			   

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