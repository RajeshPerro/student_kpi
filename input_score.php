<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/4/15
 * Time: 3:29 PM
 */
include('rajesh_model.php');
// $sql="select * FROM student_attendance GROUP BY s_id";
// $db_user='root';
// $db_pass='root123';
// $db_Name='student_kpi';
// $fetch_result=$raj_modelobject->DataView($sql,$db_user,$db_pass,$db_Name);
$fetch_result =5;
?>
<!DOCTYPE html>
<html>
<head>
    <title>EDU KPI :: Input Score </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
    	  $('#group_id').change(function(){
            $.ajax({

                type: "GET",
                url: "test.php",
                data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val(),
                success: function(aa){

                	//console.log(aa);
                	$('#test_data_table').html(aa);
                    setTimeout(function () {
//                        $('.add_score').click(function(){
//                            console.log("Working!!");
//                        });
                        $(".add_score").click(send_data);
                    }, 100);

                },
                error: function(x)
                {
                	//console.log("In Error!!");
                   //	console.log(x);
                   

                }

            }); // Ajax Call
        }); //event handler
        $('#batch_id').change(function(){
            $.ajax({

                type: "GET",
                url: "test.php",
                data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val(),
                success: function(aa){

                    //console.log(aa);
                    $('#test_data_table').html(aa);
                    setTimeout(function () {
//                        $('.add_score').click(function(){
//                            console.log("Working!!");
//                        });
                        $(".add_score").click(send_data);
                    }, 100);

                },
                error: function(x)
                {
                    //console.log("In Error!!");
                    //	console.log(x);


                }

            }); // Ajax Call
        }); //event handler
   
    });
    </script>
</head>
<body>
<div class="container-fluid">
    <!-- Header Section -->
    <div id="header">

        <!-- Navigation -->
        <nav class="navbar navbar-default padding-top-bottom">
            <div class="container">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>-
-
-
-
-
-
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
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                        <li><a href="attendance.php"><span class="glyphicon glyphicon-check"></span> Attendance</a></li>
                        <li><a href="input_score.php"><span class="glyphicon glyphicon-send"></span> Input Score</a></li>
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>






    <div class="container">
        <br><br>

        <div class="row">

            <ul class="breadcrumb">
                <li ><a href="dashboard.php"> Dashboard</a></li>
                <li class="active">Input Score</li>
            </ul>
        </div>

        <div class="row">
            <div class="back">
                <div class="mainbody">
                    <div class="row custom-border">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3 class="pull-left">Input Score</h3>
                            </div>

                        </div>
                    </div>
                    <div class="row bg-white padding-top-bottom">
                    
                        <div class="col-xs-12 col-sm-12">
                            <div class="col-xs-12 col-sm-5">
                                <select name="" id="batch_id" onchange="fuck()">
                                    <option value="0">--Select--</option>
                                    <option value="1">Batch-01</option>
                                    <option value="2">Batch-02</option>
                                    <option value="3">Batch-03</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <select id="group_id" onchange="fuck()">
                                    <option value="0">--Select--</option>
                                    <option value="1">Group-01</option>
                                    <option value="2">Group-02</option>
                                    <option value="3">Group-03</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <input readonly  id="e_date" class="form-control" type="text" name="entry_date" value="">
                            </div>
                        </div>

                        <div id="test_data">
                        
                        	
                        </div>
                    <div class="col-xs-12 col-sm-12">
                        <br><br>
                        <table class="text-center table table-striped table-condensed table-bordered table-hover">
                            <tr>
                                <th>Sl#</th>
                                <th>Students Id</th>
                                <th>Students Name</th>
                                <th>Action</th>
                            </tr>
                        </table>
                        <table id="test_data_table" class="text-center table table-striped table-condensed table-bordered table-hover">

                        </table>




                        <div class="modal pop">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="controller.php" method="post">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="col-xs-5 col-sm-5 text-right font">Batch</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="bb_id"  name="b_id" class="form-control" readonly></div>
                                            <br>

                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="col-xs-5 col-sm-5 text-right font">Group</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="gg_id"  name="g_id" class="form-control" readonly></div>
                                            <br>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="col-xs-5 col-sm-5 text-right font">Date</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="dd_id"  name="entry_date" class="form-control" readonly></div>
                                            <br>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <select id="ex" name="exam_type">
                                                <option>--Select Assessment--</option>
                                                <option value="ST">Small Test</option>
                                                <option value="FT">Final Test</option>
                                                <option value="ASS">Assignment</option>
                                                <option value="PR">Project</option>
                                            </select>
                                        </div>
                                        <br>

                                            <div class="col-xs-5 col-sm-5 text-right font">Students ID</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="modal_id"  name="s_id" class="form-control" readonly></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Name</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="modal_name"  name="name" class="form-control" readonly></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Out Of</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="number"  id="of" placeholder="Enter Score" name="outof" class="form-control"></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Obtain Marks</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input onkeyup="score_cal()" type="number" id="obtain"  placeholder="Enter Score" name="obtained" class="form-control"></div>
                                            <br>
                                            <div class="col-xs-5 col-sm-5 text-right font">Actual Marks</div>
                                            <div class="col-xs-7 col-sm-7 text-left"><input type="text" id="actual" name="actual" class="form-control" readonly></div>
                                            <div class="col-xs-10 col-sm-10">
                                                <p style="color: red;">Score has been Convert in:</p>
                                            </div>
                                            <div class="col-xs-2 col-sm-2">
                                                <p style="color: brown;" id="score_msg">0</p>
                                            </div>
                                            <button id="save" type="submit" class="btn btn-lg btn-success"> Update Score </button>

                                        </form>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger cross" ><span>&times;</span></button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Student List Section -->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="footer" class="padding-top-bottom">
    <div class="container">

        <div class="col-md-12 text-center">
            <p>© 2015 | Powered by Mentor Team, Coderstrust  </p>
            <p>All Rights Reserved</p>
        </div>

    </div>
