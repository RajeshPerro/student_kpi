<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/21/15
 * Time: 11:37 AM
 */
session_start();
class connect
{
    var $host;
    var $user;
    var $pass;
    var $db;
    public $connect;

    public function connection($hostname, $username, $password, $database)
    {
        $this->host = $hostname;
        $this->user = $username;
        $this->pass = $password;
        $this->db = $database;
        $connect = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->setAttribute(PDO::ATTR_PERSISTENT, true);

        return $connect;
    }
}

$connection_object=new connect();
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,'student_kpi');

if(isset($_POST["submit"]))
{
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
        $s_id = $filesop[0];
        $name = $filesop[1];
        $batch_id = $filesop[2];
        $group_id = $filesop[3];
        $exam_type = $filesop[4];
        $skill_type = $filesop[5];
        $skill_name = $filesop[6];
        $out_of = $filesop[7];
        $obtained = $filesop[8];
        $actual = $filesop[9];
        $entry_date = $filesop[10];

        $sql="INSERT INTO student_assessment (s_id,name,b_id,g_id,exam_type,skill_type,skill_name,outof,obtained,actual,entry_date) VALUES  ('$s_id','$name','$batch_id','$group_id','$exam_type','$skill_type','$skill_name','$out_of','$obtained','$actual','$entry_date')";
       // print_r($sql);
        //exit;
        $preparedStatement = $dbcon->prepare($sql);
        $preparedStatement->execute();
        $c = $c + 1;
    }

    if($sql)
    {
        echo("<script>alert('Successfully Uploaded!')</script>");
        echo("<script>location.href='upload_result.php'</script>");
    }
    else
    {
        echo("<script>alert('No.No.No')</script>");
    }

}

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
        <div class="container">
            <div class="row">

                <ul class="breadcrumb">
                    <li><a href="dashboard.php?user=<?php echo $_SESSION['user']?> &token=<?php echo $_SESSION['token']?>">
                            <span class="glyphicon glyphicon-dashboard"></span>
                            Dashboard</a></li>
                    <li class="active">Upload Score</li>
                </ul>
            </div>
            <div class="row">
                <form name="import" method="post" enctype="multipart/form-data">
                    <div class="col-md-8 col-sm-4">

                        <div class="col-xs-5 col-sm-5 text-right font">Select Your CSV file:</div>
                        <div class="col-xs-7 col-sm-7 text-left">
                            <input id="input_file" type="file" name="file" class="form-control">
                            <button type="submit" id="uploadButton" name="submit" class="btn btn-lg btn-success"> Upload File</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function(){
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
