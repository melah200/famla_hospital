<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
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
<div class="box-header">
	<p>Name		: Tsannang Armel</p>
    <p>Birth	: 12.04.2000</p>
    <p>Gender	: Male</p>

</div>
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
	  <li class="text-center record" style="border:1px solid #0b00ff30"><a href="patientrecordoverview.php?overview">Overview<p><i class="fa fa-list"></i></p></a></li>
	  <li class="text-center record"><a value="D" href="#">Diagnostics<p><i class="fa fa-user-md"></i></p></a></li>
	  <li class="text-center record"><a value="C" href="#">Clinical evidence<p><i class="fa fa-heartbeat"></i></p></a></li>
	  <li class="text-center record"><a value="E" href="#">Examination<p><i class="fa fa-stethoscope"></i></p></a></li>

	</ul>
</div>
 
 
 <!--<div class="content-wrapper">-->
    <section class="content">
      <div class="row">
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
	<fieldset>
		<legend>Diagnostics</legend>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">First</th>
			  <th scope="col">Last</th>
			  <th scope="col">Handle</th>
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
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
	<fieldset>
		<legend>Clinical evidence</legend>
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">First</th>
				  <th scope="col">Last</th>
				  <th scope="col">Handle</th>
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
		</div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
	<fieldset>
		<legend>Examination</legend>
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">First</th>
				  <th scope="col">Last</th>
				  <th scope="col">Handle</th>
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
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
 <fieldset>
  <legend>Personal</legend>
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday"><br><br>
 </fieldset>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
 <fieldset>
  <legend>History</legend>
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday"><br><br>
 </fieldset>
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
