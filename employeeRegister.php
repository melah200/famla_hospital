	<?php include "includes/header.php" ?>
	<?php

		//before the user make any action the session is checked first and if no session has been created then redirect to home page
		if(!isset($_SESSION['username'])){
			//The session is not created. redirect to home
			redirect('./index');
		}
	?>

<?php 
	if(isset($_POST['submit']))
	{
		//process
		if($_POST['submit'] === "Save")
		{
			//die("Save");
			//register the patient in the database
			//die("");
			$fname = escape($_POST['firstname']);
			$lname = escape($_POST['lastname']);
			$birth = escape($_POST['birthday']);
			//print_r($_POST);
			//echo "next line die()";
			//die($_POST['user_function']);

			$username = escape($_POST['username']);
			$user_access = 'employee';
			$status = "active";
			$user_function = escape($_POST['user_function']);
			$password = escape($_POST['password']);
		
			//encryp the given password
			$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

			//read the existing employee entry to check if a employee is already registered
			
			$check = checkEntryInDB("employees", "firstname, lastname, birthday", "firstname='$fname' and lastname='$lname' and birthday='$birth'");
			if($check)
			{
				//patient exist in database
				$employeeAlreadyExist = true;
			}
			elseif(($fname == "") || ($lname == "") || ($birth == "")){
				$PatientData = "You must enter the firstname, lastname and birthday";
			}
			else{
				// Patient is not exist in database
				$employeeAlreadyExist = false;
				$date = date("d-m-Y");
				$time = date("H:i:s");
				$table = "employees";
				$id_count = 0;
				$employeid = random_int(10000, 99999);
				while (checkEntryInDB($table, "employee_id", "employee_id='$employeid'")) {
					$employeid = random_int(10000, 99999);
					$id_count++;
					if($id_count >= 90000) break;
				}
				
				$key = "firstname, lastname, birthday, username, password, employee_id, status, user_access, user_function, registrationDate, registrationTime";
				$value = "$fname,$lname,$birth,$username,$password,$employeid,$status,$user_access,$user_function,$date,$time";
				
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
										<b>The Employee registration was successful!</b>
									
									</div>
							<?php
									}
								}
								else if(isset($employeeAlreadyExist) && $employeeAlreadyExist)
								{
							?>
									<div style="color:red; margin: 10px 10px 0 10px;font-size:bold;text-align:center">
										<b>The employee exist already!</b>
									
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
								<b>Employee Registration</b>        
							</h4>

							<form action="" method="post">
								<div class="form-group">
									<label for="firstname">Firstname*</label>
									<input type="text" class="form-control" name="firstname" value="<?php if(isset($fname)) echo $fname; ?>">
								</div>
								<div class="form-group">
									<label for="lastname">Lastname*</label>
									<input type="text" class="form-control" name="lastname" value="<?php if(isset($lname)) echo $lname; ?>" />
								</div>								
								<div class="form-group">
									<label for="birthday">Birthday*</label>
									<input type="date" class="form-control" name="birthday" value="<?php if(isset($birth)) echo $birth; ?>">
								</div>
								<div class="form-group">
									<label for="username">Username*</label>
									<input type="text" class="form-control" name="username" value="<?php if(isset($username)) echo $username; ?>">
								</div>	
								<div class="form-group">
									<label for="password">Password*</label>
									<input type="password" class="form-control" name="password" id="txtPassportNumber" disabled="disabled">
									<input type="checkbox" name="boxpass" value="check" id="chkPassport" checked> Check to allow automatic password
								</div>	
								<div class="form-group">
									<label for="user_function">Occupation / Job</label>

									<select class="form-select form-control" aria-label="Default select example" name="user_function">
									  <option selected>Choose a Job Title</option>

									<?php
										$jobname = readAllDbTable('jobstitle');
										$count = 0;
										while ($row = mysqli_fetch_assoc($jobname)) {
											# code...
											$count++;
									?>	
									  <option value="<?php echo $row['jobs']; ?>"><?php echo $row['jobs']; ?></option>
									<?php } ?>
									</select>

									<!--<input type="text" class="form-control" name="user_function" value="<?php //if(isset($user_function)) echo $user_function; ?>">-->
								</div>
								<div class="form-group">
									<label for="phone">Phone*</label>
									<input type="tel" class="form-control" name="phone"  pattern="[0-9+].{1,}" title="invalid number" value="<?php if(isset($phone)) echo $phone; ?>">
								</div>	
								<div class="form-group">
									<label for="email">Email(Optional)</label>
									<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if(isset($email)) echo $email; ?>">
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
