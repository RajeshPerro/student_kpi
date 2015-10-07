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

echo $table_name= $_POST['table_type'];

if(isset($_POST["table_type"]) && $table_name ==='assessment')
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
elseif(isset($_POST["table_type"]) && $table_name ==='attendance' )
{
echo "Yes!";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
        $s_id = $filesop[0];
        $name = $filesop[1];
        $batch_id = $filesop[2];
        $group_id = $filesop[3];
        $attendance = $filesop[4];
        $entry_date = $filesop[5];

        $sql="INSERT INTO student_attendance (s_id,name,b_id,g_id,attendance,entry_date) VALUES  ('$s_id','$name','$batch_id','$group_id','$attendance','$entry_date')";
//        print_r($sql);
//        exit;
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
elseif(isset($_POST["table_type"]) && $table_name ==='worksnap' )
{
    echo "Yes!";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
        $s_id = $filesop[0];
        $name = $filesop[1];
        $batch_id = $filesop[2];
        $group_id = $filesop[3];
        $hours = $filesop[4];
        $entry_date = $filesop[5];

        $sql="INSERT INTO worksnap (s_id,name,b_id,g_id,hours,entry_date) VALUES  ('$s_id','$name','$batch_id','$group_id','$hours','$entry_date')";
//        print_r($sql);
//        exit;
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
                <ul>

                    <li><a href="/edu_kpi/images/UploadTutorial.pdf">Don't know how to upload??</a></li>
                </ul>
            </div>
            <div class="row">

                <form name="import" method="post" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-2">

                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <p>Select Upload type</p>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <select name="table_type" id="table-select">
                                <option>--Select--</option>
                                <option value="assessment">Result</option>
                                <option value="attendance">Attendance</option>
                                <option value="worksnap">Worksnap</option>
                            </select>
                        </div>
                    </div>
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
