<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

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

        <form action="addappointment_notification.php" method="post" role="form">
           <div class="form-group">
			   <span style="">Is the patient new?</span><b></b><br>
			   <input type ="radio" class="input-form isnew" name="new_patient" value="1" checked><b> Yes</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <input type ="radio" class="input-form isnew" name="new_patient" value="0"><b> No</b>		   
		   </div>
<div class="new">
   <div class="form-group">
	 <label for="fname">Name <span style="color:red">*</span></label>
	 <input type="text" name="fname" class="form-control new-patient" id="fname" placeholder="Full Name" required>
   </div>

  <div class="form-group" >
	<label for="phone">Phone <span style="color:red">*</span></label>
    <input type ="text" name="phone" required="" class="form-control new-patient" id="phone" required>
  </div>

   <div class="form-group" >
	   <label for="email">Email <span style="color:red">*</span></label>
	   <input type ="email" name="email" required="" class="form-control new-patient" id="email" required>
   </div>
</div>

	   <div class="form-group old" style="display:none">
		 <label for="fullname">Name <span style="color:red">*</span></label>
		 <input type="text" name="fullname" class="form-control patient-exist" id="fullname" placeholder="Full Name" list="datalist">
		 <datalist id="datalist">
			<?php
				$sel="SELECT * FROM patientregister";
				$query=mysqli_query($db_connect, $sel)or die (mysqli_error($db_connect));
				//$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
				$result = array();

				while($row1=mysqli_fetch_assoc($query))
				{
					$entry['name'] = $row1['name'];
					$entry['birthdate'] = $row1['birthdate'];
					// array_push($result, array_map('utf8_encode', $entry));
			?>
			<option value="<?php echo $row1['id'].', '.$entry['name']; ?>"> <?php echo $entry['birthdate']; ?> </option>
			
			<?php
				}					
			?>
		 
		 </datalist>
	   </div>
          <div class="form-group">
               <label for="date">Date <span style="color:red">*</span></label>
			   
              <input type="Date" name="date" min="<?php echo Date('Y-m-d'); ?>" class="form-control" id="date" placeholder="" required>
           </div>
           <div class="form-group">
               <label for="time-app">Time (each 30min. from 7:30 to 17:30)<span style="color:red">*</span></label>
              <input type="time" name="time" min="07:30" max="17:30" step="1800" class="form-control" id="time-app" placeholder="" required>
           </div>
           <div class="form-group">
               <label for="remark">Remark</label>
              <input type="text" name="remark" class="form-control" id="remark" placeholder="">
           </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            
			 </div>
<!--
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
-->
          </form>


</div>
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>
<script>
  // $(document).ready(function(){
	 $('.isnew').on('focus', function(){ 
		// alert('Radio Button has been clicked'); 
		// $('.modal').css('display', 'none');
		// $('.modal').hide(1000);
		// $('.modal').fadeToggle();
		// alert($(this).val());
		if($(this).val() === "1"){
			var arr = document.getElementsByClassName("patient-exist");
			for(var index = 0; index < arr.length; index++){
				arr[index].removeAttribute('required');  
			}			
			$('.new').css('display', 'block');
			$('.old').css('display', 'none');
			// $('#register_patient').css('display', 'none');
			
			var arr1 = document.getElementsByClassName("new-patient");
			for(var index = 0; index < arr1.length; index++){
				arr1[index].required = true;  
			}
		}
		else
		{
			var arr = document.getElementsByClassName("new-patient");
			for(var index = 0; index < arr.length; index++){
				arr[index].removeAttribute('required');  
			}
			$('.new').css('display', 'none');
			$('.old').css('display', 'block');
			$('#patient').on('click',function(){
				// alert("we are focusing select");
				// $('#register_patient').css('display', 'block');
			});
			var arr1 = document.getElementsByClassName("patient-exist");
			for(var index = 0; index < arr1.length; index++){
				arr1[index].required = true;  
			}
		}
		
	 });
	 
  // });
  
</script>
