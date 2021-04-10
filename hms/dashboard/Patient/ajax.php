<?php
include("../inc/connect.php") ;
$id=$_POST['ajax_id'];
$q1=mysqli_query($db_connect, "SELECT * FROM subservices WHERE sid='".$id."'")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($q1)or die (mysqli_error($db_connect));
$m_row=mysql_fetch_all($q1);
function mysql_fetch_all($query)
 {
 	$temp='';
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
$a='';
foreach ($m_row as $value) {
	$a.='<option value="'.$value['sid'].'">'.$value['subservicename'].'</option>';
}
echo $a;
?>