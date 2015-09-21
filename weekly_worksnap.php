<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/17/15
 * Time: 10:42 AM
 */
$information = Array();
$student_id=$_GET['std_id'];
include('rajesh_model.php');
//$sql="select * FROM student_assessment WHERE s_id='$student_id'";
//$db_user = 'root';
//$db_pass = 'root123';
//$db_Name = 'student_kpi';
//
//value assign



$ws_value=0;
$stu_id = $student_id;
$today = date('Y-m-d');
$sql2 = "SELECT SUM(hours) AS total, CONCAT(entry_date,  ' - ',  entry_date + INTERVAL 6 DAY ) AS week FROM worksnap
WHERE  s_id ='$stu_id'GROUP BY WEEK(entry_date) ORDER BY WEEK(entry_date) ";
$db_user = 'root';
$db_pass = 'root123';
$db_Name = 'student_kpi';
$worksnap_hour = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);



//}
//print_r($information) ;
echo json_encode($worksnap_hour);
?>
