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
								<b>List of Patients</b>        
							</h4>
						</div>
						<div class="col-xs-12 table-responsive" style="border-radius:20px">

								 <input type="text" id="myInput" class="form-control search-people" placeholder="Search a patient">
								<table class="table table-hover" >
								  <thead class="thead-light">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">lastname</th>
								      <th scope="col">firstname</th>
								      <th scope="col">Gender</th>
								      <th scope="col">Birth</th>
								      <th scope="col">Status</th>
								      <th scope="col">More Infos</th>
								    </tr>
								  </thead>
								  <tbody id="myTable">
						<?php
							$patlist = readAllDbTable('patreg');
							$count = 0;
							while ($row = mysqli_fetch_assoc($patlist)) {
								# code...
								$count++;
						?>	

								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $row['lname']; ?></td>
								      <td><?php echo $row['fname']; ?></td>
								      <td><?php echo $row['gender']; ?></td>
								      <td><?php echo $row['birthday']; ?></td>
								      <td>Status</td>
								      <td><a href="patientprofil.php?profil=<?php echo $row['patient_id']; ?>"><input type="submit" class="btn btn-primary" name="submit" value="More..."></a></td>
								    </tr>							
						<?php }?>
								  </tbody>
								</table>
						<?php if($count == 0) echo "<div class='text-center' style='color:red'><b>No Patient found</b></div>"; ?>
						</div>

                    </div>
                </div>
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


	<?php include "includes/footer.php" ?>
