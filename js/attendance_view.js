/**
 * Created by rajesh on 9/29/15.
 */
/**
 * Created by rajesh on 9/28/15.
 */
$(document).ready(function(){
    var  batch_id=$("#batch_id"),group_id=$("#group_id");

    $(".atten-parameter").change(function(){
        console.log("Batch"+batch_id.val()+"Group:"+group_id.val());
        $.ajax({

            type: "GET",
            url: "attendance_show.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val(),
            success: function(aa){
                $('#records_table').html(aa);
            },
            error: function(x)
            {

            }

        });
    });
});