<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/17/15
 * Time: 12:17 PM
 */
$student_id=$GET['std_id'];
$last_week = "2015-09-17";
$temp=$last_week;
$last_week = strtotime($last_week);
$last_week = strtotime("-7 day", $last_week);
$a=date('Y-m-d', $last_week);
//echo "Last Week=".date('Y-m-d', $last_week)."<br><br><br>";
$previous_week=strtotime("-6 day", $last_week);
$b=date('Y-m-d', $previous_week);
//echo "Previous=".date('Y-m-d', $previous_week)."<br><br><br>";

echo "First Query=".$b." to ".$a."<br><br><br>";

$xx=strtotime($temp);
$xx=strtotime("-6 day", $xx);
$c=date('Y-m-d', $xx);
echo "second Query=".$c." to ".$temp;


?>