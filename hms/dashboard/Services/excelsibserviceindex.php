<?php
include("../inc/connect.php") ;

$query=mysqli_query($db_connect, "SELECT * FROM subservices")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));


// $row1=mysql_fetch_all($query);
// function mysql_fetch_all($query) {
//     $all = array();
//     while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
//     return $temp;
//}
// $stmt=$db_con->prepare('SELECT * FROM medicinecategory');
// $stmt->execute();


?>

<html>
<head>
<title>Sub Services</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Sub Services</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
    				<tr>
    				<th>Sub Service Id</th>
              <th>Main Service Id</th>
              <th>Sub Service Name</th>
              <th>Fee</th>
    				</tr>
    			<?php
// while($row = mysqli_fetch_assoc($extract))
    			while($row=mysqli_fetch_assoc($query)){
    				echo '
    				<tr>
    					<td>'.$row["service_id"].'</td>
    					<td>'.$row["sid"].'</td>
              <td>'.$row["subservicename"].'</td>
              <td>'.$row["Fee"].'</td>
             
    				</tr>
    				';
    			}
    			?>
    		</table>
    		<a href="excelsubscervice.php">Export To Excel</a>

      </div>

    </div>

  </div>

</div>



</body>
</html>
