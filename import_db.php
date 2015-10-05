<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/5/15
 * Time: 11:33 AM
 */
include('database_config.php');
$filename = $_FILES['file'];
//print_r($filename);
$db_user = $database_user;
$db_password = $databse_pass;
$db_name = $_POST['db_name'];
//echo $db_name;
$dbhost='localhost';
echo '<script>alert("Its not ready!! try again later")</script>';
echo("<script>location.href='db_manage.php'</script>");
?>
