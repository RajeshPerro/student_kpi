
<?php
//error_reporting(0);
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


class test
{


    public function loginpage($db_user,$db_pass,$db_name,$table, $username, $passworard)
    {
        $con_user=$db_user; $con_pass=$db_pass; $con_name=$db_name;
        $connection_object=new connect();
        if(!empty($con_user) && !empty($con_pass))
        {
            $dbcon=$connection_object->connection('localhost',$con_user,$con_pass,$con_name);
        }
        else
        {
            $dbcon=$connection_object->connection('localhost','root','',$con_name);

        }

        $sql = "select * from $table where `email`='$username'";
        $data = $dbcon->query($sql);
        $row = $data->fetch(PDO::FETCH_ASSOC);

        //$query = mysql_query($sql);
        //$row = mysql_fetch_array($query);
        trim($dbuser = $row['email']);
        trim($dbpass = $row['password']);
        //$entyppass=md5($passworard);
       // echo "<br>".$username.$passworard."from";

        if ($dbpass != "" && $dbuser != "")
        {
            $_SESSION['user'] = $dbuser;
            echo("<script>location.href='discussion.php'</script>");
        }
        else {
            $string = ' Sorry! Try again.\n Username or Password is Wrong.';
            echo "<script>alert(\"$string\")</script>";
            echo("<script>location.href='user.php'</script>");
        }
    }

    //Data Insert Start
    public function data_insert($post,$table,$db_user,$db_pass,$db_name)//withoutFile
    {

        $con_user=$db_user; $con_pass=$db_pass; $con_name=$db_name;

        $colum="";
        $values="";
        $limit=count($post) ;
        $allvalues = "";
        $i=0;
        foreach($post as $name=> $value)
        {
            if($i==0)
            {
                $colum.="`".$name."`";
                $values.="'".$value."'";

            }
            else
            {
                $colum.=",`".$name."`";$values.=",'".$value."'";
            }
        $i++;
        }
        $colum;
        $values;

        $allvalues.=$values;
        $sql="insert into $table ($colum)values($allvalues)";
       // exit;

        $connection_object=new connect();
        if(!empty($con_user) && !empty($con_pass))
        {
            $dbcon=$connection_object->connection('localhost',$con_user,$con_pass,$con_name);
        }
        else
        {
            $dbcon=$connection_object->connection('localhost','root','',$con_name);

        }

        $preparedStatement =$dbcon->prepare($sql);

        $preparedStatement->execute(array('$colum' => '$allvalues'));

    }

    public function data_insert_withfile($post,$file,$table,$db_user,$db_pass,$db_name)
    {

        $con_user=$db_user; $con_pass=$db_pass; $con_name=$db_name;

        $colum="";
        $values="";
        $_FILES =$file;
        $limit=count($post) ;
        $image='image';
        $allvalues="";
        $i=0;
        foreach($post as $name=> $value)
        {
            if($i==0)
            {
                $colum.="`".$name."`";
                $values.="'".$value."'";

            }
            else
            {
                $colum.=",`".$name."`";$values.=",'".$value."'";
            }
            if($i==($limit-1))
            {
                $colum.=",`".$image."`";
            }
            $i++;
        }
        $colum;
        $values;
        $j=0;
        $imgvalues="";
        $allimge="";
        $Server='http://'.$_SERVER['HTTP_HOST'];
        foreach ($_FILES['image']['tmp_name'] as $key =>$tmp_name)
        {
            $name=trim($_FILES['image']['name'][$key]);
           $target="user_image/";
            $target=$target.$_FILES['image']['name'][$key];
            if($j==0){$imgvalues.=$name;}
            else
            {$imgvalues.=";".$name; }
            $j++;
            move_uploaded_file($tmp_name,$target);
        }
        $allimge=",'".$imgvalues."'";
        $colum;
        $allvalues.=$values.$allimge;

        $sql="insert into $table ($colum)values($allvalues)";

        $connection_object=new connect();
        if(!empty($con_user) && !empty($con_pass))
        {
            $dbcon=$connection_object->connection('localhost',$con_user,$con_pass,$con_name);
        }
        else
        {
            $dbcon=$connection_object->connection('localhost','root','',$con_name);

        }

        $preparedStatement =$dbcon->prepare($sql);
        $preparedStatement->execute(array('$colum' => '$allvalues'));


    }


    //Data Insert End



