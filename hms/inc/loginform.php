
	<!-- Main Content -->
	<div class="container-fluid" id="loginform">

		<div class="row" style="padding-bottom: 100px;">
			<div class="col-xs-3"></div>				
			<div class="col-xs-6" style="background-color:#373754a1;border-radius:5px;margin: 20px 0;">
				<h4 class="loginform-page-header text-center" style="color:white">
					<b>Log-in</b>        
				</h4>
				<?php if(isset($_SESSION['no_user'])){ ?>
				<h5 class="text-center " style="color: #ffb302"><?php echo $_SESSION['no_user']; 
						unset($_SESSION['no_user']); ?>	
				</h5>
				<?php } ?>
				<form method="post">

					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-w fa-user"></i></span>
						<input type="text" class="form-control"  placeholder="Username or ID" name="username" value="<?php if(isset($username)) echo $username; ?>" required>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-w fa-key"></i></span>
						<input type="password" class="form-control" placeholder="Password" name="password" value="<?php if(isset($password)) echo $password; ?>" required>
					</div>	
					<div class="form-group">
						<input type="checkbox" name="log_as" value="admin"> <span style="color:white">Log in as Administrator</span>
					</div>						

					<button type="submit"  class="btn btn-primary btn-lg" name="login">login</button>
					<p class="text-center">Forgot your <a href="email.php">password</a>?</p>
					
				</form>			

			</div>				
			<div class="col-xs-3"></div>
		
		</div>
		
	</div>
