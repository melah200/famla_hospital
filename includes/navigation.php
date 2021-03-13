<?php 
 // ob_start();
  //session_start();

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- include the navbar -->
	<?php include "includes/navbar.php"; ?>
	<!-- include the sidebar only if the user is logged -->
	<?php 
		//check if the user is logged and display the sidebar
		if(isset($_SESSION['user_access'])){
			//User is logged display the sidebar
			include "includes/sidebar.php"; 
		}else{
			//User is not logged do not display the sidebar
		}
	?>
	<!-- /.navbar-collapse -->
</nav>
