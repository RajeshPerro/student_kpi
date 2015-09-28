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
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/authentication.js"></script>
        <script type="javascript" src="js/custome.js"></script>
        <script>
            var today = new Date();
            $(document).ready(function() {

                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();

                if(dd<10) {
                    dd='0'+dd
                }

                if(mm<10) {
                    mm='0'+mm
                }

                today =yyyy+'/'+mm+'/'+dd;
                $("#e_date").val(today);
                console.log(today);
            });
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




<!--       student status graph start-->
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4>Student Id:</h4>
                </div>

                <div class="col-md-6">
                    <input class="form-control input-lg" type="text" placeholder="Student Id" id="linkonn">
                </div>
                <div class="col-md-4">
                    <button id="std_search" class="btn btn-primary">search</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title_color">Strength of Skills</h3>
                    <div id="graph_place" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
                <div class="col-md-6">
                    <h3 class="title_color">Scores of Skills</h3>
                    <div id="graph_place2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title_color">Weekly Worksnap Usages</h3>
                    <div id="graph_place3"></div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3 class="title_color">Notification</h3>
                        <p>currently here is no notification</p>
                    </div>
                </div>
            </div>
        </div>
<!--        end-->


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
<!--    <script src="js/jquery-1.11.3.min.js"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
    <script src="js/std_graph.js"></script>
    <script>
        //    $(document).ready(function() {
        //
        //        var make_student_table = function(){
        //
        //            var jsongroup =  [{"id":428,"name":"Shamsul Islam  Sujon"},{"id":505,"name":"Simson  Halder"},{"id":552,"name":"Apurba  Biswas"},{"id":1019,"name":"Zakaria  Shuvo"},{"id":1377,"name":"Rahul  Ray"},{"id":1895,"name":"Sayeed  Hasan"},{"id":1897,"name":"Hasan  Talukder"},{"id":2055,"name":"Shakhawat Hossain Khan"},{"id":2180,"name":"Md.  Ibrahim Hossain"},{"id":2191,"name":"Osman  Shak"},{"id":2262,"name":"Md. Sakhawat Hossain"},{"id":2271,"name":"Manir  Hossen"},{"id":2277,"name":"Md  Irfanuzzaman"},{"id":2307,"name":"Sayed  Khan"},{"id":2337,"name":"Fahad Hossain Howlader"},{"id":2478,"name":"farhana  binte hasan"},{"id":2501,"name":"MD. Borhan  Uddin"}];
        //            // $('#records_table').attr('enabled', 'true');
        //
        //
        //
        //            // $.ajax({
        //            //     url: '/S_KPI/bt.json',
        //            //     type: 'POST',
        //            //     success: function (response) {
        //
        //            //         alert("fuck me");
        //            //         var trHTML = '';
        //            //         $.each(response, function (i, item) {
        //            //             trHTML += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td><input  type="radio" name="attendance" value="1"> Yes <input  type="radio" name="attendance" value="0"> No </td></tr>';
        //            //         });
        //            //         $('#records_table').append(trHTML);
        //            //     }
        //            // });
        //        }
        //
        //
        //
        //    });




    </script>

    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </body>
    </html>
    <?php
}
?>