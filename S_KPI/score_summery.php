<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/4/15
 * Time: 12:42 AM
 */
$total_score=0;
include('rajesh_model.php');
$sql="select * FROM student_assessment GROUP BY s_id";
$db_user='root';
$db_pass='root123';
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
?>
<html>
    <head>
        <title>view</title>
    </head>
    <body>
    <center>
        <table border="1">
            <th>Student id</th>
            <th>Name</th>
            <th>Attendance</th>
            <th>Small Test</th>
            <th>Final Test</th>
            <th>Assignment</th>
            <th>Project(15%)+Codacy(5%)</th>
            <th>Worksnap</th>
            <th>Total Score</th>
            <?php
            foreach ($fetch_result as $row) {
                ?>
                <tr>
                    <td><?php echo $row['s_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php $test = $row['s_id'];
                        $sql="select attendance FROM student_attendance WHERE s_id='$test' ";
                        $db_user='root';
                        $db_pass='root123';
                        $db_Name='student_kpi';
                        $attendance=$raj_modelobject->DataView2($sql,$db_user,$db_pass,$db_Name);
                        $cnt_one=0 ;
                        $cnt_zero=0;
                        foreach ($attendance as $atten)
                        {
                            $xx = $atten['attendance'];
                            //echo $xx;
                            if($xx == 1)
                            {
                                $cnt_one++;
                            }
                            else
                            {
                              $cnt_zero++;
                            }
                           //
                            //
                            //echo $cnt_one;
                        }
                        $total_class=$cnt_one+$cnt_zero;
                        $atten_score=($cnt_one*5)/$total_class;
                        echo $atten_score;
                        $total_score+=$atten_score;
                        ?>
                    </td>
                    <td>
                        <?php
                        $stu_id = $row['s_id'];
                        $sql="select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
                        $db_user='root';
                        $db_pass='root123';
                        $db_Name='student_kpi';
                        $small_test=$raj_modelobject->DataView2($sql,$db_user,$db_pass,$db_Name);
                        $cnt_one=0 ;
                        $cnt_zero=0;
                        foreach ($small_test as $st)
                        {
                            $small_score=$st['SUM(actual)']/$st['COUNT(*)'];
                             echo $small_score;

                        }
                        $total_score+=$small_score;
                        ?>
                    </td>
                    <td>
                        <?php
                        $stu_id2 = $row['s_id'];
                        $sql2="select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='FT'";
                        $db_user='root';
                        $db_pass='root123';
                        $db_Name='student_kpi';
                        $final_test=$raj_modelobject->DataView2($sql2,$db_user,$db_pass,$db_Name);

                        foreach ($final_test as $fft)
                        {
                            $final_score=$fft['SUM(actual)']/$fft['COUNT(*)'];
                            echo $final_score;
                        }
                        $total_score+=$final_score;
                        ?>
                    </td>
                    <td>
                        <?php
                        $stu_id2 = $row['s_id'];
                        $sql2="select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='ASS'";
                        $db_user='root';
                        $db_pass='root123';
                        $db_Name='student_kpi';
                        $assignment=$raj_modelobject->DataView2($sql2,$db_user,$db_pass,$db_Name);

                        foreach ($assignment as $ass)
                        {
                            $final_ass=$ass['SUM(actual)']/$ass['COUNT(*)'];
                            echo $final_ass;
                        }
                        $total_score+=$final_ass;
                        ?>
                    </td>
                    <td>
                        <?php
                        $stu_id2 = $row['s_id'];
                        $sql2="select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
                        $db_user='root';
                        $db_pass='root123';
                        $db_Name='student_kpi';
                        $project_final=$raj_modelobject->DataView2($sql2,$db_user,$db_pass,$db_Name);

                        foreach ($project_final as $pr)
                        {
                            $final_pr=$pr['SUM(actual)']/$pr['COUNT(*)'];
                            echo $final_pr;
                        }
                        $total_score+=$final_pr;
                        ?>
                    </td>
                    <td><?php $ws=5;
                        echo $ws;
                        $total_score+=$ws;
                        ?></td>
                    <td>
                        <?php echo $total_score;
                        $total_score=0;
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
    </body>
</html>