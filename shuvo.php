<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/9/15
 * Time: 1:39 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select option plugin</title>
</head>
<body>


<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
    $(document).ready(function(){
        $(".be").hide();
        $(".fe").hide();
        $("#front_end").change(function(){
            if($("#front_end").val()=="fe")
            {
                $(".fe").show();
                $(".be").hide();
            }else if($("#front_end").val()=="be")
            {
                $(".be").show();
                $(".fe").hide();
            }else
            {

            }
        });
        $("#front_end").change(function(){
            if($("#front_end").val()=="fe")
            {
                $(".default").hide();
            }
        });
    });
</script>
</body>
</html>
