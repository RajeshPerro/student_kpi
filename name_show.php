<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 10:21 AM
 */
$Batch=$_GET['batch'];
$Group=$_GET['group'];
$StudentId=$_GET['s_id'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql="select name FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' GROUP BY name";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
//print_r($fetch_result);

foreach ($fetch_result as $key => $value)
{

    echo '<input readonly class="form-control" name="name" id="student-name" value="'.$value['name'].'">';
}


?>