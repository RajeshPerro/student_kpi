<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/25/15
 * Time: 12:20 PM
 */
$information = Array();
$total_score=0;
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_Name = 'student_kpi';
$total_score = 0;
$sql="SELECT * FROM student_assessment GROUP BY s_id";
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
foreach($fetch_result as $key=>$value)
{
$information['s_id']=$value['s_id'];
$information['name']=$value['name'];
    $test = $value['s_id'];
    $sql = "select attendance FROM student_attendance WHERE s_id='$test' ";
    $attendance = $raj_modelobject->DataView2($sql, $db_user, $db_pass, $db_Name);
    $cnt_one = 0;
    $cnt_zero = 0;
    foreach ($attendance as $atten) {
        $xx = $atten['attendance'];
        //echo $xx;
        if ($xx == 1) {
            $cnt_one++;
        } else {
            $cnt_zero++;
        }

    }
    $total_class = $cnt_one + $cnt_zero;
    $atten_score = ($cnt_one * 5) / $total_class;

    $total_score += $atten_score;
    if($atten_score==false)
    {
        $atten_score=0;
    }
    else
    {
        $atten_score=1;
    }
    $information['atten']=$atten_score;

    $stu_id = $value['s_id'];
    $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
    $small_test = $raj_modelobject->DataView($sql, $db_user, $db_pass, $db_Name);
    $cnt_one = 0;
    $cnt_zero = 0;
    foreach ($small_test as $st) {
        $small_score = $st['SUM(actual)'] / $st['COUNT(*)'];
         number_format((float)$small_score, 2, '.', '');


    }
    $total_score += $small_score;
    $information['small_test']=number_format((float)$small_score, 2, '.', '');


    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='FT'";
    $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($final_test as $fft) {
        $final_score = $fft['SUM(actual)'] / $fft['COUNT(*)'];
         number_format((float)$final_score, 2, '.', '');
        //echo $final_score;
    }
    $total_score += $final_score;
    $information['final_test']=number_format((float)$final_score, 2, '.', '');

    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='ASS'";

    $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($assignment as $ass) {
        $final_ass = $ass['SUM(actual)'] / $ass['COUNT(*)'];
        number_format((float)$final_ass, 2, '.', '');
        //echo $final_ass;
    }
    $total_score += $final_ass;
    $information['assignment']=number_format((float)$final_ass, 2, '.', '');


    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
    $project_final = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($project_final as $pr) {
        $final_pr = $pr['SUM(actual)'] / $pr['COUNT(*)'];
        number_format((float)$final_pr, 2, '.', '');
        // echo $final_pr;
    }
    $total_score += $final_pr;
    $information['final_project']=number_format((float)$final_pr, 2, '.', '');

    $ws_value = 0;
    $stu_id = $value['s_id'];
    $today = date('Y-m-d');
    $sql2 = "select hours FROM worksnap WHERE s_id='$stu_id' AND DATE(entry_date)='$today' ";
    $worksnap_hour = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($worksnap_hour as $ws) {
        $hours = $ws['hours'];
        if ($hours >= 3) {
            $ws_value = 10;
        } elseif ($hours >= 2.5 && $hours < 3) {
            $ws_value = 8;
        } elseif ($hours >= 2 && $hours < 2.5) {
            $ws_value = 6;
        } elseif ($hours >= 1.5 && $hours < 2) {
            $ws_value = 5;
        } elseif ($hours >= 1 && $hours < 1.5) {
            $ws_value = 4;
        } elseif ($hours >= 0.5 && $hours < 1) {
            $ws_value = 3;
        } else {
            $ws_value = 0;
        }
    }
   // echo $ws_value;
    $total_score += $ws_value;
    $information['worksnap']=$ws_value;
    $information['total_score']=number_format((float)$total_score, 2, '.', '');;
    header('Content-type: application/json');
    echo json_encode($information);
}
?>