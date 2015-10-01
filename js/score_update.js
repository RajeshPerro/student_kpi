/**
 * Created by rajesh on 10/1/15.
 */
$(document).ready(function(){
   var BatchId=$("#batch_id"), GroupId=$("#group_id");
    $(".score-parameter").change(function(){
        console.log("Batch="+BatchId.val()+"Group="+GroupId.val());
        $.ajax({

            type: "GET",
            url: "id_show.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + BatchId.val() + '&group=' + GroupId.val(),
            success: function(aa){
                $('#student-id').html(aa);
                //console.log(aa);
            },
            error: function(x)
            {

            }

        });
    });

});
