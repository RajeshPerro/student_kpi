
<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/8/15
 * Time: 2:31 PM
 */
$total_score=0;
$test =array();
$Batch=$_GET['batch'];
$Group=$_GET['group'];
//echo $Batch.$Group;
include('rajesh_model.php');
$sql="select * FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group' GROUP BY s_id";
$db_user='root';
$db_pass='root123';
$db_Name='student_kpi';
$sl=0;
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
foreach ($fetch_result as $key => $value) {
    $sl++;
    echo '<tr>';
    echo '<td>'.$sl.'</td>';
    echo '<td>'.$value['s_id'].'</td>';
    echo '<td>'.$value['name'].'</td>';

//......................Attendance Score..........................

    $test = $value['s_id'];
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
    echo '<td>'.$atten_score.'</td>';

//........................Small Test....................

    $stu_id = $value['s_id'];
    $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $small_test = $raj_modelobject->DataView2($sql, $db_user, $db_pass, $db_Name);
    $cnt_one = 0;
    $cnt_zero = 0;
    foreach ($small_test as $st) {
        $small_score = $st['SUM(actual)'] / $st['COUNT(*)'];
        echo '<td>'. number_format((float)$small_score, 2, '.', '').'</td>';


    }
    $total_score += $small_score;

//....................Final Test Score........................

    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='FT'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($final_test as $fft) {
        $final_score = $fft['SUM(actual)'] / $fft['COUNT(*)'];
        echo '<td>'. number_format((float)$final_score, 2, '.', '').'</td>';
        //echo $final_score;
    }
    $total_score += $final_score;

//...................Assignment Score..................

    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='ASS'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($assignment as $ass) {
        $final_ass = $ass['SUM(actual)'] / $ass['COUNT(*)'];
        echo number_format((float)$final_ass, 2, '.', '');
        //echo $final_ass;
    }
    $total_score += $final_ass;
//.......................Final Project Score...................
    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $project_final = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($project_final as $pr) {
        $final_pr = $pr['SUM(actual)'] / $pr['COUNT(*)'];
        echo '<td>'.number_format((float)$final_pr, 2, '.', '').'</td>';
        // echo $final_pr;
    }
    $total_score += $final_pr;
//..........................Worksnap Score.....................
    $ws = 5;
    echo '<td>'.$ws.'</td>';
    $total_score += $ws;
//..........................Total Score.......................
    echo'<td class="final_result">'.number_format((float)$total_score, 2, '.', '').'</td>';
    //echo $total_score;
    $total_score = 0;

    echo "</tr>";
}

//print_r($test);
//$jsonstring = json_encode($test);
//echo $jsonstring;

?>
