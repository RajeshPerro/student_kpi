<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/28/15
 * Time: 10:55 AM
 */
$Batch=$_GET['batch'];
$Group=$_GET['group'];
$Date=$_GET['date'];
//echo $Batch.$Group.$Date;
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql_date="select entry_date FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group'  GROUP BY entry_date DESC  LIMIT 8";
$sql="select * FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group'  ORDER BY entry_date DESC ";
$db_Name='student_kpi';

$fetch_date=$raj_modelobject->DataView($sql_date,$db_user,$db_pass,$db_Name);
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);


foreach ($fetch_date as $key => $date_value) {
    echo('<table class="table table-hover table-striped table-bordered"><thead><tr><th>Student ID</th><th>Student Name</th><th>' . $date_value["entry_date"] . '</th></tr></thead><tbody>');
    echo '<tr>';
    $temp=$date_value["entry_date"];

    foreach ($fetch_result as $key => $value) {
        echo '<td>' .'<a href="student_details.php?id='.$value["s_id"].'">'. $value["s_id"] . '</a>'.'</td>';
        echo '<td>' . $value['name'] . '</td>';


        if ($value['attendance'] == 1) {
            echo '<td style="color:green">' . "Present" . '</td>';

        } else {

            echo '<td style="color:red">' . "Absent" . '</td>';
//        echo '<td>'.'<input readeonly  type="checkbox" name="attendance[]" value="1"> Yes '.'</td>';
//        echo '<td><input readeonly type="checkbox" name="attendance[]" value="'.$value['attendance'].'"'.checked.'> No </td>';
        }
//
//    echo '<td>'.'<input type="checkbox" name="attendance[]" value="'.$value['attendance'].'" '.$atten_test.'> Yes '.'</td>';
//    echo '<td><input type="checkbox" name="attendance[]" value="'.$value['attendance'].'"> No </td>';
        echo '</tr>';

    }
}
echo '</tbody></table>';
?>