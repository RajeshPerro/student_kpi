<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/3/15
 * Time: 11:27 PM
 */ ?>
<html>
    <head>
        <title>exam</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <form action="controller.php" method="post">
            <table>
                <tr>
                    <td>Student ID:</td>
                    <td><input type="number" name="s_id" value=""></td>
                    <td>Name:</td>
                    <td><input type="text" name="name" value=""></td>
                    <td>Batch</td>
                    <td>
                        <select name="b_id">
                            <option>--Select--</option>
                            <option value="1">Batch-01</option>
                            <option value="2">Batch-02</option>
                            <option value="3">Batch-03</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Group:</td>
                    <td>
                        <select name="g_id">
                            <option>--Select--</option>
                            <option value="1">Group-01</option>
                            <option value="2">Group-02</option>
                            <option value="3">Group-03</option>
                        </select>
                    </td>
                    <td>Assessment Type:</td>
                    <td>
                        <select id="ex" name="exam_type">
                            <option>--Select--</option>
                            <option value="ST">Small Test</option>
                            <option value="FT">Final Test</option>
                            <option value="ASS">Assignment</option>
                            <option value="PR">Project</option>
                        </select>
                    </td>
                    <td>Out Of:</td>
                    <td><input id="of" type="text" name="outof"></td>
                </tr>
                <tr>
                    <td>Obtained:</td>
                    <td><input onkeyup="score_cal()" id="ob" type="text" name="obtained"></td>
                    <td>Actual Score</td>
                    <td><input readonly id="ac" type="text" name="actual"></td>
                    <td>Date:</td>
                    <td><input readonly  id="e_date" type="text" name="entry_date" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><p style="color: red;">Score has been Convert in:</p></td>
                    <td><p style="color: brown;" id="score_msg">0</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" id="save" value="Save"></td>

                </tr>
            </table>
        </form>
    </body>
<script>
    $(document).ready(function() {
        var today = new Date();
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
        var result,actual, outof= parseFloat($("#of").val()), obtained= parseFloat($("#ob").val()),ac=$("#ac");
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
</script>
</html>