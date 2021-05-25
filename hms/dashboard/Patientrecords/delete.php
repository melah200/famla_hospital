<?php 
//chec if the page is loaded with the id
if(!isset($_GET['id']))
{
	header("Location: patientrecord.php");
}
?>

<?php 
include("../inc/connect.php") ;

$patientId = escape($_GET['id']);
?>
<?php

include("../inc/connect.php");


if(isset($_GET['id']))
$patientId = escape($_GET['id']);

if(isset($_GET['recordtyp'])){
  $table = escape($_GET['recordtyp']);

  $queryDel = "DELETE FROM $table WHERE pid = {$patientId}";

  // $queryAddResult=mysqli_query($db_connect, $queryDel)or die (mysqli_error($db_connect));

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
<i class="fa fa-user"></i> <h3 class="box-title">Patient Records &nbsp;&nbsp;<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td></h3>
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
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 record-tab" id="diagnostics">
          <!-- small box -->
	<form method="POST">	  
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
			  <th scope="col"><input type="checkbox" class="form-check-input" id="all" /><label for="all">&nbsp;Select all</label></th>
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
			  <td class="rows"><input type="checkbox" class="form-check-input check" /></td>
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
			    <td><a name="delete" class="btn-del" href="delete.php?id=<?php echo $patientId; ?>&recordtyp=diagnostic"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
			  </tr>
			</div>
	</form>
        </div>
        <!-- ./col -->
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
