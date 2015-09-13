<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/4/15
 * Time: 3:29 PM
 */
session_start();
//echo $_SESSION['user'];
if($_SESSION['user']==null && $_SESSION['token']==null ) {
    echo("<script>location.href='sorry.php'</script>");
}
else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>EDU KPI :: Input Score </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/custome.js"></script>
        <script type="text/javascript">

        </script>
    </head>
    <body>
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
                            <span class="icon-bar"></span>-
                            -
                            -
                            -
                            -
                            -
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
                            <li><a href="logout.php" id="sign-out" ><span class="glyphicon glyphicon-log-out"></span> Sign Out</a>
                            </li>
                            <li><a href="dashboard.php"><span class=""></span><?php echo $_SESSION['user']; ?></a></li>
                        </ul>
                    </div>

                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>


        <div class="container">
            <br><br>

            <div class="row">

                <ul class="breadcrumb">
                    <li><a href="dashboard.php"> Dashboard</a></li>
                    <li class="active">Input Score</li>
                </ul>
            </div>

            <div class="row">
                <div class="back">
                    <div class="mainbody">
                        <div class="row custom-border">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <h3 class="pull-left">Input Score</h3>
                                </div>

                            </div>
                        </div>
                        <div class="row bg-white padding-top-bottom">

                            <div class="col-xs-12 col-sm-12">
                                <div class="col-xs-12 col-sm-5">
                                    <select name="" id="batch_id" onchange="fuck()">

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <select id="group_id" onchange="fuck()">

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <input readonly id="e_date" class="form-control" type="text" name="entry_date"
                                           value="">
                                </div>
                            </div>

                            <div id="test_data">


                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <br><br>
<!--                                <table class="text-center table table-striped table-condensed table-bordered table-hover">-->
<!--                                    -->
<!--                                </table>-->
                                <table id="test_data_table" class="table table-striped table-condensed table-bordered table-hover">

                                </table>


                                <div class="modal pop">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <form action="controller.php" method="post">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="col-xs-5 col-sm-5 text-right font">Batch</div>
                                                        <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                        id="bb_id"
                                                                                                        name="b_id"
                                                                                                        class="form-control"
                                                                                                        readonly></div>
                                                        <br>

                                                    </div>
                                                    <br>

                                                    <div class="col-md-12">
                                                        <div class="col-xs-5 col-sm-5 text-right font">Group</div>
                                                        <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                        id="gg_id"
                                                                                                        name="g_id"
                                                                                                        class="form-control"
                                                                                                        readonly></div>
                                                        <br>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12">
                                                        <div class="col-xs-5 col-sm-5 text-right font">Date</div>
                                                        <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                        id="dd_id"
                                                                                                        name="entry_date"
                                                                                                        class="form-control"
                                                                                                        readonly></div>
                                                        <br>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12 drop-down-space">
                                                        <select id="ex" name="exam_type">
                                                            <option>--Select Assessment--</option>
                                                            <option value="ST">Small Test</option>
                                                            <option value="FT">Final Test</option>
                                                            <option value="ASS">Assignment</option>
                                                            <option value="PR">Project</option>
                                                        </select>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12 drop-down-space">
                                                        <select id="front_end" name="skill_type">
                                                            <option value="#" selected>Select Skill Type</option>
                                                            <option value="Front End">Front End</option>
                                                            <option value="Back End">Back End</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 drop-down-space">
                                                        <select name="skill_name">
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


                                                    <div class="col-xs-5 col-sm-5 text-right font">Students ID</div>
                                                    <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                    id="modal_id"
                                                                                                    name="s_id"
                                                                                                    class="form-control"
                                                                                                    readonly></div>
                                                    <br>

                                                    <div class="col-xs-5 col-sm-5 text-right font">Name</div>
                                                    <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                    id="modal_name"
                                                                                                    name="name"
                                                                                                    class="form-control"
                                                                                                    readonly></div>
                                                    <br>

                                                    <div class="col-xs-5 col-sm-5 text-right font">Out Of</div>
                                                    <div class="col-xs-7 col-sm-7 text-left"><input type="number"
                                                                                                    id="of"
                                                                                                    placeholder="Enter Score"
                                                                                                    name="outof"
                                                                                                    class="form-control">
                                                    </div>
                                                    <br>

                                                    <div class="col-xs-5 col-sm-5 text-right font">Obtain Marks</div>
                                                    <div class="col-xs-7 col-sm-7 text-left"><input
                                                            onkeyup="score_cal()" type="number" id="obtain"
                                                            placeholder="Enter Score" name="obtained"
                                                            class="form-control"></div>
                                                    <br>

                                                    <div class="col-xs-5 col-sm-5 text-right font">Actual Marks</div>
                                                    <div class="col-xs-7 col-sm-7 text-left"><input type="text"
                                                                                                    id="actual"
                                                                                                    name="actual"
                                                                                                    class="form-control"
                                                                                                    readonly></div>
                                                    <div class="col-xs-10 col-sm-10">
                                                        <p style="color: red;">Score has been Convert in:</p>
                                                    </div>
                                                    <div class="col-xs-2 col-sm-2">
                                                        <p style="color: brown;" id="score_msg">0</p>
                                                    </div>
                                                    <button id="save" type="submit" class="btn btn-lg btn-success">
                                                        Update Score
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/batchgroup.js"></script>
    </body>
    </html>
    <?php
}
    ?>