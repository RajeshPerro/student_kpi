<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/8/15
 * Time: 11:43 AM
 */
$flag=$_GET['flag'];
include('rajesh_model.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
function displayPaginationBelow($per_page,$page){
    //echo "UserName".$GLOBALS['userName'];
    $page_url_test="user=".$GLOBALS['userName']."&token=".$GLOBALS['token'];
    $page_url="?".$page_url_test."&";
    $query = "SELECT COUNT(*) as totalCount FROM resources";
    $rec = $GLOBALS['raj_modelobject']->DataView2($query, $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_Name']);
    //print_r($rec);
    //$test=count($rec);
    $test=$rec[0]['totalCount'];
     $total = $test;
    $adjacents = "2";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $setLastpage = ceil($total/$per_page);
    $lpm1 = $setLastpage - 1;

    $setPaginate = "";
    if($setLastpage > 1)
    {
        $setPaginate .= "<ul class='setPaginate'>";
        $setPaginate .= "<li>Page $page of $setLastpage</li>";
        if ($setLastpage < 7 + ($adjacents * 2))
        {
            for ($counter = 1; $counter <= $setLastpage; $counter++)
            {
                if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
            }
        }
        elseif($setLastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
                $setPaginate.= "<li class='dot'>...</li>";
                $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
            }
            elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                $setPaginate.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
                $setPaginate.= "<li class='dot'>..</li>";
                $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
            }
            else
            {
                $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                $setPaginate.= "<li class='dot'>..</li>";
                for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
                {
                    if ($counter == $page)
                        $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1){
            $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
            $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
        }else{
            $setPaginate.= "<li><a class='current_page'>Next</a></li>";
            $setPaginate.= "<li><a class='current_page'>Last</a></li>";
        }

        $setPaginate.= "</ul>\n";
    }


    return $setPaginate;
}
if(isset($_GET["page"]))
    $page = (int)$_GET["page"];

else
    $page = 1;

$setLimit = 5;

$pageLimit = ($page * $setLimit) - $setLimit;
$sql="select * FROM resources LIMIT ".$pageLimit." , ".$setLimit;// WHERE b_id='$Batch' AND g_id='$Group' AND s_id='$StudentId' AND name='$StudentName' AND exam_type='$ExamType' AND skill_type='$SkillType' AND skill_name='$SkillName'";
$db_Name='student_kpi';
$fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);


?>

<html>
<head>
    <title>EDU KPI :: Link Upload </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/pagination_style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/delete_link.js"></script>

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
                <li class="active">External Link</li>
            </ul>

        </div>
        <div class="row">
            <div class=" col-xs-12 col-sm-7">
                <?php
                if($flag==1)
                {
                    echo('
                    <div class="alert alert-success alert-dismissable fade in">The message is add successfully
                    <button type="button" data-dismiss="alert" class="close "> &CircleTimes; </button>
                </div>
                    ');
                    $flag=0;
                }

                ?>


            <form action="link_controller.php" name="import" method="post" enctype="multipart/form-data">
                <div class=" col-xs-12 col-sm-12">
                   <div class="form-group">
                      Link Name <input name="name" class="form-control" type="text" placeholder="Type link name">
                   </div>
                   <div class="form-group">
                      Description <textarea name="description" class="form-control" cols="5" rows="6" placeholder="Type your description"></textarea>
                   </div>

                   <div class="form-group">
                       URL <input id="input_link" name="link" class="form-control" type="text" placeholder="Enter Url">
                   </div>
                   <div class="form-group">
                       <input id="add_button" type="submit" value="Add" class="btn btn-primary">
                   </div>
               </div>
            </form>
            </div>
            <div class="col-xs-12 col-sm-offset-2 col-sm-3">
    <img src="images/1.png" alt="Help">
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table-condensed " >
                        <tr>
                            <th>SL#</th>
                            <th>Link Name</th>
                            <th>Description</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $sl=0;
                        foreach($fetch_result as $key=>$value)
                        {
                            $sl++;



                            ?>
                            <tr>
                                <td><?php echo $sl;?></td>
                                <td><?php echo $value['name']?></td>
                                <td><?php echo $value['description']?></td>
                                <td><a href="<?php echo $value['link']?>"><?php echo $value['link']?></a></td>
                                <td><a class="text-primary" href="#"><span class="glyphicon glyphicon-edit"></span></a> |
                                    <a onclick="if (! confirm('Are you sure?')) return false;" class="text-danger" href="delete_controller.php?id=<?php  echo $value['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                </div>
                <?php
                // Call the Pagination Function to load Pagination.

                echo displayPaginationBelow($setLimit,$page);
                ?>
            </div>
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
        $("#add_button").attr('disabled', true);
        $('#input_link').keyup(function () {

            $("#add_button").attr('disabled', false);

        });
    });

</script>
</html>
