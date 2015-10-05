<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/29/15
 * Time: 11:52 AM
 */
$StudentId=$_GET['id'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$sql="select * FROM student_assessment WHERE s_id='$StudentId'";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);

//print_r($fetch_result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>EDU KPI :: Attendance </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/batchgroup.js"></script>
    <script type="text/javascript" src="js/attendance_view.js"></script>
</head>
<body>

<div class="container-fluid">
    <!-- Header Section -->
    <div id="header">

        <!-- Navigation -->
        <nav class="navbar navbar-default padding-top-bottom">
            <div class="container">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                    <!--                    <ul class="nav navbar-nav navbar-left">-->
                    <!--                        <li><a href="dashboard.php?user=--><?php //echo $_SESSION['user']?><!-- &token=--><?php //echo $_SESSION['token']?><!--">-->
                    <!--                                <span class="glyphicon glyphicon-dashboard"></span>-->
                    <!--                                Dashboard</a></li>-->
                    <!--                        <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a></li>-->
                    <!--                        <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a></li>-->
                    <!--                        <li><a href="logout.php" id="sign-out"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>-->
                    <!--                        <li><a href="dashboard.php"><span class=""></span>--><?php //echo $_SESSION['user']; ?><!--</a></li>-->
                    <!---->
                    <!--                    </ul>-->
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


        <div class="row">

            <ul class="breadcrumb">
                <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        Dashboard</a></li>
                <li class="active">Attendance View</li>
            </ul>
        </div>

        <div class="row">
            <div class="back">
                <div class="mainbody">
                    <div class="row custom-border">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3 class="pull-left">Student History</h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                       <table class="table table-hover table-striped table-bordered">
                           <thead>
                           <tr>
                               <th>Exam Tyep</th>
                               <th>Skill Type</th>
                               <th>Skill Name</th>
                               <th>Out Of</th>
                               <th>Obtained</th>
                               <th>Actual</th>
                               <th>Date</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php

                           echo "<h2>".$fetch_result[0]['name']."</h2>"."<h4>ID: ".$fetch_result[0]['s_id']."</h4>";

                           foreach($fetch_result as $key => $row)
                            {

                            ?>
                            <tr>
                                <td><mark><?php
                                    if($row['exam_type']==='ST')
                                    {
                                        echo "Small Test-(10%)";
                                    }
                                    elseif($row['exam_type']==='FT')
                                    {
                                        echo "Final Test-(35%)";
                                    }
                                    elseif($row['exam_type']==='ASS')
                                    {
                                        echo "Assignment-(20%)";
                                    }
                                    else{
                                        echo "Project-(20%)";
                                    }
                                    ?>
                                    </mark>
                                </td>
                                <td><?php echo $row['skill_type']?></td>
                                <td><?php echo $row['skill_name'] ?></td>
                                <td><?php echo $row['outof'] ?></td>
                                <td><?php echo $row['obtained'] ?></td>
                                <td><?php echo $row['actual'] ?></td>
                                <td><?php echo $row['entry_date'] ?></td>

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

</div>

<section id="footer" class="padding-top-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>© 2015 | Powered by Mentor Team, Coderstrust  </p>
                <p>All Rights Reserved</p>
            </div>
        </div>
    </div>
</section>

</body>
</html>
