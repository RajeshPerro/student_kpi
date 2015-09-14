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
$dbcon=$connection_object->connection('localhost','root','root123','student_kpi');

//start from here
$batch = $_POST['b_id'];
$group = $_POST['g_id'];
$student_id = $_POST['s_id'];
$std_names = $_POST['name'];
$att = $_POST['hour'];
$en_date=$_POST['entry_date'];

$preparedStatement = $dbcon->prepare('INSERT INTO worksnap (s_id, name, b_id, g_id, hours, entry_date)
	VALUES (:sid, :sname, :bid, :gid, :atten, :ent_date)');

$arrlength = count($student_id);

for($x = 0; $x < $arrlength; $x++) {

    $preparedStatement->bindParam(':sid', $student_id[$x]);
    $preparedStatement->bindParam(':sname', $std_names[$x]);
    $preparedStatement->bindParam(':bid', $batch);
    $preparedStatement->bindParam(':gid', $group);
    $preparedStatement->bindParam(':atten', $att[$x] );
    $preparedStatement->bindParam(':ent_date', $en_date);
    $preparedStatement->execute();
}
$user=$_SESSION['user'];$token=$_SESSION['token'];
echo("<script>alert('Successfully Saved!')</script>");
echo("<script>location.href='dashboard.php?user=$user&token=$token'</script>");

?>