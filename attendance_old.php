
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custome.js"></script>
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
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                        <li><a href="attendance_old.php"><span class="glyphicon glyphicon-check"></span> Attendance</a></li>
                        <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a></li>
                        <li><a href="index_old.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>

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


        <div class="row">

            <ul class="breadcrumb">
                <li ><a href="dashboard.php"> Dashboard</a></li>
                <li class="active">Attendance</li>
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
                        <br><br>

                        <form action="controller.php" method="post">
                            <div class="col-xs-12 col-sm-12">
                                <div class="col-xs-12 col-sm-5">
                                    <select name="b_id" class="selectpicker">
                                        <option>--Select Batch--</option>
                                        <option value="1">Batch-01</option>
                                        <option value="2">Batch-02</option>
                                        <option value="3">Batch-03</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <select name="g_id" class="selectpicker">
                                        <option>--Select Group--</option>
                                        <option value="1">Group-01</option>
                                        <option value="2">Group-02</option>
                                        <option value="3">Group-03</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <input readonly  id="e_date" class="form-control" type="text" name="entry_date" value="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 table_padding">
                                <table class="text-center table table-striped table-condensed table-bordered">

                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Attendance</th>
                                    </tr>

                                    <tr>
                                        <td><input  class="form-control input-sm" type="number" name="s_id" value=""></td>
                                        <td><input  class="form-control input-sm" type="text" name="name" value=""></td>

                                        <td>
                                            <input  type="radio" name="attendance" value="1"> Yes
                                            <input  type="radio" name="attendance" value="0"> No
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <div class="col-xs-3 col-sm-3">
                                <input type="submit" class="btn btn-primary" value="Update">
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
                                        <form >
                                            <div class="col-xs-5 col-sm-5 text-right font">Students ID</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="total" placeholder="2497" name="score" class="form-control" readonly></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Total Score</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="total" placeholder="Enter Score" name="score" class="form-control"></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Obtain Marks</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="obtain" placeholder="Enter Score" name="marks" class="form-control"></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Actual Marks</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="actual" placeholder="100" name="marks" class="form-control" readonly></div>


                                            <button type="button" class="btn btn-lg btn-success"> Update Score </button>

                                        </form>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger cross" ><span>&times;</span></button>
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
