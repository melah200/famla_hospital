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

		if(isset($_POST['addjob'])){
			if ($_POST['newjobname'] != "") {
				# code...
				$jobtitle = escape($_POST['newjobname']);
				$isJobExist = checkEntryInDB("jobstitle", "*", "jobs='$jobtitle'");
				// Check if the job title already exist
				if($isJobExist){
					// Job title exist already.
					$msgJobTitleExist = "The Job name '$jobtitle' already exist";
				}else{
					// Job title do not exist already.
					// Save the new name in database
					$result = add2table("jobstitle", "jobs", "$jobtitle");
					if($result){
						$msgJobTitleSucces = "The new Job name '$jobtitle' has been saved";
					}

				}
			} else{
				$msgjobtitle = 'The Job name should not be empty';
			}
		}


	?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                	<!-- entry column to create new Job title. -->
                	<div class="col-lg-4">
						<div class="col-xs-12">		
							<h4 class="page-header text-center" style="background-color:#90caf9;border-radius:20px;padding: 15px 0">
								<b>Create new Job title</b>        
							</h4>
						</div>
						<form action="" method="POST">
							<div class="form-group input-group col-xs-12">
								<label for="newjobname">Job Title</label>
								<input type="text" class="form-control" name="newjobname"  placeholder="Fill new job title">
							</div>
							<div class="form-group input-group">
								<input type="submit" class="btn btn-primary" name="addjob" value="Create" style="margin-top:5px">
							</div>
							

						</form>
						<?php 
							if (isset($msgJobTitleSucces)) {
								# code...
								# The job name has been save successfully.
								echo "<div style='color:green'>$msgJobTitleSucces</div>";
							} else if (isset($msgJobTitleExist)) {
								# code...
								# The job name Exist already.
								echo "<div style='color:red'>$msgJobTitleExist</div>";
							}


						?>
                	</div>
                    <div class="col-lg-8">
						<!-- entry column to view, change and delete Job title. -->
						<div class="col-xs-12">		
							<h4 class="page-header text-center" style="background-color:#1000ff1f;border-radius:20px;padding: 15px 0">
								<b>List of all job title</b>        
							</h4>
						</div>
						<div class="col-xs-12 table-responsive" style="border-radius:20px">

								 <input type="text" id="myInput" class="form-control search-in-list" placeholder=" Search a job title...">
								<table class="table table-hover" >
								  <thead class="thead-light">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Job title</th>
								      <th scope="col">Update</th>
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="myTable">
						<?php
							$patlist = readAllDbTable('jobstitle');
							$count = 0;
							while ($row = mysqli_fetch_assoc($patlist)) {
								# code...
								$count++;
						?>	

								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $row['jobs']; ?></td>
								      <td><input type="submit" class="btn btn-warning" name="change" value="Change"></td>
								      <td><input type="submit" class="btn btn-danger" name="delete" value="Delete"></td>
								    </tr>							
						<?php }?>


								  </tbody>
								</table>
						<?php if($count == 0) echo "<div class='text-center' style='color:red'><b>No Jobs Title</b></div>"; ?>
						</div>

                    </div>
                </div>
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


	<?php include "includes/footer.php" ?>
