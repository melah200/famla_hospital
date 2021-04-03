	<?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
		<?php include "includes/navigation.php" ?>
		<?php

			//before the user make any action the session is checked first and if no session has been created then redirect to home page
			if(!isset($_SESSION['username'])){
				//The session is not created. redirect to home
				redirect('./index');
			}
			else{
				if(isset($_GET['profil'])){
					$patientid = escape($_GET['profil']);
					$table="patienthealthinfo";
					$key="*";
					$value="patient_id='$patientid'";
					$patientfound = readDataWithSpecColumn($table, $key, $value);
					while ($patinfo = mysqli_fetch_assoc($patientfound)){

						//patient found
						break;
					} 
					$table = "patreg";
					$patientfound = readDataWithSpecColumn($table, $key, $value);
					while ($patreg = mysqli_fetch_assoc($patientfound)){

						//patient found
						break;
					} 
				} elseif(isset($_GET['saveupdate'])){
					//extract all parameter from the get method and escape
					$patientid = escape($_GET['patientid']);
					$bloodtype = escape($_GET['bloodtype']);
					$allergie = escape($_GET['allergie']);
					$bloodpressure = escape($_GET['bloodpressure']);
					$heartrate = escape($_GET['heartrate']);
					$symptom = escape($_GET['symptom']);
					$diagnostic = escape($_GET['diagnostic']);
					$rhesus ="";
					if((substr($bloodtype, -1) == "+") || (substr($bloodtype, -1) == "-")){
						$rhesus = substr($bloodtype, -1);
						$Cnt = strlen($bloodtype);
						$bloodtype = substr($bloodtype, 0, $Cnt-1);
					}

					$table="patienthealthinfo";
					$key="patient_id<=>bloodtype<=>rhesus<=>allergies<=>bloodpressure<=>heartrate<=>symptom<=>diagnostic";
					$value="$patientid<=>$bloodtype<=>$rhesus<=>$allergie<=>$bloodpressure<=>$heartrate<=>$symptom<=>$diagnostic";
					$keyword = "patient_id";
					$keywordValue = "$patientid";
					//read the entry with the specific patient id 
					//$updatepatient = readDataWithSpecColumn($table, $key, $value);
					$updateresult = updateDB($table, $key, $value, $keyword, $keywordValue);

					$key="*";
					$value="patient_id='$patientid'";
					$patientfound = readDataWithSpecColumn($table, $key, $value);
					while ($patinfo = mysqli_fetch_assoc($patientfound)){

						//patient found
						break;
					}
					$table = "patreg";
					$key="*";
					$value="patient_id='$patientid'";
					$patientfound = readDataWithSpecColumn($table, $key, $value);
					while ($patreg = mysqli_fetch_assoc($patientfound)){
						$key = "fname<=>lname<=>gender<=>birthday<=>email<=>phone<=>address<=>bloodtype<=>rhesus<=>registrationDate<=>registrationTime<=>patient_id";
						$value = $patreg['fname'].'<=>'.$patreg['lname'].'<=>'.$patreg['gender'].'<=>'.$patreg['birthday'].'<=>'.$patreg['email'].'<=>'.$patreg['phone'].'<=>'.$patreg['address'].'<=>'.$bloodtype.'<=>'.$rhesus.'<=>'.$patreg['registrationDate'].'<=>'.$patreg['registrationTime'].'<=>'.$patreg['patient_id'];
						//patient found
						$updateresult = updateDB($table, $key, $value, $keyword, $keywordValue);
						break;
					} 
					if(!$updateresult){
						
					}

				}
			}
		?>
	
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<!--<div class="col-xs-1">
						</div>-->
						<div class="col-xs-12">		
							<h4 class="page-header text-center" style="background-color:#1000ff1f;border-radius:20px;padding: 15px 0">
								<b>Profil</b>        
							</h4>
						</div>
                    </div>
					<div class="col-md-4" style="box-shadow:5px 5px 5px 5px #32343840;
					margin-left:30px;border-radius:5px">
						<!-- Info about name and contact -->
						<div>
							<h4 class="page-headerx text-center" style="background-color:#00a6ff42;border-radius:20px;padding: 15px 0">
								<b>Contact</b>        
							</h4>					
						</div>
						<div class="row" style="margin: 30px 0">
							<div class="col-md-12 mar-top-bot-5"><b>Name:</b> <?php if(isset($patreg)) {echo '  '.$patreg['fname'].' '.$patreg['lname'];} ?></div>
							<div class="col-md-12 mar-top-bot-5"><b>Birth:</b> <?php if(isset($patreg)) {echo '  '.$patreg['birthday'];} ?></div>
							<div class="col-md-12 mar-top-bot-5"><b>Phone:</b> <?php if(isset($patreg)) {echo '  '.$patreg['phone'];} ?></div>
							
						</div>
					</div>
					<div class="col-md-7" style="box-shadow:5px 5px 5px 5px #32343840;
					margin:0 30px 0 15px;border-radius:5px">
						<!-- Information about the status of Patient -->
						<div>
							<h4 class="page-headerx text-center" style="background-color:#00a6ff42;border-radius:20px;padding: 15px 0">
								<b>Patient Info</b>        
							</h4>
						</div>

						<div class="row" style="margin: 30px 0">
						<form action="#" method="GET">
							<div class="col-md-12 mar-top-bot-5"><b>Patient ID:
								<input type="text" class="text-center" name="patientid" value="<?php if(isset($patinfo)) {echo $patinfo['patient_id'];} ?>" style="color:red;border:2px solid #000;border-radius:4px" readonly></b>
							</div>
							<?php if(isset($_GET['profilupdate']) && $_GET['profilupdate'] == 1) {?>
							<div class="col-md-12 mar-top-bot-5"><b>Blood type:</b>
								<select class="form-select form-control" aria-label="Default select example" name="bloodtype" disableds style="border:none">
									<option value="none">Choose the bloodtype of the patient</option> 
									<option value="A+" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "A+") echo "selected"; ?>>A+</option> 
									<option value="B+" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "B+") echo "selected"; ?>>B+</option> 
									<option value="AB+" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "AB+") echo "selected"; ?>>AB+</option>
									<option value="O+" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "O+") echo "selected"; ?>>O+</option>
									<option value="A-" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "A-") echo "selected"; ?>>A-</option>
									<option value="B-" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "B-") echo "selected"; ?>>B-</option>
									<option value="AB-" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "AB-") echo "selected"; ?>>AB-</option>
									<option value="O-" <?php if(isset($patinfo) && $patinfo['bloodtype'].$patinfo['rhesus'] == "O-") echo "selected"; ?>>O-</option>
								</select>
							</div>
							<div class="col-md-12 mar-top-bot-5"><b>Allergies:</b> 
								<input type="text" name="allergie" value="<?php if(isset($patinfo)) {echo $patinfo['allergies'];} ?>">
							</div>
							<div class="col-md-12 mar-top-bot-5"><b>Blood Pressure:</b>
							 	<input type="text" name="bloodpressure" value="<?php if(isset($patinfo)) {echo $patinfo['bloodpressure'];} ?>">
							</div>
							<div class="col-md-12 mar-top-bot-5"><b>Heart Rate:</b>
								<input type="text" name="heartrate" value="<?php if(isset($patinfo)) {echo $patinfo['heartrate'];} ?>">
							</div>
							<div class="col-md-12 mar-top-bot-5"><label for="sym">Symptom:</label><textarea id="sym" class="form-control" name="symptom" rows="5" cols="35"> <?php if(isset($patinfo)) {echo $patinfo['symptom'];} ?>
								</textarea>
							</div>
							<div class="col-md-12 mar-top-bot-5" style="margin-bottom:15px"><label for="diag">Diagnostics:</label><textarea id="diag" class="form-control" name="diagnostic" rows="10" cols="35"><?php if(isset($patinfo)) {echo $patinfo['diagnostic'];} ?>
								</textarea>
							</div>
							
							
							<div class="form-group" style="margin-top:10px;text-align:center">
								<input type="submit" class="btn btn-primary" name="saveupdate" value="Save">
								<input type="submit" class="btn btn-danger" name="cancelupdate" value="Cancel">
							</div>
							
							<?php } else {?>
							<div class="col-md-12 mar-top-bot-5"><b>Blood type:</b> <?php if(isset($patinfo)) {echo $patinfo['bloodtype'].$patinfo['rhesus'];}?></div>
							<div class="col-md-12 mar-top-bot-5"><b>Allergies:</b> <?php if(isset($patinfo)) {echo $patinfo['allergies'];}else{echo "---";} ?></div>
							<div class="col-md-12 mar-top-bot-5"><b>Blood Pressure:</b> <?php if(isset($patinfo)) {echo $patinfo['bloodpressure'];}else{echo "---";} ?></div>
							<div class="col-md-12 mar-top-bot-5"><b>Heart Rate:</b> <?php if(isset($patinfo)) {echo $patinfo['heartrate'];}else{echo "---";} ?></div>
							<div class="col-md-12 mar-top-bot-5"><label for="sym-1">Symptom:</label>
								<textarea id="sym-1" class="form-control" name="symptom" rows="5" cols="35" readonly><?php if(isset($patinfo)) {echo $patinfo['symptom'];}else{echo "---";} ?>
								</textarea>
							</div>
							<div class="col-md-12 mar-top-bot-5"><div><label for="diag-1">Diagnostics:</label></div>
								<textarea id="diag-1" class="form-control" name="diagnostic" rows="10" cols="35" readonly> <?php if(isset($patinfo)) {echo $patinfo['diagnostic'];}else{echo "---";} ?>
								</textarea>
							</div>
							<div class="form-group" style="margin-top:10px;text-align:center">
								<a href="?profilupdate=1&profil=<?php if(isset($patinfo)) {echo $patinfo['patient_id'];} ?>" class="btn btn-primary" name="profilupdate" value="Update">Update</a>
							</div>




							<?php } ?>
							</form>