</section>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    var today = new Date();
    $(document).ready(function() {

        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd='0'+dd
        }

        if(mm<10) {
            mm='0'+mm
        }

        today =yyyy+'/'+mm+'/'+dd;
        $("#e_date").val(today);
        console.log(today);
    });
    function score_cal()
    {
        var result,actual, outof= parseFloat($("#of").val()), obtained= parseFloat($("#obtain").val()),ac=$("#actual");
        var exam_type=$("#ex").val(),score_msg=$("#score_msg"),save=$("#save");
        console.log()
        if(exam_type === 'ST')
        {
            if(obtained > outof)
            {
                ac.val("Error!!");
                ac.css("color","red");
                save.attr('disabled', true);
            }
            else
            {
                actual=(obtained*10)/outof;
                result=actual.toFixed(2);
                ac.val(result);
                score_msg.text(10);
            }

        }
        else if(exam_type === 'FT')
        {
            console.log(outof);
            console.log(obtained);
            if(obtained > outof)
            {
                ac.val("Error!!");
                ac.css("color","red");
                save.attr('disabled', true);
            }
            else
            {
                actual=(obtained*35)/outof;
                result=actual.toFixed(2);
                ac.val(result);
                score_msg.text(35);
            }
        }
        else if(exam_type === 'ASS')
        {
            if(obtained > outof)
            {
                ac.val("Error!!");
                ac.css("color","red");
                save.attr('disabled', true);
            }
            else
            {
                actual = (obtained * 20) / outof;
                result=actual.toFixed(2);
                ac.val(result);
                score_msg.text(20);
            }
        }
        else if(exam_type === 'PR')
        {
            if(obtained > outof)
            {
                ac.val("Error!!");
                ac.css("color","red");
                save.attr('disabled', true);
            }
            else
            {
                actual = (obtained * 20) / outof;
                result=actual.toFixed(2);
                ac.val(result);
                score_msg.text(20);
            }
        }
        else
        {
            score_msg.text(0);
        }
        console.log(exam_type);

    }

    function fuck()
    {
        var batchid =$("#batch_id").val();
        var groupid=$("#group_id").val();
        var entrydate=$("#e_date").val();
        console.log(batchid);
        console.log(groupid);
        console.log(today);
    }

    function send_data(e)
    {
        var parentRow = $(e.target).parents('.student-row')
            , studentId = $('.student-id', parentRow).attr('data-id')
            , studentName = $('.student-name', parentRow).data('name');
        console.log(parentRow, studentId, studentName);

        var batchid =$("#batch_id").val(),groupid=$("#group_id").val(),entrydate=$("#e_date").val();
        var bbid=$("#bb_id"),ggid=$("#gg_id"),ddid=$("#dd_id");
        var stu_id=$("#s_id").text();
        var stu_name =$("#s_name").text();
        var modal_s_id=$("#modal_id"),modal_s_name=$("#modal_name");
       var ad_sco = $(".add_score");
        console.log("batch"+batchid+"group"+groupid+"Date"+entrydate);

        bbid.val(batchid);
        ggid.val(groupid);
        ddid.val(entrydate);
        modal_s_id.val(studentId);
        modal_s_name.val(studentName);

            }
    // $(document).ready(function () {
    //     $('.student-row a').click(send_data);
    // })
//$(document).ready(function(){
//
//	$(".add_score").click(send_data);
//});-

</script>

</body>
</html>
