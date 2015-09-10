<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/3/15
 * Time: 6:04 PM
 */
?>

<html>
<head>
<title>index</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div>
        <form action="controller.php" method="post">
            <table>
                <tr>
                    <td>Select Batch:</td>
                    <td>
                        <select name="b_id">
                            <option>--Select--</option>
                            <option value="1">Batch-01</option>
                            <option value="2">Batch-02</option>
                            <option value="3">Batch-03</option>
                        </select>
                    </td>
                    <td>Select Group:</td>
                    <td>
                        <select name="g_id">
                            <option>--Select--</option>
                            <option value="1">Group-01</option>
                            <option value="2">Group-02</option>
                            <option value="3">Group-03</option>
                        </select>
                    </td>
                    <td>Date:</td>
                    <td><input readonly  id="e_date" type="text" name="entry_date" value=""></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>Student id:</td>
                    <td><input type="number" name="s_id" value=""></td>
                    <td>Name:</td>
                    <td><input type="text" name="name" value=""></td>
                    <td>Attend</td>
                    <td>
                        <input type="radio" name="attendance" value="1">Yes
                        <input type="radio" name="attendance" value="0">No
                    </td>
                    <td></td>

                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td></td>

                    <td><input type="submit" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>

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
//function test()
//{
//    var today = new Date();
//    var dd = today.getDate();
//    var mm = today.getMonth()+1; //January is 0!
//    var yyyy = today.getFullYear();
//
//    if(dd<10) {
//        dd='0'+dd
//    }
//
//    if(mm<10) {
//        mm='0'+mm
//    }
//
//    today = mm+'/'+dd+'/'+yyyy;
//
//    console.log(today);
//}
</script>
</body>
</html>