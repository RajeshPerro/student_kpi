<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/1/15
 * Time: 9:56 AM
 */
include('rajesh_model.php');
include('database_config.php');
session_start();

//Registration Page Data Insert
//echo $_POST['user_name'].$_POST['password'];

if(isset($_POST['entry_date']))//Mandatory field name
{   $post=$_POST;
    //$file = $_FILES;
    $id=$_POST['id'];
    $s_id=$_POST['s_id'];
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $table = 'student_assessment';
    $db_name='student_kpi';


    $raj_modelobject->Data_Update($post,$id,$s_id,$table,$db_user,$db_pass,$db_name);

    //data_insert_withfile($post,$file,$table,$db_user,$db_pass,$db_name);
    // data_insert($post,'user',$user,$pass,$dbname);//model's function Name(postdata,file,TableName)
    echo("<script>alert('Successfully Updated!')</script>");
    echo("<script>location.href='score_update.php'</script>");

}
?>