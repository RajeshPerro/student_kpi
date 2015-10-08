<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/8/15
 * Time: 11:43 AM
 */
?>

<html>
<head>
    <title>EDU KPI :: Link Upload </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
                <li class="active">External Link</li>
            </ul>

        </div>
        <div class="row">

            <div class=" col-xs-12 col-sm-4">
        <div class="alert alert-success alert-dismissable fade in">The message is add successfully
        <button type="button" data-dismiss="alert" class="close "> &CircleTimes; </button>
        </div>

            <form name="import" method="post" enctype="multipart/form-data">
                <div class=" col-xs-12 col-sm-12">
                   <div class="form-group">
                      Link Name <input name="name" class="form-control" type="text" placeholder="Type link name">
                   </div>
                   <div class="form-group">
                      Description <textarea name="description" class="form-control" cols="5" rows="6" placeholder="Type your description"></textarea>
                   </div>

                   <div class="form-group">
                       URL <input name="link" class="form-control" type="text" placeholder="Enter Url">
                   </div>
                   <div class="form-group">
                       <input type="submit" value="Add" class="btn btn-primary" disabled>
                   </div>
               </div>
            </form>
            </div>
            <div class="col-xs-12 col-sm-8">
                <table class="table-bordered table-hover table-condensed " >
                    <tr>
                        <th>Link Name</th>
                        <th>Description</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Uahahaha</td>
                        <td>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                            Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                            Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.</td>
                        <td>www.www.com</td>
                        <td><a class="text-primary" href="#"><span class="glyphicon glyphicon-edit"></span></a> | <a class="text-danger" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>

                </table>
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

<script>
    $(document).ready(function(){
        $("#input_file").attr('disabled', true);
        $("#table-select").change(function(){
            $("#input_file").attr('disabled', false);
        });

        console.log("wtf");
        $('#uploadButton').attr('disabled', true);
        $('#input_file').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];

            switch (ext) {
                case 'csv':
                case 'CSV':
                    $('#uploadButton').attr('disabled', false);
                    break;
                default:
                    alert('This is not an allowed file type.');
                    this.value = '';
            }
        });
    });
</script>
</html>
