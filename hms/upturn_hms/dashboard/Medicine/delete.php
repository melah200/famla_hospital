<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM medicinecategory WHERE  id=".$_GET['id']."";
      	//exit;
      	$write =mysqli_query($db_connect, $sql) or die(mysql_error($db_connect));
            
              header("location:medicinecategory.php");
      }
      else
      	echo "Not Sucess";
   ?>