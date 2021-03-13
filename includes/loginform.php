
	<!-- Main Content -->
	<div class="container-fluid" id="loginform">

		<div class="row" style="padding-bottom: 100px;">
			<div class="col-xs-1"></div>				
			<div class="col-xs-6" style="background-color:#373754a1;border-radius:5px;margin: 20px 0;">
				<h4 class="loginform-page-header text-center" style="color:white">
					<b>Login</b>        
				</h4>
				<?php if(isset($_SESSION['no_user'])){ ?>
				<h5 class="text-center " style="color: #ffb302"><?php echo $_SESSION['no_user']; 
						unset($_SESSION['no_user']); ?>	
				</h5>
				<?php } ?>
				<form action="login.php" method="post">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-w fa-user"></i></span>
						<input type="text" class="form-control"  placeholder="Enter your Username or ID" name="username" value="<?php if(isset($username)) echo $username; ?>" required>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-w fa-key"></i></span>
						<input type="password" class="form-control" placeholder="Enter your Password" name="password" value="<?php if(isset($password)) echo $password; ?>" required>
					</div>	
					<div class="form-group">
						<input type="checkbox" name="log_as" value="admin"> <span style="color:white">Log in as Administrator</span>
					</div>						

					<div class="form-group" style="margin-top:30px;text-align:center">
						
						<input type="submit" class="btn btn-primary" name="login" value="Login">
					</div>
					<div class="text-center" style="margin-bottom:15px">
						<a href="#" class="badge badge-info"><small class="text-muted" style="color:white">Forgot Password?</small></a> 
					</div>
					
				</form>			

			</div>				
		
		
		</div>
		
	</div>
