/**
 * Created by rajesh on 9/28/15.
 */
$(document).ready(function(){
  var atten_date=$("#atten-date"), batch_id=$("#batch_id"),group_id=$("#group_id");
    atten_date.datepicker({dateFormat: "yy-mm-dd"});

       $(".atten-parameter").change(function(){
       console.log("wtf"+"  Batch"+batch_id.val()+"Group:"+group_id.val()+"Date:"+atten_date.val());
           $.ajax({

               type: "GET",
               url: "attendance_search.php",
               headers: { 'x-my-custom-header': '' },
               data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val() + '&date='+atten_date.val(),
               success: function(aa){
                   $('#records_table').html(aa);
               },
               error: function(x)
               {

               }

           });
       });
});