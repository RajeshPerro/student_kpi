<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/8/15
 * Time: 2:31 PM
 */

$test =array();
$Batch=$_GET['batch'];
$Group=$_GET['group'];
//echo $Batch.$Group;
include('rajesh_model.php');
include('database_config.php');
$sql="select * FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group' GROUP BY s_id";
$db_user =$database_user;
$db_pass =$databse_pass;
$db_Name='student_kpi';
$sl=0;
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
echo '<table class="table table-striped table-condensed table-bordered table-hover"><tr><th>Sl#</th><th>Students Id</th><th>Students Name</th><th>Action</th></tr>';
foreach ($fetch_result as $key => $value) {
$sl++;

echo '<tr class="student-row">';
	echo '<td>'.$sl.'</td>';
	//echo '<td><input class="student-id" data-id=".$value[s_id]." value='.$value['s_id'].'></td>';
	//echo '<td><p readonly class="student-id" data-id="'.$value["s_id"].'" value="'.$value["s_id"].'"></td>';
	//echo'<td><p class="student-id"></p></td>';
	echo '<td><input size="20" readonly class="student-id form-control" data-id="'.$value["s_id"].'" value="'.$value["s_id"].'"></td>';
	echo '<td><input size="30" readonly class="student-name form-control" data-name="'.$value["name"].'" value="'.$value["name"].'"></td>';
	//echo '<td><input class="student-name" data-name='.$value[name].'value='.$value['name'].'></td>';
	//echo '<td>'.$value['name'].'</td>';
	echo '<td> <a class=" add_score btn btn-success why-its-not-working" href="#" data-toggle="modal" data-target=".pop">'."Add Score".'</a></td>';
	
echo "</tr>";
}

echo '</table>';
?>
