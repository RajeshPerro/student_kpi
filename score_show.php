<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 1:36 PM
 */
$Batch=$_GET['batch'];
$Group=$_GET['group'];
$StudentId=$_GET['s_id'];

$StudentName=$_GET['name'];
$ExamType=$_GET['ExamType'];
$SkillType=$_GET['Skill'];
$SkillName=$_GET['SkillName'];
$entry_date=$_GET['date'];
//$OutOf=$_GET['outof'];
//$Obtain=$_GET['obtain'];
//$Actual=$_GET['actual'];

//echo $Batch.$Group.$StudentId.$StudentName.$ExamType.$SkillType.$SkillName;
//exit;

include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
//echo "wtf";
//$sql="select entry_date FROM student_assessment WHERE(b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' AND name='$StudentName' AND exam_type='$ExamType' AND skill_type='$SkillType' AND skill_name='$SKillName')";
$sql="select * FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' AND name='$StudentName' AND exam_type='$ExamType' AND skill_type='$SkillType' AND skill_name='$SkillName' AND entry_date='$entry_date'";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
foreach($fetch_result as $key=>$value)
{
echo ('
<div class="col-xs-12 col-sm-3">
 <input class="form-control" type="number" id="of"  name="outof"  placeholder="Out of" value="'.$value['outof'].'">
</div>
<div class="col-xs-12 col-sm-3">
<input class="form-control"  onkeyup="score_cal()" type="number" id="obtain" value="'.$value['obtained'].'"  name="obtained"  placeholder="Obtained">
</div>
<div class="col-xs-12 col-sm-3">
<input class="form-control" id="actual"  name="actual"  value="'.$value['actual'].'" placeholder="Actual Score">
</div>
');
}
?>