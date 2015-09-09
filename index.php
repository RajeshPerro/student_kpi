<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/4/15
 * Time: 2:44 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>EDU KPI :: Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class="images">


<div class="container">

    <div class="row marge">

        <div class="col-xs-12 col-sm-offset-4 col-sm-4">

            <div class="login_back ">
                <form >
                    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
                        <img src="images/ct_login.png" class="img-responsive ct">
                    </div>
                    <div class="form-group form-group-lg">

                        <input  type="text" placeholder="Type your username" name="username" class="form-control">
                    </div>
                    <div class="form-group form-group-lg">
                        <input  type="password" placeholder="Enter password" name="password" class="form-control">
                    </div>


                    <a href="dashboard.php"><button type="button" class="btn btn-lg btn-success btn-block"> Login </button></a>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
