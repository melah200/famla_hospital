	<?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
		<?php include "includes/navigation.php" ?>
	
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                	<!-- entry column to create new Job title. -->
                	<div class="col-lg-4">
						<div class="col-xs-12">		
							<h4 class="page-header text-center" style="background-color:#1000ff1f;border-radius:20px;padding: 15px 0">
								<b>Create new Job title</b>        
							</h4>
						</div>
						<form action="" method="POST">
							<div class="form-group input-group">
								<label for="newjob">Job Title</label>
								<input type="text" class="form-control" name="newjob"  placeholder="Fill new job title">
							</div>
							<div class="form-group input-group">
								<input type="submit" class="btn btn-primary" name="addjob" value="Create" style="margin-top:5px">
							</div>
							

						</form>
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
							$patlist = readAllDbTable('employees');
							$count = 0;
							while ($row = mysqli_fetch_assoc($patlist)) {
								# code...
								$count++;
						?>	

								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $row['lastname']; ?></td>
								      <td><input type="submit" class="btn btn-warning" name="change" value="Change"></td>
								      <td><input type="submit" class="btn btn-danger" name="delete" value="Delete"></td>
								    </tr>							
						<?php }?>


								  </tbody>
								</table>
						<?php if($count == 0) echo "<div class='text-center' style='color:red'><b>No Patient</b></div>"; ?>
						</div>

                    </div>
                </div>
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


	<?php include "includes/footer.php" ?>
