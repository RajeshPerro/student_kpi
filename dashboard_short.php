
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
$frm_date=$_GET['frm_date'];
$to_date=$_GET['to_date'];
$skill_type=$_GET['skill_type'];
$skill_name=$_GET['skill_name'];
//echo $Batch.$Group;
include('rajesh_model.php');
if(($Batch !='' && $Group !='') && ($frm_date =='' && $to_date=='' && $skill_type=='' && $skill_name==''))
{
    $sql="select * FROM student_assessment WHERE b_id='$Batch' AND g_id='$Group' GROUP BY s_id";
}
elseif((($Batch !='' && $Group !='') && ($frm_date !='' && $to_date!='')) && ($skill_type=='' && $skill_name==''))
{
$sql="select * FROM student_assessment WHERE (
(b_id='$Batch' AND g_id='$Group') AND (entry_date BETWEEN '$frm_date' AND '$to_date')
) GROUP BY s_id";
}
elseif((($Batch !='' && $Group !='')&&($skill_type!='' && $skill_name!=''))&&($frm_date =='' && $to_date==''))
{
$sql="select * FROM student_assessment WHERE (
(b_id='$Batch' AND g_id='$Group') AND (skill_type='$skill_type' AND skill_name='$skill_name')
)GROUP BY s_id";
}
else
{
    $sql="select * FROM student_assessment WHERE (
(b_id='$Batch' AND g_id='$Group') AND (entry_date BETWEEN '$frm_date' AND '$to_date') AND (skill_type='$skill_type' AND skill_name='$skill_name')
)GROUP BY s_id";
}
//$sql="select * FROM student_assessment WHERE (
//(b_id='$Batch' AND g_id='$Group') AND (entry_date BETWEEN '$frm_date' AND '$to_date') AND (skill_type='$skill_type' AND skill_name='$skill_name')
//)GROUP BY s_id";

$db_user='root';
$db_pass='root123';
$db_Name='student_kpi';
$sl=0;
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
echo ('<table class="table table-hover table-striped table-bordered"><thead><tr><th>SL#</th><th>Id</th><th>Name</th><th>Attendance</th><th>Small Test</th><th>Final Test</th><th>Assignments</th><th>Project</th><th>Worksnap</th><th>Date</th><th>Skill Type</th><th>Skill</th><th>Total</th></tr></thead><tbody>');
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
    $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND (exam_type='ST' AND skill_name='$skill_name')";
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
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND (exam_type='FT' AND skill_name='$skill_name')";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($final_test as $fft) {
        $final_score = $fft['SUM(actual)'] / $fft['COUNT(*)'];
        echo '<td>'. number_format((float)$final_score, 2, '.', '').'</td>';
        //echo $final_score;
    }
    if($value['skill_name']==$skill_name)
    {
        //echo $skill_name;
        $total_score += $final_score;
    }

//...................Assignment Score..................

    $stu_id2 = $value['s_id'];
    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND (exam_type='ASS' AND skill_name='$skill_name')";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($assignment as $ass) {
        $final_ass = $ass['SUM(actual)'] / $ass['COUNT(*)'];
        echo '<td>'.number_format((float)$final_ass, 2, '.', '').'</td>';
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
    $ws_value=0;
    $stu_id = $value['s_id'];
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
    echo '<td>'.$ws_value.'</td>';
    $total_score += $ws_value;

 //........................Entry Date.........................
 echo '<td>'.$value['entry_date'].'</td>';

//..........................Skill Name..................
 echo '<td>'.$value['skill_type'].'</td>';
//..........................Skill Name..................
    echo '<td>'.$value['skill_name'].'</td>';
//..........................Total Score.......................
    echo'<td class="final_result">'.number_format((float)$total_score, 2, '.', '').'</td>';
    //echo $total_score;
    $total_score = 0;

    echo "</tr>";

}
echo '</tbody></table>';
?>
