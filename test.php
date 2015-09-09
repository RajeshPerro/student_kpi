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
$sql="select * FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group' GROUP BY s_id";
$db_user='root';
$db_pass='root123';
$db_Name='student_kpi';
$sl=0;
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
foreach ($fetch_result as $key => $value) {
$sl++;

echo '<tr class="student-row">';
	echo '<td>'.$sl.'</td>';
	echo '<td><p class="student-id" data-id='.$value[s_id].'>'.$value['s_id'].'</p></td>';
	echo '<td><p class="student-name" data-name='.$value[name].'>'.$value['name'].'</p></td>';
	//echo '<td>'.$value['name'].'</td>';
	echo '<td> <a class=" add_score btn btn-success" href="#" data-toggle="modal" data-target=".pop">'."Add Score".'</a></td>';
	
echo "</tr>";
}

//print_r($test);
//$jsonstring = json_encode($test);
//echo $jsonstring;

?>
