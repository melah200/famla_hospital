<?php 
	//check if file is already in use
	if(!isset($sidebar_in_use)){
		$sidebar_in_use = "";
?>

<?php
include_once("../inc/connect.php ");
//echo "string"; exit;
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
	   <?php
			$user_s = $_SESSION['username'];
			$sql="SELECT * FROM login WHERE username='$user_s'";
			$write =mysqli_query($db_connect, $sql) or die(mysqli_error($db_connect));
			$row2=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
		?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dashboard/Upload/Adminprofile/<?php if($row2['profile']!= "") {echo $row2['profile'];}else{echo "doctor.png";} ?>" class="img-circle" alt="User Image">
		</div>
        <div class="pull-left info">
          <p><?php echo $row2['fname'];?>&nbsp;
           <?php echo $row2['lname'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../Index/index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
         </a>
        </li>
		<!-- Patient tree -->
       <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span>Patients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Patient/patientlist.php"><i class="fa fa-list-alt"></i> Patient List</a></li>
            <li><a href="../Patient/newprofile.php"><i class="fa fa-plus"></i> Add New Profile</a></li>
            <li><a href="../Patient/payments.php"><i class="fa fa-dollar"></i> Payments</a></li>
		   </ul>
        </li>
		<!-- Appointment tree -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a class="popup" onclick="myFunction()"><i class="fa fa-plus"></i> Add Appointment<span class="popuptext" id="myPopup">Get full version at mayuri.infospace@gmail.com</span></a></li>-->
            <li><a href="../Appointment/addappointment.php"><i class="fa fa-plus"></i> Add Appointment</a></li>
            <li><a href="../Appointment/allappointment.php"><i class="fa fa-list"></i> All Appointment</a></li>
            <li><a href="../Appointment/appointment.php"><i class="fa fa-calendar"></i> Appointment</a></li>
            <li><a href="../Appointment/today.php"><i class="fa fa-laptop"></i> Today's Appointment</a></li>
            <li><a href="../Appointment/upcomming.php"><i class="fa fa-calendar-plus-o"></i> Upcomming Appointment</a></li>
           </ul>
        </li>
		<!-- Patient records tree -->
		<?php  if(false) { ?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>Patient records</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Medicine/addmedicine.php"><i class="fa fa-plus-circle"></i> Add Patient record</a></li>
            <!--<li><a href="../Medicine/medicinecategory.php"><i class="fa fa-edit"></i>  Medicine Category</a></li>-->
            <!--<li><a href="../Medicine/medicinelist.php"><i class="fa fa-medkit"></i>  Medicine List</a></li>-->
            <li><a href="../Patient/casehistory.php"><i class="fa fa-book"></i> History</a></li>
            <!--<li><a class="popup" onclick="myFunction()"><i class="fa fa-wheelchair"></i> Patients<span class="popuptext" id="myPopup">Get full version at mayuri.infospace@gmail.com</span></a></li>-->
            <!--<li><a href="#"><i class="fa fa-wheelchair"></i> Patients</a></li>-->
            <li><a href="../Patient/document.php"><i class="fa fa-file-text-o"></i> Documents</a></li>
                     
		  </ul>
        </li>
		<?php } ?>
        <li>
          <a href="../Patientrecords/patientrecord.php">
            <i class="fa fa-medkit"></i> <span>Patient records</span>
         </a>
        </li>

        <!-- Services tree -->
		<!--
		<li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Services/mainservices.php"><i class="fa fa-briefcase"></i> Main Services</a></li>
            <li><a href="../Services/services.php"><i class="fa fa-briefcase"></i> Sub Services</a></li>
          </ul>
        </li>
		-->
        <!-- Prescription tree -->
		<!--
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Prescription</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../prescription/addprescription.php"><i class="fa fa-plus-circle"></i> Add Prescription</a></li>
            <li><a href="../prescription/prescription.php"><i class="fa fa-edit"></i> Prescription</a></li>
          </ul>
        </li>
		-->
        <!-- Medicine tree -->
		<!--
		<li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>Medicine</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../Medicine/addmedicine.php"><i class="fa fa-plus-circle"></i> Add Medicine</a></li>
            <li><a href="../Medicine/medicinecategory.php"><i class="fa fa-edit"></i>  Medicine Category</a></li>
            <li><a href="../Medicine/medicinelist.php"><i class="fa fa-medkit"></i>  Medicine List</a></li>
          </ul>
        </li>
		-->
        <li>
          <a href="../Admin/index.php">
            <i class="fa fa-user"></i> <span>Profile</span>
         </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
	<?php } ?>