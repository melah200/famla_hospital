	<!-- Main Content -->
	<div class="container-fluid" id="loginform">

		<div class="row" style="padding-bottom: 100px;">
			<div class="col-xs-1"></div>				
			<div class="col-xs-6" style="background-color:#373754a1;border-radius:5px;margin: 20px 0;">
				<h4 class="loginform-page-header text-center" style="color:white">
					<b>Add New Job Title</b>        
				</h4>
				<?php if(isset($_SESSION['no_user'])){ ?>
				<h5 class="text-center " style="color: #ffb302"><?php echo $_SESSION['no_user']; 
						unset($_SESSION['no_user']); ?>	
				</h5>
				<?php } ?>
				<form action="index" method="post">
					<div class="form-group input-group">
						<span class="input-group"><i class="fa fa-w fa-user"></i></span>
						<input type="text" class="form-control"  placeholder="Enter the Job Title" name="job" value="<?php if(isset($job)) echo $job; ?>" required>
					</div>						

					<div class="form-group" style="margin-top:30px;text-align:center">
						
						<input type="submit" class="btn btn-primary" name="addjob" value="Add">
					</div>
					<div class="form-group" style="margin-top:30px;text-align:center">
						
						<input type="submit" class="btn btn-danger" name="close" value="Cancel">
					</div>
					
				</form>			

			</div>				
		
		
		</div>
		
	</div>
