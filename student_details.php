<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/29/15
 * Time: 11:52 AM
 */
$StudentId=$_GET['id'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql="select * FROM student_assessment WHERE s_id='$StudentId' ";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
print_r($fetch_result);
?>