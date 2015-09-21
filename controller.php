<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('rajesh_model.php');
include('database_config.php');
session_start();

//Registration Page Data Insert
//echo $_POST['user_name'].$_POST['password'];

if(isset($_POST['attendance']))//Mandatory field name
{   $post=$_POST;
    //$file = $_FILES;
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $table = 'student_attendance';
    $db_name='student_kpi';


    $raj_modelobject->data_insert($post,$table,$db_user,$db_pass,$db_name);
    //data_insert_withfile($post,$file,$table,$db_user,$db_pass,$db_name);
    // data_insert($post,'user',$user,$pass,$dbname);//model's function Name(postdata,file,TableName)
    echo("<script>alert('Successfully Saved!')</script>");
    echo("<script>location.href='dashboard.php'</script>");

}
if(isset($_POST['exam_type']) )
{
    $post=$_POST;
    //$file = $_FILES;
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $table = 'student_assessment';
    $db_name='student_kpi';



    $raj_modelobject->data_insert($post,$table,$db_user,$db_pass,$db_name);
    //data_insert_withfile($post,$file,$table,$db_user,$db_pass,$db_name);
    // data_insert($post,'user',$user,$pass,$dbname);//model's function Name(postdata,file,TableName)
    echo("<script>alert('Successfully Saved!')</script>");
    echo("<script>location.href='input_score.php'</script>");
}
/*if(isset($_POST['image_section']))
{
    $post=$_POST;
   $db_user = 'root';
    $db_pass = "";
    $file = $_FILES;
    $table = 'file_upload';
    $db_name='new_limits';
    $raj_modelobject->data_insert_withfile($post,$file,$table,$db_user,$db_pass,$db_name);
    echo("<script>alert('Successfully Saved!')</script>");
   echo("<script>location.href='content_upload.php'</script>");

   // $raj_modelobject->data_insert_page2($db_user,$db_pass,$db_name,$_POST,$_FILES,"file_upload");
}*/
?>