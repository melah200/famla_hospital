	<?php include "includes/header.php" ?>

<?php 
	if(isset($_POST['submit']))
	{
		//process
		if($_POST['submit'] === "Save")
		{
			//die("Save");
			//register the patient in the database
			//die("");
			$fname = html($_POST['fname']);
			$lname = html($_POST['lname']);
			if(isset($_POST['gender'])){
				$gender = html($_POST['gender']);
			}else{
				$gender = "";
			}
			$birth = html($_POST['birthday']);
			

			$email = html($_POST['email']);
			$phone = html($_POST['phone']);
			$address = html($_POST['address']);
			if(isset($_POST['blood'])){
				$bloodtype = html($_POST['blood']);
			}else{
				$bloodtype = "";	
			}
			if(isset($_POST['rhesus'])){
				$rhesus = html($_POST['rhesus']);
			}else{
				$rhesus = "";
			}
			//read the existing Patient entry to check if a patient is already registered
			
			$check = checkEntryInDB("patreg", "fname, lname, birthday", "fname='$fname' and lname='$lname' and Birthday='$birth'");
			if($check)
			{
				//patient exist in database
				$patientAlreadyExist = true;
			}
			elseif(($fname == "") || ($lname == "") || ($birth == "") || ($gender == "") ||($phone == "")){
				$PatientData = "You must enter the firstname, lastname, birthday, gender and phone number";
			}
			else{
				// Patient is not exist in database
				$patientAlreadyExist = false;
				$date = date("d-m-Y");
				$time = date("H:i:s");
				$table = "patreg";
				$id_count = 0;
				$patientid = random_int(10000, 99999);
				while (checkEntryInDB("patreg", "patient_id", "patient_id='$patientid'")) {
					$patientid = random_int(10000, 99999);
					$id_count++;
					if($id_count >= 90000) break;
				}
				
				$key = "fname, lname, gender, birthday, email, phone, address, bloodtype, rhesus, registrationDate, registrationTime, patient_id";
				$value = "$fname,$lname,$gender,$birth,$email,$phone,$address,$bloodtype,$rhesus,$date,$time,$patientid";
				
				$result = add2table($table, $key, $value);
				if($result){
					//echo "Data have been saved in database";
				}
			}
		}
		else if($_POST['submit'] === "Cancel")
		{
			//die("Cancel");
			//redirect to the home page
			header("Location:./");
		}
		
	}
?>

    <div id="wrapper">

        <!-- Navigation -->
		<?php include "includes/navigation.php" ?>
	
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="col-xs-1">
						</div>
						<div class="col-xs-10" style="background-color:#1000ff1f;border-radius:20px">
							<?php
								if(isset($result)){
									if($result){
										// The patient registration was 
							?>
									<div style="color:green; margin: 10px 10px 0 10px;font-size:bold;text-align:center">
										<b>The Patient registration was successful!</b>
									
									</div>
							<?php
									}
								}
								else if(isset($patientAlreadyExist) && $patientAlreadyExist)
								{
							?>
									<div style="color:red; margin: 10px 10px 0 10px;font-size:bold;text-align:center">
										<b>The Patient exist already!</b>
									
									</div>
								<?php }
								elseif (isset($PatientData)){
								?>
									<div style="color:red; margin: 10px 10px 0 10px;font-size:bold;text-align:center">
										<b><?php echo $PatientData; ?></b>
									
									</div>								
								<?php	
								}
								?>
									
							<h4 class="page-header text-center">
								<b>Patient Registration</b>        
							</h4>

							<form action="" method="post">
								<div class="form-group">
									<label for="lname">lastname*</label>
									<input type="text" class="form-control" name="lname" value="<?php if(isset($lname)) echo $lname; ?>" />
								</div>
								<div class="form-group">
									<label for="fname">firstnamename*</label>
									<input type="text" class="form-control" name="fname" value="<?php if(isset($fname)) echo $fname; ?>">
								</div>								
								<div class="form-group">
									<label for="gender">Gender*</label><br>
									<input type="radio" name="gender" value="Male" > Male <br>
									<input type="radio" name="gender" value="Female" /> Female
								</div>
								<div class="form-group">
									<label for="birthday">Birthday*</label>
									<input type="date" class="form-control" name="birthday" value="<?php if(isset($birth)) echo $birth; ?>">
								</div>								
								<div class="form-group">
									<label for="email">Email(Optional)</label>
									<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if(isset($email)) echo $email; ?>">
								</div>
								<div class="form-group">
									<label for="phone">Phone*</label>
									<input type="tel" class="form-control" name="phone"  pattern="[0-9+].{1,}" title="invalid number" value="<?php if(isset($phone)) echo $phone; ?>">
								</div>
								<div class="form-group">
									<label for="address">Address(Optional)</label>
									<input type="text" class="form-control" name="address" value="<?php if(isset($address)) echo $address; ?>">
								</div>
								<div class="form-group">
									<label for="blood">Blood Type</label><br>
									<input type="radio" name="blood" value="AB"> AB <br>
									<input type="radio" name="blood" value="A"> A <br>
									<input type="radio" name="blood" value="B"> B <br>
									<input type="radio" name="blood" value="O"> O
								</div>								
								<div class="form-group">
									<label for="rhesus">Rhesus</label><br>
									<input type="radio" name="rhesus" value="+"> + <br>
									<input type="radio" name="rhesus" value="-"> -
								</div>
								<div class="form-group" style="margin-top:30px;text-align:center">
									
									<input type="submit" class="btn btn-primary" name="submit" value="Save" style="margin-right:10px">
									<input type="submit" class="btn btn-danger" name="submit" value="Cancel" >
								</div>
								
							</form>
						</div>
                    </div>
                </div>
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	<?php include "includes/footer.php" ?>
