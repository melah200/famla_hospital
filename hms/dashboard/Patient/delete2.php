
<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$fetch="SELECT * FROM addpayment WHERE id=".$_GET['id']."";
      	$q=mysqli_query($db_connect, $fetch) or die(mysql_error($db_connect));
		$result=mysqli_fetch_array($q);
     //print_r($result['patient']); exit();
      	$sql="DELETE FROM addpayment WHERE  id=".$_GET['id']."";
      	//exit;
      	$write =mysqli_query($db_connect, $sql) or die(mysql_error($db_connect));

     
header("location:paymenthistory.php?id=".$result['patient']);
      }
      else
      	echo "Not Sucess";
   ?>