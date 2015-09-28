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
$sql="select * FROM student_attendance WHERE b_id='$Batch' AND g_id='$Group' AND entry_date='$Date' GROUP BY s_id";
$db_Name='student_kpi';
$sl=0;
$atten_test='';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
foreach ($fetch_result as $key => $value)
{
    $sl++;
    echo '<tr>';
//    echo '<td>'.$sl.'</td>';
    echo '<td>'.'<input size="20" readonly class="form-control input-sm transparent" type="text" name="s_id[]" value="'.$value["s_id"].'">'.'</td>';
    echo '<td>'.'<input size="30" readonly class="form-control input-sm transparent" type="text" name="name[]" value="'.$value['name'].'">'.'</td>';
    if($value['attendance']==1)
    {
        $atten_test='checked';
    }
    echo '<td>'.'<input type="checkbox" name="attendance[]" value="'.$value['attendance'].'" '.$atten_test.'> Yes '.'</td>';
    echo '<td><input type="checkbox" name="attendance[]" value="'.$value['attendance'].'"> No </td>';
    echo'</tr>';
}
?>