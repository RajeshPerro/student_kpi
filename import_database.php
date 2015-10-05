<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/5/15
 * Time: 12:12 PM
 */
?>

<html>
<head>
    <title>EDU KPI :: Score Upload </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/authentication.js"></script>
    <script type="javascript" src="js/custome.js"></script>

</head>
<body>
<div class="container-fluid">
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

                    <?php include('header.php'); ?>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <div class="container">
        <div class="row">

            <ul class="breadcrumb">
                <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        Dashboard</a></li>
                <li class="active">DataBase</li>
            </ul>
            <ul>
            </ul>
        </div>
        <div class="row">
            <form name="import" action="import_db.php" method="post" enctype="multipart/form-data">
                <div class="col-md-8 col-sm-4">

                    <div class="col-xs-5 col-sm-5 text-right font">Select Database:</div>
                    <div class="col-xs-7 col-sm-7 text-left">
                        <select name="db_name">
                            <option>--Select--</option>
                            <option value="student_kpi">Student Kpi</option>
                        </select>
                        <input id="input_file" type="file" name="file" class="form-control">
                        <input type="submit" value="Execute">
                    </div>

                </div>
            </form>
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
