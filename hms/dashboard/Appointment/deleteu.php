<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      
      	$sql="DELETE FROM addappointment WHERE  id=".$_GET['id']."";
      	
      	$write =mysqli_query($db_connect, $sql) or die(mysql_error($db_connect));
            
              header("location:upcomming.php");
      }
      else
      	echo "Not Sucess";
   ?>