<!--
						<form action="login.php" method="post">
							<div class="form-group input-group">
								<div class="col-md-12 mar-top-bot-5"><b>Blood type:</b>
									<input type="text" class="" name="bloodtype" value="<?php if(isset($bloodtype)) echo $bloodtype; ?>" disabled>
								</div>
							</div>
							<div class="form-group input-group">
								<div class="col-md-12 mar-top-bot-5"><b>Allergies:</b>
									<input type="text" class="" name="allergies" value="<?php if(isset($bloodtype)) echo $bloodtype; ?>" disabled>
								</div>
							</div>
							<div class="form-group input-group">
								<div class="col-md-12 mar-top-bot-5"><b>Blood Pressure:</b>
									<input type="text" class="form-control" name="bloodpressure" value="<?php if(isset($bloodtype)) echo $bloodtype; ?>" disabled>
								</div>
							</div>
							<div class="form-group input-group">
								<div class="col-md-12 mar-top-bot-5"><b>Heart Rate:</b>
									<input type="text" class="form-control" name="heartrate" value="<?php if(isset($bloodtype)) echo $bloodtype; ?>" disabled>
								</div>
							</div>
	
							<div class="text-center" style="margin-bottom:15px">
								<a href="#" class="badge badge-info"><small class="text-muted" style="color:white">Forgot Password?</small></a> 
							</div>
							
						</form>	
-->
							
						</div>

					</div>

                </div>
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


	<?php include "includes/footer.php" ?>
