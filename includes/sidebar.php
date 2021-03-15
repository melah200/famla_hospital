<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav" style="height: 100%">
		<li>
			<a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
		</li>
		<li>
			<a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
		</li>

		 	<!--   This part is for the Administrator -->

		 <?php if(isset($_SESSION['user_access']) && ($_SESSION['user_access'] === "admin")){ ?>
		<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-group"></i> Employees <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo" class="collapse">
				<li>
					<a href="employeeRegister"><i class="fa fa-fw fa-user-plus"></i> Register an Employee</a>
				</li>
				<li>
					<a href="employeelist"><i class="fa fa-fw fa-list-ol"></i> List of Employees</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="jobtitle">Jobs Title</a>
		</li>
			<!--   This part is for employees -->

		 <?php } else if(isset($_SESSION['user_access']) && ($_SESSION['user_access'] === "employee")){ ?>
		<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-group"></i> Patient <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo" class="collapse">
				<li>
					<a href="PatRegister"><i class="fa fa-fw fa-user-plus"></i> Register a Patient</a>
				</li>
				<li>
					<a href="patientlist"><i class="fa fa-fw fa-list-ol"></i> List of Patients</a>
				</li>
			</ul>
		</li>
		<?php } else{} ?>
		<li>
			<a href="Doctor.html"><i class="fa fa-fw fa-user-md"></i> Doctors</a>
		</li>
		<li>
			<a href="calender.html"><i class="fa fa-fw fa-calendar-o"></i> Calendrier</a>
		</li>
		<!--<li>
			<a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
		</li>-->
		<!--<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="demo1" class="collapse">
				<li>
					<a href="#">Dropdown Item</a>
				</li>
				<li>
					<a href="#">Dropdown Item</a>
				</li>
			</ul>
		</li>-->
		<li>
			<a href="settings.html"><i class="fa fa-fw fa-cogs"></i> Settings</a>
		</li>
		<li></li>
		<li></li>
	</ul>
</div>