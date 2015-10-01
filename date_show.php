<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 11:41 AM
 */
$Batch=$_GET['batch'];
$Group=$_GET['group'];
$StudentId=$_GET['s_id'];

$StudentName=$_GET['name'];
$ExamType=$_GET['ExamType'];
$SkillType=$_GET['Skill'];
$SkillName=$_GET['SkillName'];
//echo $Batch.$Group.$StudentId.$StudentName.$ExamType.$SkillType.$SkillName;
//exit;

include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
//echo "wtf";
//$sql="select entry_date FROM student_assessment WHERE(b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' AND name='$StudentName' AND exam_type='$ExamType' AND skill_type='$SkillType' AND skill_name='$SKillName')";
$sql="select entry_date FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' AND name='$StudentName' AND exam_type='$ExamType' AND skill_type='$SkillType' AND skill_name='$SkillName'";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
//print_r($fetch_result);
echo '<option>--Select Date--</option>';
foreach ($fetch_result as $key => $value)
{

    echo '<option value="'.$value['entry_date'].'">'.$value['entry_date'].'</option>';
}
?>