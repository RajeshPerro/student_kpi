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
//$sql="select * FROM student_assessment WHERE s_id='$student_id'";
//$db_user = 'root';
//$db_pass = 'root123';
//$db_Name = 'student_kpi';
//
//value assign
$htmlCss = 0;
$bootstrap = 0;
$jsjquery = 0;
$phpsql = 0;
$wordpress = 0;
//$fetch_result = $raj_modelobject->DataView($sql, $db_user, $db_pass, $db_Name);
//
//header('Content-type: application/json');
//foreach($fetch_result as $data)
//{
//    $information['name']=$data['name'];
    //echo json_encode($data);
    $test = $student_id;
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
//    $information['atten']=$atten_score;


    // getting small test
    $stu_id = $student_id;
        $sql = "SELECT AVG( actual ) , skill_name FROM student_assessment WHERE  s_id='$stu_id' AND exam_type =  'ST' GROUP BY skill_name";
    $db_user = 'root';
    $db_pass = 'root123';
    $db_Name = 'student_kpi';
    $small_test = $raj_modelobject->DataView2($sql, $db_user, $db_pass, $db_Name);
    $cnt_one = 0;
    $cnt_zero = 0;

//    print_r($small_test);
    foreach ($small_test as $st) {
        $small_score = $st['AVG( actual )'];
        $skill_naam = $st['skill_name'];
        $small_score_final=number_format((float)$small_score, 2, '.', '');

//        echo $st['AVG( actual )'];
//        echo $st['skill_name'];


        if($skill_naam=="HTML and CSS")
        {

            $htmlCss+=$small_score_final;
//            echo "got html css: ".$htmlCss;
        }
        else if($skill_naam=="Bootstrap")
        {

            $bootstrap+=$small_score_final;
//            echo "got Bootstrap".$bootstrap;
        }
        else if($skill_naam == "Javascript and jQuery")
        {
            $jsjquery+=$small_score_final;
//            echo "got js".$jsjquery;
        }
        else if($skill_naam == "PHP & MySQL")
        {
            $phpsql+=$small_score_final;
//            echo "got js".$phpsql;
        }
        else if($skill_naam == "WordPress")
        {
            $wordpress+=$small_score_final;
//            echo "got js".$wordpress;
        }


    }



//    $total_score += $small_score_final;
//    $information['small_test']=$small_score_final;

    //end of small test

    //start for final test

    $stu_id2 = $student_id;
    $sql2 = "SELECT AVG( actual ) , skill_name FROM student_assessment WHERE  s_id='$stu_id' AND exam_type =  'FT' GROUP BY skill_name";
//    $db_user = 'root';
//    $db_pass = 'root123';
//    $db_Name = 'student_kpi';
    $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($final_test as $ft) {
        $final_score = $ft['AVG( actual )'];
        $skill_naam = $ft['skill_name'];
        $final_score_final=number_format((float)$final_score, 2, '.', '');

//        echo $st['AVG( actual )'];
//        echo $st['skill_name'];


    if($skill_naam=="HTML and CSS")
    {

        $htmlCss+=$final_score_final;
//        echo "got html css: ".$htmlCss;
    }
    else if($skill_naam=="Bootstrap")
    {

        $bootstrap+=$final_score_final;
//        echo "got Bootstrap".$bootstrap;
    }
    else if($skill_naam == "Javascript and jQuery")
    {
        $jsjquery+=$final_score_final;
//        echo "got js".$jsjquery;
    }
    else if($skill_naam == "PHP & MySQL")
    {
        $phpsql+=$final_score_final;
//        echo "got js".$phpsql;
    }
    else if($skill_naam == "WordPress")
    {
        $wordpress+=$final_score_final;
//        echo "got js".$wordpress;
    }


}

    //end of final test

    //start of assignment

    $stu_id2 = $student_id;
    $sql2 = "SELECT AVG( actual ) , skill_name FROM student_assessment WHERE  s_id='$stu_id' AND exam_type =  'ASS' GROUP BY skill_name";

    $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($assignment as $ass) {

        $ass_score = $ass['AVG( actual )'];
        $skill_naam = $ass['skill_name'];
        $ass_score_final=number_format((float)$ass_score, 2, '.', '');

//        echo $st['AVG( actual )'];
//        echo $st['skill_name'];


        if($skill_naam=="HTML and CSS")
        {

            $htmlCss+=$ass_score_final;
//            echo "got html css: ".$htmlCss;
        }
        else if($skill_naam=="Bootstrap")
        {

            $bootstrap+=$ass_score_final;
//            echo "got Bootstrap".$bootstrap;
        }
        else if($skill_naam == "Javascript and jQuery")
        {
            $jsjquery+=$ass_score_final;
//            echo "got js".$jsjquery;
        }
        else if($skill_naam == "PHP & MySQL")
        {
            $phpsql+=$ass_score_final;
//            echo "got js".$phpsql;
        }
        else if($skill_naam == "WordPress")
        {
            $wordpress+=$ass_score_final;
//            echo "got js".$wordpress;
        }

    }



    //end of assignment

    //start of project

    $stu_id2 = $student_id;
    $sql2 = "SELECT AVG( actual ) , skill_name FROM student_assessment WHERE  s_id='$stu_id' AND exam_type =  'PR' GROUP BY skill_name";

    $project_final = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

    foreach ($project_final as $pr) {
        $pr_score = $pr['AVG( actual )'];
        $skill_naam = $pr['skill_name'];
        $pr_score_final=number_format((float)$pr_score, 2, '.', '');

//        echo $st['AVG( actual )'];
//        echo $st['skill_name'];


        if($skill_naam=="HTML and CSS")
        {

            $htmlCss+=$pr_score_final;
//            echo "got html css: ".$htmlCss;
        }
        else if($skill_naam=="Bootstrap")
        {

            $bootstrap+=$pr_score_final;
//            echo "got Bootstrap".$bootstrap;
        }
        else if($skill_naam == "Javascript and jQuery")
        {
            $jsjquery+=$pr_score_final;
//            echo "got js".$jsjquery;
        }
        else if($skill_naam == "PHP & MySQL")
        {
            $phpsql+=$pr_score_final;
//            echo "got js".$phpsql;
        }
        else if($skill_naam == "WordPress")
        {
            $wordpress+=$pr_score_final;
//            echo "got js".$wordpress;
        }
    }


    //end of project

    $ws_value=0;
    $stu_id = $student_id;
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
//    $information['worksnap']=$ws_value;
    $total_score += $ws_value;

$htmlCss += ($atten_score + $ws_value);
$bootstrap += ($atten_score + $ws_value);
$jsjquery+= ($atten_score + $ws_value);
$phpsql+= ($atten_score + $ws_value);
$wordpress+= ($atten_score + $ws_value);

$information['htmlcss']=$htmlCss;
$information['bootstrap']=$bootstrap;
$information['js']=$jsjquery;
$information['php']=$phpsql;
$information['wordpress']=$wordpress;
//}
//print_r($information) ;
echo json_encode($information);
?>
