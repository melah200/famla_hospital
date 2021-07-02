
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

if(isset($_POST['submit'])){
	
	if($_POST['new_patient'] == 1){
		// echo "new patient";
		$email = escape($_POST['email']);
		$phone = escape($_POST['phone']);
		$name = escape($_POST['fullname']);
	}
	else{
		// echo "patient exit";
		$email = NULL;
		$phone = NULL;
		$patientId = 0;
		$patientId = trim(explode(',', escape($_POST['fullname']))[0]);
		$name = trim(explode(',', escape($_POST['fullname']))[1]);
	}
	

	$date = escape($_POST['date']);
	$starttime = escape($_POST['time']);
	$endtime = date( "H:i", strtotime( $starttime.' +30 min' ) );

	$doctor = "Doctor name";  //escape($_POST['doctor']);
	$remark = escape($_POST['remark']);

 if($_POST['new_patient'] == 1){ 
    $queryAdd = "INSERT INTO addappointment(name, phone, email, doctor, app_date, starttime, endtime, remark) ";
    $queryAdd.= "Values('$name', '$phone', '$email', '$doctor', '$date', '$starttime', '$endtime', '$remark') ";
    $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));
 }else{
    $queryAdd = "INSERT INTO addappointment(patient, name, doctor, app_date, starttime, endtime, remark) ";
    $queryAdd.= "Values('$patientId', '$name', '$doctor', '$date', '$starttime', '$endtime', '$remark') ";
    $queryAddResult=mysqli_query($db_connect, $queryAdd)or die (mysqli_error($db_connect));	 
 }
}

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Appointment</li>
      </ol>
    </section>
    <section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">  Add New Appointment</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
-->
 <div class="box-body">
	<?php if($queryAddResult){ ?>
	
	<h4 class="text-center" style="color:green; font-size:20px"><b> The Appointment is added successfully !</b></h4>
	
	
	<?php }?>

</div>
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>
