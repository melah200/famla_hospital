<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="index.php" style="color:#00ffd0"><i class="fa fa-fw fa-hospital-o"></i> Hospital Famla</a>
</div>
<!-- Top Menu Items -->
<!--<div class="collapse navbar-collapse navbar-ex1-collapse">-->
<ul class="nav navbar-right top-nav">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
		<ul class="dropdown-menu alert-dropdown">
			<li>
				<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
			</li>
			<li>
				<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
			</li>
			<li>
				<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
			</li>
			<li>
				<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
			</li>
			<li>
				<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
			</li>
			<li>
				<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="#">View All</a>
			</li>
		</ul>
	</li>
	<li class="dropdown">
	<?php 
		if(!((isset($_SESSION['is_user_logged'])) && ($_SESSION['is_user_logged'] == true))){
			// Nobody is logged
	?>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<!--
			<li class="text-center" style="color: red">-->
				<!--<a href="#"><i class="fa fa-sign-in-alt"></i> Log In</a>-->
			<!--	<span>Fill the login form to connect</span>
			</li>-->

			<!-- Test -->
			<li>
				 <div class="row">
					<div class="col-md-12 text-center">
						Login
						<form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav" style="margin:3px">
							<div class="form-group">
								 <label class="sr-only" for="exampleInputEmail2">Username / ID</label>
								 <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Username or ID" name="username" value="<?php if(isset($username)) echo $username; ?>" required>
							</div>
							<div class="form-group">
								 <label class="sr-only" for="exampleInputPassword2">Password</label>
								 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password" value="<?php if(isset($password)) echo $password; ?>" required>
							</div>
							<div class="checkbox">
								 <label>
								 <input type="checkbox" name="log_as" value="admin"> Log in as Administrator
								 </label>
							</div>
							<div class="form-group">
								 <button type="submit" class="btn btn-primary btn-block" name="login" value="Login">Sign in</button>
							</div>
	                        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
						</form>
					</div>
			 	</div>
			</li>
			<!-- End Test -->
		</ul>
	
  <?php } else{ 
			//Someone is logged as admin or as employee
	?>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i class="fa fa-user"></i><?php echo ' '.$_SESSION['lastname'].' '.$_SESSION['firstname'];?> <b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="includes/logout.php"><i class="fa fa-sign-out-alt"></i> Log Out</a>
			</li>
		</ul>	
	
	<?php	} ?>
	</li>
</ul><!--</div>-->
