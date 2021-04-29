<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
$query=mysqli_query($db_connect, "SELECT * FROM addfiles")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
$row1=mysql_fetch_all($query);
//echo $row1; 
$p_query=mysqli_query($db_connect, "SELECT * FROM patientregister")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysql_fetch_all($p_query);

function mysql_fetch_all($query)

{
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
}
//print_r($row1); 
//print_r($p_row1);exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error($db_connect));
?>
<?php
//session_start();
if(isset($_POST['submit']))
{ 
// $patient=html($_POST['patient']);
$doctor=html($_POST['doctor']);
$app_date=html($_POST['date']);
$starttime=html($_POST['time']);
$timestr = strtotime("+30 minutes", strtotime($starttime));
$endtime=date('G:i', $timestr);
$remark=html($_POST['remark']);
$app_status='upcoming';


  $write =mysqli_query($db_connect, "INSERT INTO addappointment( `patient`,`doctor`,`app_date`,`starttime`,`endtime`,`remark`,`sms`,`app_status`) VALUES ('10','$doctor','$app_date','$starttime','$endtime','$remark','0','$app_status')") or die(mysqli_error($db_connect));
  //$query=mysqli_query($db_connect, "SELECT * FROM user ")or die (mysqli_error($db_connect));
  //$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
echo " <script>setTimeout(\"location.href='../Appointment/appointment.php';\",150);</script>";
}


?>

<div class="content-wrapper">
  <section class="content-header">
  <h1>
  Patient Document
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Patient</li>
    <li class="active"> Appointment</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">Patient Appointment</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Add New</button><br>
<!--  Modal appear when the button add is pressed -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-blue" style="height: 60px">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Add new Appointment</h4>
      </div>
  <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="fullname">Name <span style="color:red">*</span></label>
			 <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" required>
            </div>
           <div class="form-group">
               <label for="remark">Remark</label>
              <input type="text" name="remark" class="form-control" id="remark" placeholder="">
           </div>
		   
		   <div class="form-group">
			 <label for="doctor">Choose a Doctor </label>
             <select name="doctor" class="form-control" id="doctor" placeholder="">
				<?php foreach ($p_row1 as $s) {?>
				<option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
				<?php } ?>
              </select>
			</div>
           <div class="form-group">
               <label for="date">Date <span style="color:red">*</span></label>
              <input type="Date" name="date" min="<?php echo Date('Y-m-d') ?>" class="form-control" id="date" placeholder="" required>
           </div>
           <div class="form-group">
               <label for="time-app">Time (each 30min. from 7:30 to 17:30)<span style="color:red">*</span></label>
              <input type="time" name="time" min="07:30" max="17:30" step="1800" class="form-control" id="time-app" placeholder="" required>
           </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
             </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>
      </div>
    </div>
</div>
</div>
<!-- End of Modal block -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<!--
<td>
<a href="./excelapp.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="csvapp.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/app_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
-->
<!--
<div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Date</th>
            <th>Patient</th>
            <th>Title</th>
            <th>Document</th>
            <th>Option</th>
            </tr>
            </thead>
            <tbody>
               <?php
   foreach ($row1 as $row)
    {
$s1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
$w1 =mysqli_query($db_connect, $s1) or die(mysqli_error($db_connect));
//print_r($w1); exit;
// $row2=mysqli_fetch_assoc($w1)or die (mysqli_error($db_connect));
 //print_r($row2); exit();
 while($row2=mysqli_fetch_assoc($w1)){
?> <tr>  
<td><?php echo $row['doc_date'];?></td>
<td><?php echo $row2['name'];?></td>
<td><?php echo $row['title'];?></td> 

<td><img src="../Upload/File/<?php echo $row['file'];?>" style="height:100px;width:100px;"/></td>
 
<td><a href="./download.php?file=<?php echo $row['file'];?>"><button type="button" class="btn btn-success"><i class="fa fa-plus-square"></i> Download</button></a>&nbsp;
<a class="btn-del" href="deletea.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td>

</tr>
	<?php } } ?>
     </tbody>
    </table>
      </div>
-->
  
</div>
</div>
</div>
<!-- DATE -->
<div class="row">
<!-- /.col -->

<div class="col-md-12" style="display: flex">
	
	  <div style="margin-right:10px">
		  <div id="nav"></div>
	  </div>
	
  <div class="box box-primary">
	<div class="box-body no-padding">
	  <!-- THE CALENDAR -->
	  <div id="calendar-appointment"></div>
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /. box -->
</div>
<!-- /.col -->

</div>
<!-- END DATE -->
</section>
</div>
<script src="../daypilot/daypilot-all.min.js"></script>
<script type="text/javascript">

  var nav = new DayPilot.Navigator("nav");
  nav.showMonths = 3;
  nav.skipMonths = 3;
  nav.selectMode = "week";
  nav.onTimeRangeSelected = function (args) {
    dp.startDate = args.day;
    dp.update();
    loadEvents();
  };
  nav.init();

  var dp = new DayPilot.Calendar("dp");
  dp.viewType = "Week";

  dp.eventDeleteHandling = "Update";

  dp.onEventDeleted = function (args) {
    DayPilot.Http.ajax({
      url: "backend_delete.php",
      data: {
        id: args.e.id()
      },
      success: function () {
        console.log("Deleted.");
      }
    })

  };

  dp.onEventMoved = function (args) {
    DayPilot.Http.ajax({
      url: "backend_move.php",
      data: {
        id: args.e.id(),
        newStart: args.newStart,
        newEnd: args.newEnd
      },
      success: function () {
        console.log("Moved.");
      }
    });
  };

  dp.onEventResized = function (args) {
    DayPilot.Http.ajax({
      url: "backend_move.php",
      data: {
        id: args.e.id(),
        newStart: args.newStart,
        newEnd: args.newEnd
      },
      success: function () {
        console.log("Resized.");
      }
    });
  };

  // event creating
  dp.onTimeRangeSelected = function (args) {
    var name = prompt("New event name:", "Event")
    dp.clearSelection();
    if (!name) {
      return;
    }

    DayPilot.Http.ajax({
      url: "backend_create.php",
      data: {
        start: args.start,
        end: args.end,
        text: name
      },
      success: function (ajax) {
        var data = ajax.data;
        dp.events.add(new DayPilot.Event({
          start: args.start,
          end: args.end,
          id: data.id,
          text: name
        }));
        console.log("Created.");
      }
    });

  };

  dp.onEventClick = function (args) {
    alert("clicked: " + args.e.id());
  };

  dp.init();

  loadEvents();

  function loadEvents() {
    dp.events.load("backend_events.php");
  }

</script>

<script type="text/javascript">
  var elements = {
    theme: document.querySelector("#theme")
  };

  elements.theme.addEventListener("change", function () {
    dp.theme = this.value;
    dp.update();
  });

</script>

<?php include "../Include/footer.php";?>

