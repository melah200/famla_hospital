<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM addfiles WHERE  id=".$_GET['id']."";
      	//exit;
      	$write =mysqli_query($db_connect, $sql) or die(mysql_error($db_connect));
            
              header("location:appointment.php");
      }
      else
      	echo "Not Sucess";
   ?>