<?php session_start(); ?>

<?php 
	//logout is someone was connected
	//set all section variable to NULL
	if(isset($_SESSION['user_access']) && ($_SESSION['user_access'] == "admin")){
		//logout the administrator
		$_SESSION['is_user_logged'] = false;
		$_SESSION['username'] = null;
		$_SESSION['firstname'] = null;
		$_SESSION['lastname'] = null;
		$_SESSION['user_access'] = null;		
	} else if(isset($_SESSION['user_access']) && ($_SESSION['user_access'] == "employee")){
		//logout the employee
		$_SESSION['is_user_logged'] = false;
		$_SESSION['username'] = null;
		$_SESSION['employee_id'] = null;
		$_SESSION['firstname'] = null;
		$_SESSION['lastname'] = null;
		$_SESSION['user_access'] = null;
		$_SESSION['user_function'] = null;
	}
	
	header("Location: ../index.php");

?>