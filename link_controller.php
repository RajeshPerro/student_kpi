<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('rajesh_model.php');
include('database_config.php');
session_start();

//Registration Page Data Insert
//echo $_POST['user_name'].$_POST['password'];

if(isset($_POST['link']))//Mandatory field name
{   $post=$_POST;
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $table = 'resources';
    $db_name='student_kpi';


    $raj_modelobject->data_insert($post,$table,$db_user,$db_pass,$db_name);
    $flag=1;
    echo("<script>location.href='link_upload.php?flag='+$flag</script>");

}

?>