    public function DataView($sql_select, $users, $passwords, $dbName)
    {
        $sql = $sql_select;
        $con_user = $users;
        $con_pass = $passwords;
        $con_name = $dbName;
        $connection_object = new connect();

        if (!empty($con_user) && !empty($con_pass)) {
            $dbcon = $connection_object->connection('localhost', $con_user, $con_pass, $con_name);
        } else {
            $dbcon = $connection_object->connection('localhost', 'firoz', 'firoz', $con_name);

        }
        $data = $dbcon->query($sql);
        // $dbcon->exec("SET character_set_results=utf8");
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $xx[] = $row;

        }
        return $xx;

    }

    public function DataView2($sql_select, $users, $passwords, $dbName)
    {
        $sql = $sql_select;
        $con_user = $users;
        $con_pass = $passwords;
        $con_name = $dbName;
        $connection_object = new connect();

        if (!empty($con_user) && !empty($con_pass)) {
            $dbcon = $connection_object->connection('localhost', $con_user, $con_pass, $con_name);
        } else {
            $dbcon = $connection_object->connection('localhost', 'root', '', $con_name);

        }
        $data = $dbcon->query($sql);
        // $dbcon->exec("SET character_set_results=utf8");
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $xx[] = $row;

        }
        return $xx;

    }


 public function Data_Update($post,$id,$date,$table,$db_user,$db_pass,$db_name)//withoutFile
    {

        $con_user=$db_user; $con_pass=$db_pass; $con_name=$db_name;

        $img=$_FILES['image']['name'];
        $chekval="";
        foreach($img as $a=>$chekval)
        {
            $chekval;
        }
        $chekval;
        $colum="";
        $limit=count($post);
        $image='image';
        $allvalues="";
        $i=0;
        foreach($post as $name=> $value)
        {
            if($i==0)
            {
                $colum.="`".$name."`='".$value."'";
            }
            else
            {
                $colum.=",`".$name."`='".$value."'";
            }
            if(($i==($limit-1))and($chekval!=""))
            {
                $colum.=",`".$image."`=";
            }

            $i++;
        }
        $colum;
        $j=0;
        $imgvalues="";
        $allimge="";
        foreach ($_FILES['image']['tmp_name'] as $key =>$tmp_name)
        {
            $name=trim($_FILES['image']['name'][$key]);
            $target="documents/";
            $target=$target.$_FILES['image']['name'][$key];
            if($j==0)
            {
                $imgvalues.=$name;
            }
            else
            {
                $imgvalues.=";".$name;
            }
            $j++;
            move_uploaded_file($tmp_name,$target);
        }

        if($chekval=="")
        {

            $allvalues=$colum;
        }
        else
        {
            $allimge="'".$imgvalues."'";
            $allvalues.=$colum.$allimge;
        }
        $sql="update $table set $allvalues where s_id='$id' AND entry_date='$date' ";
        print_r($allvalues['exam_type']);
      print_r($sql);
         exit;

        $connection_object=new connect();
        if(!empty($con_user) && !empty($con_pass))
        {
            $dbcon=$connection_object->connection('localhost',$con_user,$con_pass,$con_name);
        }
        else
        {
            $dbcon=$connection_object->connection('localhost','root','',$con_name);

        }

        $preparedStatement =$dbcon->prepare($sql);

        $preparedStatement->execute(array('$colum' => '$allvalues'));


 }

 public function DeleteData($users, $passwords, $dbName, $table, $id)
    {
        $con_user = $users;
        $con_pass = $passwords;
        $con_name = $dbName;
        $connection_object = new connect();
        if (!empty($con_user) && !empty($con_pass)) {
            $dbcon = $connection_object->connection('localhost', $con_user, $con_pass, $con_name);
        } else {
            $dbcon = $connection_object->connection('localhost', 'root', '', $con_name);

        }
        $sql = "delete from $table where `id`=$id";
        //$query=mysql_query($sql);
        $deleteStatement = $dbcon->prepare($sql);

        if ($deleteStatement->execute(array(':id' => $id))) {
            echo "<script> alert('Data Deleted!!')</script>";
            echo("<script>location.href='enter.php'</script>");
        } else {

            echo "<script> alert('Sorry!! Not Possible')</script>";
            echo("<script>location.href='enter.php'</script>");
        }

    }


}

//All Class Objects.... :)
$raj_modelobject = new test();

?>
