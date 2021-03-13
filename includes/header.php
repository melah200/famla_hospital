<?php 
	/* opens a buffer in which all output is stored. 
	   So every time you do an echo, the output of that is added to the buffer.
	*/
	ob_start();
	/* start session to be able to create global variable for the each created session */
	session_start();
?>
<?php include "database/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/hospital.css" rel="stylesheet">
    <link href="css/loginform.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/fontawesome.css" rel="stylesheet" type="text/css">


    <link href="fontawesome-free-5.15.2/css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="fontawesome-free-5.15.2/css/brands.min.css" rel="stylesheet" type="text/css">
    <link href="fontawesome-free-5.15.2/css/solid.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>