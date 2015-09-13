    <!DOCTYPE html>
    <html>
    <head>
        <title>EDU KPI :: Dashboard </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/batchgroup.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custome.js"></script>
    </head>
    <body>

    <?php
    /**
     * Created by PhpStorm.
     * User: rajesh
     * Date: 9/4/15
     * Time: 2:46 PM
     */

    $total_score=0;
    include('rajesh_model.php');
    $sql="select * FROM student_assessment GROUP BY s_id";
    $db_user='root';
    $db_pass='root123';
    $db_Name='student_kpi';
    $fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
    $userName = $_GET['user'];//"<script>document.write(localStorage.getItem('username'))</script>";
    $token =$_GET['token'];//"<script>document.write(localStorage.getItem('usertoken'))</script>";
    //echo $userName."and".$token;

    $_SESSION['user']=$userName;
    $_SESSION['token']=$token;
    if($_SESSION['user']==null && $_SESSION['token']==null ) {
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
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
                                    <span class="glyphicon glyphicon-dashboard"></span>
                                    Dashboard</a></li>
                            <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a>
                            </li>
                            <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a>
                            </li>
                            <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span>
                                    Sign Out</a></li>
                            <li><a href="dashboard.php"><span class=""></span><?php echo $_SESSION['user']; ?></a></li>
                        </ul>
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
                                    </div>
                                    <div class="col-xs-12 col-sm-2">
                                        <input readonly id="e_date" class="form-control" type="text" name="entry_date"
                                               value="">
                                    </div>
                                </div>


                                <div class="container">

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
                                                    <table class="table table-hover table-striped table-bordered" id="dashboard-data-table">
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
                                                                    echo $atten_score;
                                                                    $total_score += $atten_score;
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $stu_id = $row['s_id'];
                                                                    $sql = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id' AND exam_type='ST'";
                                                                    $db_user = 'root';
                                                                    $db_pass = 'root123';
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
                                                                    $db_user = 'root';
                                                                    $db_pass = 'root123';
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
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $stu_id2 = $row['s_id'];
                                                                    $sql2 = "select SUM(actual),COUNT(*) FROM student_assessment WHERE s_id='$stu_id2' AND exam_type='PR'";
                                                                    $db_user = 'root';
                                                                    $db_pass = 'root123';
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
                                                                <td><?php $ws = 5;
                                                                    echo $ws;
                                                                    $total_score += $ws;
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>


                            <div class="modal pop">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <select class="selectpicker">
                                                    <option>Select Batch...</option>
                                                    <option>First batch</option>
                                                    <option>Second batch</option>
                                                    <option>Third batch</option>
                                                </select>
                                            </div>
                                            <br>

                                            <form>
                                                <div class="col-xs-5 col-sm-5 text-right font">Students ID</div>
                                                <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="total"
                                                                                                placeholder="2497"
                                                                                                name="score"
                                                                                                class="form-control"
                                                                                                readonly></div>
                                                <br>

                                                <div class="col-xs-5 col-sm-5 text-right font">Total Score</div>
                                                <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="total"
                                                                                                placeholder="Enter Score"
                                                                                                name="score"
                                                                                                class="form-control">
                                                </div>
                                                <br>

                                                <div class="col-xs-5 col-sm-5 text-right font">Obtain Marks</div>
                                                <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="obtain"
                                                                                                placeholder="Enter Score"
                                                                                                name="marks"
                                                                                                class="form-control">
                                                </div>
                                                <br>

                                                <div class="col-xs-5 col-sm-5 text-right font">Actual Marks</div>
                                                <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="actual"
                                                                                                placeholder="100"
                                                                                                name="marks"
                                                                                                class="form-control"
                                                                                                readonly></div>


                                                <button type="button" class="btn btn-lg btn-success"> Update Score
                                                </button>

                                            </form>
                                            <button type="button" data-dismiss="modal" class="btn btn-danger cross">
                                                <span>&times;</span></button>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- Student List Section -->


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


    </body>
    </html>
    <?php
}
?>



