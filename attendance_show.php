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
//$sql_date="select entry_date FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group'  GROUP BY entry_date DESC  LIMIT 8";
//$sql="select * FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group'  ORDER BY entry_date DESC ";

$test = "SELECT  s_id ,  name , GROUP_CONCAT( attendance ) as Attendance , GROUP_CONCAT(  entry_date ) as Entry_Date
FROM  student_attendance
WHERE  b_id='$Batch' AND g_id='$Group'
GROUP BY  s_id";

$db_Name='student_kpi';

//$fetch_date=$raj_modelobject->DataView($sql_date,$db_user,$db_pass,$db_Name);
//$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);

$test_fetch_result=$raj_modelobject->DataView($test,$db_user,$db_pass,$db_Name);

//print_r($test_fetch_result);
echo('<table class="table table-hover table-striped table-bordered"><thead><tr><th>Student ID</th><th>Student Name</th>');

//foreach($test_fetch_result as $key => $row)
//{
//    $value=explode(',', $row['Entry_Date']);
//
//}
$value_c=count(explode(',', $test_fetch_result[0]['Entry_Date']));
$value=explode(',', $test_fetch_result[0]['Entry_Date']);
for($i = 0; $i < $value_c; $i++)
{
//    echo $value[$i];
    echo '<th>'.$value[$i].'</th>';
}

echo '</tr></thead><tbody>';

foreach($test_fetch_result as $key => $row)
{

    echo '<tr>';
    echo '<td>' .'<a href="student_details.php?id='.$row["s_id"].'">'. $row["s_id"] . '</a>'.'</td>';
    echo '<td>'.$row['name'].'</td>';
//    echo'<td>'. $row['Entry_Date'].'|'.'</td>';
    $value=explode(',', $row['Attendance']);
    for($j =0 ;$j< count($value); $j++)
    {
        if($value[$j] == 1)
        echo '<td style="color:green">Present</td>';
        else
            echo '<td style="color:red">Absent</td>';
    }

    echo '</tr>';

}

//echo $test_fetch_result;

//foreach ($fetch_date as $key => $date_value) {
//    echo('<table class="table table-hover table-striped table-bordered"><thead><tr><th>Student ID</th><th>Student Name</th><th>' . $date_value["entry_date"] . '</th></tr></thead><tbody>');
//    echo '<tr>';
//    $temp=$date_value["entry_date"];
//
//    foreach ($fetch_result as $key => $value) {
//        echo '<td>' .'<a href="student_details.php?id='.$value["s_id"].'">'. $value["s_id"] . '</a>'.'</td>';
//        echo '<td>' . $value['name'] . '</td>';
//
//
//        if ($value['attendance'] == 1) {
//            echo '<td style="color:green">' . "Present" . '</td>';
//
//        } else {
//
//            echo '<td style="color:red">' . "Absent" . '</td>';
////        echo '<td>'.'<input readeonly  type="checkbox" name="attendance[]" value="1"> Yes '.'</td>';
////        echo '<td><input readeonly type="checkbox" name="attendance[]" value="'.$value['attendance'].'"'.checked.'> No </td>';
//        }
////
////    echo '<td>'.'<input type="checkbox" name="attendance[]" value="'.$value['attendance'].'" '.$atten_test.'> Yes '.'</td>';
////    echo '<td><input type="checkbox" name="attendance[]" value="'.$value['attendance'].'"> No </td>';
//        echo '</tr>';
//
//    }
//}
echo '</tbody></table>';
?>