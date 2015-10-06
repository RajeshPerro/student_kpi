<!DOCTYPE html>
<html>
<head>
    <title>EDU KPI :: Dashboard </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/pagination_style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/batchgroup.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custome.js"></script>
    <script type="text/javascript">
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/4/15
 * Time: 2:46 PM
 */

$total_score = 0;
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_Name = 'student_kpi';
session_start();
$userName = $_GET['user'];
$token = $_GET['token'];
$_SESSION['user'] = $userName;
$_SESSION['token'] = $token;

//Pagination code start
function displayPaginationBelow($per_page,$page){
    //echo "UserName".$GLOBALS['userName'];
    $page_url_test="user=".$GLOBALS['userName']."&token=".$GLOBALS['token'];
     $page_url="?".$page_url_test."&";
     $query = "SELECT COUNT(*) as totalCount FROM student_assessment GROUP BY s_id";
     $rec = $GLOBALS['raj_modelobject']->DataView($query, $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_Name']);
    $test=count($rec);
    $total = $test;
    $adjacents = "2";

     $page = ($page == 0 ? 1 : $page);
     $start = ($page - 1) * $per_page;

     $prev = $page - 1;
     $next = $page + 1;
     $setLastpage = ceil($total/$per_page);
     $lpm1 = $setLastpage - 1;

     $setPaginate = "";
     if($setLastpage > 1)
     {
         $setPaginate .= "<ul class='setPaginate'>";
         $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
         if ($setLastpage < 7 + ($adjacents * 2))
         {
             for ($counter = 1; $counter <= $setLastpage; $counter++)
             {
                 if ($counter == $page)
                     $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                 else
                     $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
             }
         }
         elseif($setLastpage > 5 + ($adjacents * 2))
         {
             if($page < 1 + ($adjacents * 2))
             {
                 for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                 {
                     if ($counter == $page)
                         $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                     else
                         $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                 }
                 $setPaginate.= "<li class='dot'>...</li>";
                 $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                 $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
             }
             elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
             {
                 $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                 $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                 $setPaginate.= "<li class='dot'>...</li>";
                 for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                 {
                     if ($counter == $page)
                         $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                     else
                         $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                 }
                 $setPaginate.= "<li class='dot'>..</li>";
                 $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                 $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
             }
             else
             {
                 $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                 $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                 $setPaginate.= "<li class='dot'>..</li>";
                 for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
                 {
                     if ($counter == $page)
                         $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                     else
                         $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                 }
             }
         }

         if ($page < $counter - 1){
             $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
             $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
         }else{
             $setPaginate.= "<li><a class='current_page'>Next</a></li>";
             $setPaginate.= "<li><a class='current_page'>Last</a></li>";
         }

         $setPaginate.= "</ul>\n";
     }


     return $setPaginate;
 }
if(isset($_GET["page"]))
    $page = (int)$_GET["page"];

else
    $page = 1;

$setLimit = 10;

$pageLimit = ($page * $setLimit) - $setLimit;

//pagination code end
$sql = "select * FROM student_assessment GROUP BY s_id LIMIT ".$pageLimit." , ".$setLimit;

$fetch_result = $raj_modelobject->DataView($sql, $db_user, $db_pass, $db_Name);
//echo $userName."and".$token;
//
//
if ($_SESSION['user'] == null && $_SESSION['token'] == null) {
    echo("<script>location.href='sorry.php'</script>");
}
else{
?>
<div class="container-fluid">
    <!-- Header Section -->
    <div id="header">

        <!-- Navigation -->
        <nav class="navbar navbar-default padding-top-bottom">
            <div class="container">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="col-xs-4 col-sm-12">
                        <a class="navbar-brand logo" href="#">
                            <img src="images/ct.png" alt="CT logo" class="img-responsive" width="100" height="100">
                        </a>
                    </div>
                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!--                        <ul class="nav navbar-nav navbar-left">-->
                    <!--                            <li><a href="dashboard.php?user=--><?php //echo $_SESSION['user']
                    ?><!-- &token=--><?php //echo $_SESSION['token']
                    ?><!--">-->
                    <!--                                    <span class="glyphicon glyphicon-dashboard"></span>-->
                    <!--                                    Dashboard</a></li>-->
                    <!--                            <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span>-->
                    <!--                                    Sign Out</a></li>-->
                    <!--                            <li><a href="dashboard.php"><span class=""></span>-->
                    <?php //echo $_SESSION['user'];
                    ?><!--</a></li>-->
                    <!--                        </ul>-->
                    <?php include('header.php'); ?>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>

    <!-- Automated Attendance Section -->

    <br><br>


    <div class="container">


        <!--<div class="row">

             <ul class="breadcrumb">
                 <li ><a href="#"> Dashboard</a></li>
                 <li class="active">Attendance</li>
             </ul>
         </div> -->

        <div class="row">
            <div class="back">
                <div class="mainbody">
                    <div class="row custom-border">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3 class="pull-left">Dashboard</h3>
                            </div>
                            <!--    <div class="col-md-6">
                                <h3 class="pull-right">
                                    <input readonly  id="e_date" class="form-control input-lg" type="text" name="entry_date" value="">
                                </h3>
                            </div>-->
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12">
                        <br><br>

                        <form action="controller.php" method="post">
                            <div class="col-xs-12 col-sm-12">
                                <div class="col-xs-12 col-sm-5">
                                    <select class="dashboard-batch" name="" id="batch_id" onchange="fuck()">

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <select class="dashboard-batch" id="group_id" onchange="fuck()">

                                    </select>
                                </div class="col-xs-12 col-sm-2">
                                <div class="col-xs-12 col-sm-2">
                                    <input readonly id="e_date" class="form-control" type="text" name="entry_date"
                                           value="">
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="col-xs-12 col-sm-3">
                                        <span>From</span>
                                        <input class="form-control date-value" type="text" id="from-date"
                                               name="from_date">

                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <span>to</span>
                                        <input class="form-control date-value" type="text" id="to-date"
                                               name="from_date">

                                    </div>

                                    <div class="col-xs-12 col-sm-3 drop-down-space">
                                        <span>Skill type</span>
                                        <select id="front_end"  name="skill_type" class="skill-set">
                                            <option value="#" class="default1" selected>Select Skill Type</option>
                                            <option value="Front End">Front End</option>
                                            <option value="Back End">Back End</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 drop-down-space">
                                        <span>Skill</span>
                                        <select name="skill_name" id="skill-name" class="skill-set">
                                            <option value="#" class="default" selected>Select Skill
                                            </option>
                                            <option value="HTML and CSS" class="fe">HTML && CSS</option>
                                            <option value="Bootstrap" class="fe">Bootstrap</option>
                                            <option value="Javascript and jQuery" class="fe">Javascript
                                                & jQuery
                                            </option>
                                            <option value="PHP and MySQL" class="be">PHP & MySQL
                                            </option>
                                            <option value="WordPress" class="be">WordPress</option>
                                        </select>
                                    </div>
                                </div>

                                <!--                                    <div class="col-xs-12 col-sm-2">-->
                                <!--                                        <input readonly id="e_date" class="form-control" type="text" name="entry_date"-->
                                <!--                                               value="">-->
                                <!--                                    </div>-->
                            </div>


                            <div class="container">
                                <div id="loadingDiv"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="bs-example table_back table_padding"
                                             data-example-id="contextual-table">
                                            <!--                                                <div class="table-responsive">-->
                                            <!--                                                    <table class="table table-hover table-striped table-bordered">-->
                                            <!---->
                                            <!--                                                        <tbody>-->
                                            <!--                                                        </tbody>-->
                                            <!--                                                    </table>-->
                                            <!--                                                </div>-->
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped table-bordered"
                                                       id="dashboard-data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Attendance</th>
                                                        <th>Small Test</th>
                                                        <th>Final Test</th>
                                                        <th>Assignments</th>
                                                        <th>Project</th>
                                                        <th>Worksnap</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $id = 1;
                                                    foreach ($fetch_result as $row) {

                                                        ?>
                                                        <tr>


                                                            <td><?php echo $id++; ?></td>
                                                            <td><?php echo $row['s_id']; ?></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php $test = $row['s_id'];
                                                                $sql = "select attendance FROM student_attendance WHERE s_id='$test' ";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
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
                                                                echo $atten_score;
                                                                $total_score += $atten_score;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $stu_id = $row['s_id'];
                                                                $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
                                                                $db_Name = 'student_kpi';
                                                                $small_test = $raj_modelobject->DataView2($sql, $db_user, $db_pass, $db_Name);
                                                                $cnt_one = 0;
                                                                $cnt_zero = 0;
                                                                foreach ($small_test as $st) {
                                                                    $small_score = $st['SUM(actual)'] / $st['COUNT(*)'];
                                                                    echo number_format((float)$small_score, 2, '.', '');


                                                                }
                                                                $total_score += $small_score;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $stu_id2 = $row['s_id'];
                                                                $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='FT'";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
                                                                $db_Name = 'student_kpi';
                                                                $final_test = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

                                                                foreach ($final_test as $fft) {
                                                                    $final_score = $fft['SUM(actual)'] / $fft['COUNT(*)'];
                                                                    echo number_format((float)$final_score, 2, '.', '');
                                                                    //echo $final_score;
                                                                }
                                                                $total_score += $final_score;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $stu_id2 = $row['s_id'];
                                                                $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='ASS'";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
                                                                $db_Name = 'student_kpi';
                                                                $assignment = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

                                                                foreach ($assignment as $ass) {
                                                                    $final_ass = $ass['SUM(actual)'] / $ass['COUNT(*)'];
                                                                    echo number_format((float)$final_ass, 2, '.', '');
                                                                    //echo $final_ass;
                                                                }
                                                                $total_score += $final_ass;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $stu_id2 = $row['s_id'];
                                                                $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
                                                                $db_Name = 'student_kpi';
                                                                $project_final = $raj_modelobject->DataView2($sql2, $db_user, $db_pass, $db_Name);

                                                                foreach ($project_final as $pr) {
                                                                    $final_pr = $pr['SUM(actual)'] / $pr['COUNT(*)'];
                                                                    echo number_format((float)$final_pr, 2, '.', '');
                                                                    // echo $final_pr;
                                                                }
                                                                $total_score += $final_pr;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $ws_value = 0;
                                                                $stu_id = $row['s_id'];
                                                                $today = date('Y-m-d');
                                                                $sql2 = "select hours FROM worksnap WHERE s_id='$stu_id' AND DATE(entry_date)='$today' ";
                                                                $db_user =$database_user;
                                                                $db_pass =$databse_pass;
                                                                $db_Name = 'student_kpi';
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
                                                                echo $ws_value;
                                                                $total_score += $ws_value;
                                                                ?></td>

                                                            <td class="final_result">
                                                                <?php
                                                                echo number_format((float)$total_score, 2, '.', '');

                                                                //echo $total_score;
                                                                $total_score = 0;
                                                                ?>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>

                                                </table>
                                                <input class="btn btn-info" type="button" onclick="tableToExcel('dashboard-data-table','Weekly Report')" value="Export to Excel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <?php
                        // Call the Pagination Function to load Pagination.

                        echo displayPaginationBelow($setLimit,$page);
                        ?>


                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<section id="footer" class="padding-top-bottom">
    <div class="container">

        <div class="col-md-12 text-center">
            <p>© 2015 | Powered by Mentor Team, Coderstrust </p>

            <p>All Rights Reserved</p>
        </div>

    </div>
</section>

<!--//Script for pagination start-->
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-38304687-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!--//Script for pagination END-->
</body>
</html>
<?php
}
?>



