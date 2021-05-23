<?php
	include "database/db.php"; 
	ob_start();
	session_start();
	if(isset($_POST['login'])){
		//Get the username and the password
		$username = escape($_POST['username']);
		$password = escape($_POST['password']);
		
		
		//encryp the given password
		//$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
		//die($password);
		if(isset($_POST['log_as']) && ($_POST['log_as'] == "admin")){
			// log as admin
			//die("Try to log in as admin");
			$user_data = readDataWithSpecColumn("admintb", "*", "username='$username' ");
			if($row = mysqli_fetch_assoc($user_data)){
				//The user is found. Extract the database data for the login authentification

				$db_username = $row['username'];
				$db_password = $row['password'];

				$isPasswordOk = password_verify($password, $db_password);

				//die($db_username.'<br>'.$db_password.'<br><br>'.$username.'<br>'.$password);
				//Check the authentification
				if(($username == $db_username) && $isPasswordOk){
					//The Login is successful. Create the Session variable
					$_SESSION['username'] = $db_username;
					$_SESSION['user_access'] = "admin";
					$_SESSION['is_user_logged'] = true;	
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];			
				} else{
					//The password is wrong.
					$_SESSION['is_user_logged'] = false;
					header("Location:index.php");
				}
			} else{
				//there is no Administrator with this username
				$_SESSION['is_user_logged'] = false;
				$_SESSION['no_user'] = "There is no Administrator with the username : '$username'<br>";
			}
		}else {
			// log as employee
			// print_r($_POST);
			 //print_r($password);
			 //die($password);
			$user_data = readDataWithSpecColumn("employees", "*", "username='$username' or employee_id='$username' ");
			confirmQuery($user_data);
			if($row = mysqli_fetch_assoc($user_data)){
				//The user is found. Extract the database data for the login authentification
				$db_username = $row['username'];
				$db_employee_id = $row['employee_id'];
				$db_password = $row['password'];

				$isPasswordOk = password_verify($password, $db_password);
				//die("Data");
				 
				//Check the authentification
				if(($username == $db_username || $username == $db_employee_id) && ($isPasswordOk)){
					//The Login is successful. Create the Session variable
					$_SESSION['username'] = $db_username;
					$_SESSION['employee_id'] = $db_employee_id;
					$_SESSION['user_access'] = "employee";
					$_SESSION['user_function'] = $row['user_function'];
					$_SESSION['is_user_logged'] = true;
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
					//redirect with success
					//die("password ok");
				}else{
					//The password is wrong.
					$_SESSION['is_user_logged'] = false;
					header("Location:index.php");
				}

			}else{
				// No user exist with the given username or user ID
				$_SESSION['is_user_logged'] = false;
				$_SESSION['no_user'] = "There is no User with the username or user ID : '$username'<br>";
			}

			
		}
	}
	header("Location:index.php");
?>