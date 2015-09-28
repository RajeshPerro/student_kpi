<?php
session_start();
class connect
{
    var $host;
    var $user;
    var $pass;
    var $db;
    public $connect;

    public function connection($hostname, $username, $passwoard, $database)
    {
        $this->host = $hostname;
        $this->user = $username;
        $this->pass = $passwoard;
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

//start from here
$batch = $_POST['b_id'];
$group = $_POST['g_id'];
$student_id = $_POST['s_id'];
$std_names = $_POST['name'];
$att = $_POST['attendance'];
$en_date=$_POST['entry_date'];

$preparedStatement = $dbcon->prepare("UPDATE student_attendance SET s_id=:sid, name=:sname, b_id=:bid, g_id=:gid, attendance=:atten, entry_date=:ent_date
WHERE entry_date='$en_date' AND s_id=:sid AND b_id='$batch' AND g_id='$group'");


$arrlength = count($student_id);
$flag=0;
for($x = 0; $x < $arrlength; $x++) {

    $preparedStatement->bindParam(':sid', $student_id[$x]);
    $preparedStatement->bindParam(':sname', $std_names[$x]);
    $preparedStatement->bindParam(':bid', $batch);
    $preparedStatement->bindParam(':gid', $group);
    $preparedStatement->bindParam(':atten', $att[$x] );
    $preparedStatement->bindParam(':ent_date', $en_date);
    $preparedStatement->execute();
    $flag=1;
}

$user=$_SESSION['user'];$token=$_SESSION['token'];
if($flag==1)
{
    echo("<script>alert('Successfully Saved!')</script>");
    echo("<script>location.href='dashboard.php?user=$user&token=$token'</script>");
}
else
{
    echo("<script>alert('Something Went Wrong!')</script>");
    echo("<script>location.href='attendance_edit.php?user=$user&token=$token'</script>");
}



?>