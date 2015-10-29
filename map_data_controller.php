<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('rajesh_model.php');
include('database_config.php');
session_start();

//Registration Page Data Insert
//echo $_POST['user_name'].$_POST['password'];

if(isset($_POST['lat']) && isset($_POST['lon']))//Mandatory field name
{   $post=$_POST;
    //$file = $_FILES;
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $table = 'locations';
    $db_name='student_kpi';


    $raj_modelobject->data_insert($post,$table,$db_user,$db_pass,$db_name);
    echo("<script>alert('Successfully Saved!')</script>");
    echo("<script>location.href='map_data_insert.php'</script>");

}

?>