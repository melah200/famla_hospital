<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
//echo "string"; exit();
//session_start();
if(isset($_POST['submit']))

{//print_r($_POST['description']); exit();
 //print_r($_POST); exit();
//echo "string"; exit();
    $date=$_POST['date'];
    $patient=$_POST['patient'];
    $description=$_POST['description'];
   $write =mysqli_query($db_connect, "INSERT INTO addmedicalhistory(`date`,`patient`,`description`) VALUES ('$date','$patient','$description')") or die(mysqli_error($db_connect));
      //$query=mysqli_query($db_connect, "SELECT * FROM user ")or die (mysqli_error($db_connect));
      //$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
    echo " <script>setTimeout(\"location.href='../Patient/casehistory.php';\",150);</script>";
    }
      

?>
<?php
//include("../inc/connect.php") ;
$query=mysqli_query($db_connect, "SELECT * FROM addmedicalhistory") or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
$row1=mysql_fetch_all($query);

$p_query=mysqli_query($db_connect, "SELECT * FROM patientregister") or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysql_fetch_all($p_query);


function mysql_fetch_all($query) {
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
//print_r($row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error($db_connect));
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        History 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> History</li>
      </ol>
    </section>
      <!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-book"></i> <h3 class="box-title"> History</h3>
      </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
             <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New History</h4>
              </div>
              <div class="modal-body">
               <form method="POST" >
                  <label >Start Date</label>
                  <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo date('Y-m-d');  ?>" readonly><br>
                  <label >End Date</label>
				  <input type="date" name="enddate" class="form-control" placeholder="" value="<?php echo date('Y-m-d');  ?>"><br>
                   <label >Patient</label><br>
                  <select name="patient" class="form-control select2"  placeholder="">
                  <?php foreach ($p_row1 as $p) {?>
                   <option value="<?php echo $p['id'];?>"><?php echo $p['name'];?></option>
                   <?php } ?>
                </select><br>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea id="editor1" name="description" style="width:150px;" class="form-control">
                  </textarea>
                </div>
                   <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      </div>
  </div>
<div class="box-header">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-circle"></i> Add New</button><!-- </a> --><br><br>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <!--    <td>
    <button type="button" class="btn btn-default">Copy</button>
    </td> -->
	<!-- button for Excel, CSV and PDF
    <td>
      <a href="./excelcasehistory.php"> <button type="button" class="btn btn-default">Excel</button></a>
    </td>&nbsp;&nbsp;
    <td>
     <a href="csvcasehistory.php"><button type="button" class="btn btn-default">CSV</button></a>
  </td>&nbsp;&nbsp;
<td>
   <a href="./PDF/casehistory_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp; -->
  <td>
    <button type="button" onclick="window.print();" class="btn btn-default">Print</button>
  </td>
<div class="box-body">
<input type="text" id="myInput" class="form-control search-in-list" placeholder="Search...">
<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
<th>Period</th>
<th>Patients</th>
<th>Descriptions</th>
<th>Stations - Rooms</th>
<th>Options</th>
</tr>
</thead>
<tbody id="myTable">
<?php
foreach ($row1 as $row)
{
  $sql1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
  $write1 =mysqli_query($db_connect, $sql1) or die(mysqli_error($db_connect));
 //print_r($sql); exit;
    // $row1=mysqli_fetch_array($write1)or die (mysqli_error($db_connect));
//print_r($row1); exit;
   //echo "$description"; exit();
   while($row1=mysqli_fetch_array($write1)){
?> <tr>
  
<td><?php echo $row['date'];?></td>
<td><?php echo $row1['name'];?></td>
<td><?php echo $row['description'];?></td> 
<td><?php echo "B1-100";?></td> 
<td><a href="editmedicalhistory.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button></a>
<a class="btn-del" href="d1.php?id=<?php echo $row['id'];?>"><button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
</a></td>
</tr>
<?php } } ?>
                </tfoot>
              </tbody>
              </table>
            </div>
              </div>
          </div>
        </div>
   </section>
  </div>
<?php include "../Include/footer.php";?>
          <script>
  $(function () { 
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  </script>
  <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>