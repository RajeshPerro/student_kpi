/**
 * Created by rajesh on 9/28/15.
 */
$(document).ready(function(){
  var atten_date=$("#atten-date"), batch_id=$("#batch_id"),group_id=$("#group_id");
    atten_date.datepicker({dateFormat: "yy-mm-dd"});

       $(".atten-parameter").change(function(){
       console.log("wtf"+"Batch"+batch_id.val()+"Group:"+group_id.val()+"Date:"+atten_date.val());
    });
});