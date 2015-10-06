<?php
session_start();
//echo $_SESSION['user'];
if($_SESSION['user']==null && $_SESSION['token']==null ) {
    echo("<script>location.href='sorry.php'</script>");
}
else
{
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
                                    <h3 class="pull-left">Attendance</h3>
                                </div>
                                <!--    <div class="col-md-6">
                                    <h3 class="pull-right">
                                        <input readonly  id="e_date" class="form-control input-lg" type="text" name="entry_date" value="">
                                    </h3>
                                </div>-->
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class=" col-sm-2">
                            <p style="font-weight:bolder; color: darkorange; font-size: large;">Enter Student Id:</p>

                        </div>
                        <div class="col-sm-3">
                            <input  class="form-control" type="text" name="search" id="student_search" placeholder="E.g: 123">
                        </div>
                        <div class=" col-sm-2">
                            <p style="font-weight:bolder; color:#3e8f3e; font-size: large;">(if you want to search single student)</p>

                        </div>

                    </div>

                        <div class="col-xs-12 col-sm-12">
                            <br><br>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="col-xs-12 col-sm-5">
                                        <select name="b_id" id="batch_id" class="atten-parameter">

                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-5">
                                        <select name="g_id" id="group_id" class="atten-parameter">

                                        </select>
                                    </div>
<!--                                    <div class="col-xs-12 col-sm-2">-->
<!--                                        <input class="form-control atten-parameter" type="text" id="atten-date" name="entry_date" placeholder="Select Date">-->
<!--                                    </div>-->
                                </div>

                                <!--                                <div id="link_loading" align="center">-->
                                <!--                                    <img width="50" height="auto" src="/edu_kpi/images/ajax-loader-big.gif">-->
                                <!--                                    <h2>fetching data..</h2>-->
                                <!--                                </div>-->

                                <div class="col-xs-12 col-sm-12 table_padding">
                                    <table class="text-center table table-striped table-condensed table-bordered" id="records_table">

                                                                            <tr>
                                                                                <th>Student ID</th>
                                                                                <th>Student Name</th>
                                                                                <th>Date</th>
                                                                                <th>Attendance</th>
                                                                            </tr>


                                    </table>
                                </div>


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
    <?php
}
?>