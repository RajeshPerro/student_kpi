<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 10:21 AM
 */
$Batch=$_GET['batch'];
$Group=$_GET['group'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql="select * FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group'  GROUP BY s_id";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
//print_r($fetch_result);
echo '<option>--Select ID--</option>';
foreach ($fetch_result as $key => $value)
{

    echo '<option value="'.$value['s_id'].'">'.$value['s_id'].'</option>';
}


?>