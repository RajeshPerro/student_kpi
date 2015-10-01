<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 9:45 AM
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <title>EDU KPI :: Score </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link  rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/batchgroup.js"></script>
        <script type="text/javascript" src="js/score_update.js"></script>


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
                <li class="active">Edit Score</li>
            </ul>
        </div>

        <div class="row">
            <div class="back">
                <div class="mainbody">
                    <div class="row custom-border">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3 class="pull-left">Score</h3>
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

                        <form action="score_update_controller.php" method="post" enctype="multipart/form-data">
                            <div class="col-xs-12 col-sm-12">
                                <div class="col-xs-12 col-sm-4">
                                    <select name="b_id" id="batch_id" class="score-parameter">

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <select name="g_id" id="group_id" class="score-parameter">

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <select name="s_id" id="student-id">

                                    </select>
                                </div>

                            </div>
                           <br><br><br>

                            <div class="col-xs-12 col-sm-12" id="student-info">
                                <div class="col-xs-12 col-sm-3" id="name-show">
                                    <input class="form-control" readonly name="name" id="student-name" placeholder="Student Name">
                                </div>

                                <div class="col-xs-12 drop-down-space col-sm-3" >
                                    <select id="exam-type" name="exam_type" class="date-show">
                                        <option>--Select Assessment--</option>
                                        <option value="ST">Small Test</option>
                                        <option value="FT">Final Test</option>
                                        <option value="ASS">Assignment</option>
                                        <option value="PR">Project</option>
                                    </select>
                                </div>


                                <div class="col-xs-12 drop-down-space col-sm-3">
                                    <select id="front_end" name="skill_type" class="date-show">
                                        <option value="#" id="op_id" selected>Select Skill Type</option>
                                        <option value="Front End">Front End</option>
                                        <option value="Back End">Back End</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 drop-down-space col-sm-3">
                                    <select name="skill_name" id="skill-name" class="date-show">
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
                            <br><br><br>
                        <div class="col-xs-12 col-sm-12">
                            <div class="col-xs-12 col-sm-3">
                                <select name="entry_date" id="date-select">

                                </select>
                            </div> <br><br><br>
                        </div>
                            <br><br>
                            <div class="col-xs-3 col-sm-3">
                                <input type="submit" class="btn btn-primary" value="Update" id="button_submit">
                            </div>
                        </form>

                        <!-- Student List Section -->



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
