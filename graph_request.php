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
$sql="select * FROM student_assessment WHERE s_id='$student_id'";
$db_user = 'root';
$db_pass = 'root123';
$db_Name = 'student_kpi';
$fetch_result = $raj_modelobject->DataView($sql, $db_user, $db_pass, $db_Name);
header('Content-type: application/json');
foreach($fetch_result as $data)
{
    $information['name']=$data['name'];
    //echo json_encode($data);
    $test = $data['s_id'];
    $sql = "select attendance FROM student_attendance WHERE s_id='$test' ";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
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
        //
        //
        //echo $cnt_one;
    }
    $total_class = $cnt_one + $cnt_zero;
    $atten_score = ($cnt_one * 5) / $total_class;
    //$atten_score;
    $total_score += $atten_score;
    $information['atten']=$atten_score;

    $stu_id = $data['s_id'];
    $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $small_test = $raj_modelobject->DataView2($sql, $db_user, $db_pass, $db_Name);
    $cnt_one = 0;
    $cnt_zero = 0;
    foreach ($small_test as $st) {
        $small_score = $st['SUM(actual)'] / $st['COUNT(*)'];
        $small_score_final=number_format((float)$small_score, 2, '.', '');


    }
    $total_score += $small_score_final;
    $information['small_test']=$small_score_final;

    $stu_id2 = $data['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='FT'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($final_test as $fft) {
        $final_score = $fft['SUM(actual)'] / $fft['COUNT(*)'];
        $final_score_final=number_format((float)$final_score, 2, '.', '');
        //echo $final_score;
    }
    $total_score += $final_score_final;
    $information['final-score']=$final_score_final;

    $stu_id2 = $data['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='ASS'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($assignment as $ass) {
        $final_ass = $ass['SUM(actual)'] / $ass['COUNT(*)'];
        $final_ass_final=number_format((float)$final_ass, 2, '.', '');
        //echo $final_ass;
    }
    $total_score += $final_ass_final;
    $information['assignment']=$final_ass_final;

    $stu_id2 = $data['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $project_final = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($project_final as $pr) {
        $final_pr = $pr['SUM(actual)'] / $pr['COUNT(*)'];
        $final_pr_final=number_format((float)$final_pr, 2, '.', '');
        // echo $final_pr;
    }
    $total_score += $final_pr_final;
    $information['final_project']=$final_pr_final;


    $ws_value=0;
    $stu_id = $data['s_id'];
    $today = date('Y-m-d');
    $sql2 = "select hours FROM worksnap WHERE s_id='$stu_id' AND DATE(entry_date)='$today' ";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $worksnap_hour = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($worksnap_hour as $ws)
    {
        $hours=$ws['hours'];
        if($hours >= 3)
        {
            $ws_value=15;
        }
        elseif($hours >= 2.5 && $hours < 3)
        {
            $ws_value=12;
        }
        elseif($hours >= 2 && $hours < 2.5)
        {
            $ws_value=10;
        }
        elseif($hours >= 1.5 && $hours < 2)
        {
            $ws_value=8;
        }
        elseif($hours >= 1 && $hours < 1.5)
        {
            $ws_value=5;
        }
        elseif($hours >= 0.5 && $hours < 1)
        {
            $ws_value=3;
        }
        else
        {
            $ws_value=0;
        }
    }
    $information['worksnap']=$ws_value;
    $total_score += $ws_value;
}
echo json_encode($information);
?>
