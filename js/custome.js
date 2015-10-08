/**
 * Created by rajesh on 9/9/15.
 */

//Common area JS
//Date capture function start..
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
//Date capture function End..


//input_score page JS

//Score calculation in modal..
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
            save.attr('disabled', false);
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
            save.attr('disabled', false);
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
            save.attr('disabled', false);
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
            save.attr('disabled', false);
        }
    }
    else
    {
        score_msg.text(0);
    }
    console.log(exam_type);

}

//    skill select dropdown start
$(document).ready(function(){
    $(".be").hide();
    $(".fe").hide();
    var flag=0;
    $("#front_end").change(function(){
        if($("#front_end").val()=="Front End")
        {
            if(flag===1){
                $(".default").attr('selected', true);
                $(".fe").show();
                $(".be").hide();
            }
            else {
                $(".fe").show();
                $(".be").hide();
            }

        }else if($("#front_end").val()=="Back End")
        {
            $(".default").attr('selected', true);
            $(".be").show();
            $(".fe").hide();
            flag=1;

        }else
        {

        }
    });
    $("#front_end").change(function(){
        if($("#front_end").val()=="Front End" || $("#front_end").val()=="Back End")
        {
            $(".default").hide();
        }
    });
});
//skill select dropdown End

//Sending data in modal..
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
//ajax calling and sorting data start

$(document).ready(function(){
    $('#group_id').change(function(){
        //$('#test_data_table').html('<center><img width="50" height="auto" src="/edu_kpi/images/ajax-loader-big.gif"> loading...</center>');
        $.ajax({

            type: "GET",
            url: "test.php",
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val(),
            success: function(aa){
                $('#test_data_table').html(aa);
                setTimeout(function () {
                    $(".add_score").click(send_data);
                }, 100);

            },
            error: function(x)
            {

            }

        }); // Ajax Call
    }); //event handler
    $('#batch_id').change(function(){

        $.ajax({

            type: "GET",
            url: "test.php",
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val(),

            success: function(aa){

                $('#test_data_table').html(aa);
                setTimeout(function () {

                    $(".add_score").click(send_data);
                }, 100);

            },
            error: function(x)
            {

            }

        }); // Ajax Call
    }); //event handler

});


//ajax calling and sorting data end


//Just for test..no need this function you can remove..
function fuck()
{
    var batchid =$("#batch_id").val();
    var groupid=$("#group_id").val();
    var entrydate=$("#e_date").val();
    console.log(batchid);
    console.log(groupid);
    console.log(today);
}
//Dashboard JS

function storage_remove()
{
    localStorage.removeItem("username");
    localStorage.removeItem("usertoken");
    console.log("hello!");
   // window.location.href='http://localhost/edu_kpi/index.php';

}

$(document).ready(function signout(){
   $("#sign-out").click(storage_remove);

});

$(window).load(function(){

    $('td.final_result').each(function()
    {
        if($(this).html()>=80)
        {
            $(this).css("background-color","green");
            $(this).css("color","white");
        }

        if($(this).html()<50)
        {
            $(this).css("background-color","red");
            $(this).css("color","white");
        }
        if($(this).html()>=50&&$(this).html()<70)
        {
            $(this).css("background-color","orange");
            $(this).css("color","white");
        }
        if($(this).html()>=70&&$(this).html()<80)
        {
            $(this).css("background-color","mediumseagreen");
            $(this).css("color","white");
        }


    });

});

//ajax calling for dash board
$(document).ready(function(){
    var frm_date = $( "#from-date" ), to_date= $( "#to-date" );
    var skill_type =$("#front_end"), skill_name=$("#skill-name");
    frm_date.datepicker({dateFormat: "yy-mm-dd"});
    to_date.datepicker({dateFormat: "yy-mm-dd"});


    $('.dashboard-batch').change(function(){
        //console.log("Batch is:"+$('#batch_id').val());
        //console.log("Group is:"+$('#group_id').val());
       $.ajax({

            type: "GET",
            url: "dashboard_short.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val() + '&frm_date='+frm_date.val() + '&to_date='+to_date.val() +'&skill_type='+skill_type.val()+'&skill_name='+skill_name.val(),
            success: function(aa){
                $('#dashboard-data-table').html(aa);
               $('td.final_result').each(function()
                {
                    if($(this).html()>=80)
                    {
                        $(this).css("background-color","green")
                        $(this).css("color","white")
                    }

                    if($(this).html()<50)
                    {
                        $(this).css("background-color","red")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=50&&$(this).html()<70)
                    {
                        $(this).css("background-color","orange")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=70&&$(this).html()<80)
                    {
                        $(this).css("background-color","mediumseagreen");
                        $(this).css("color","white");
                    }

                })


            },
            error: function(x)
            {

            }

        }); // Ajax Call
    }); //event handler
    $(".date-value").change(function(){
        console.log(frm_date.val());
        console.log(to_date.val());
        $.ajax({

            type: "GET",
            url: "dashboard_short.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val() + '&frm_date='+frm_date.val() + '&to_date='+to_date.val() +'&skill_type='+skill_type.val()+'&skill_name='+skill_name.val(),
            success: function(aa){
                $('#dashboard-data-table').html(aa);
                $('td.final_result').each(function()
                {
                    if($(this).html()>=80)
                    {
                        $(this).css("background-color","green")
                        $(this).css("color","white")
                    }

                    if($(this).html()<50)
                    {
                        $(this).css("background-color","red")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=50&&$(this).html()<70)
                    {
                        $(this).css("background-color","orange")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=70&&$(this).html()<80)
                    {
                        $(this).css("background-color","mediumseagreen");
                        $(this).css("color","white");
                    }

                })


            },
            error: function(x)
            {

            }

        });
    });
    $(".skill-set").change(function(){
        console.log(skill_type.val());
        console.log(skill_name.val());
        $.ajax({

            type: "GET",
            url: "dashboard_short.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + $('#batch_id').val() + '&group=' + $('#group_id').val() + '&frm_date='+frm_date.val() + '&to_date='+to_date.val() +'&skill_type='+skill_type.val()+'&skill_name='+skill_name.val(),
            success: function(aa){
                $('#dashboard-data-table').html(aa);
                $('td.final_result').each(function()
                {
                    if($(this).html()>=80)
                    {
                        $(this).css("background-color","green")
                        $(this).css("color","white")
                    }

                    if($(this).html()<50)
                    {
                        $(this).css("background-color","red")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=50&&$(this).html()<70)
                    {
                        $(this).css("background-color","orange")
                        $(this).css("color","white")
                    }
                    if($(this).html()>=70&&$(this).html()<80)
                    {
                        $(this).css("background-color","mediumseagreen");
                        $(this).css("color","white");
                    }

                })


            },
            error: function(x)
            {

            }

        });
    });
});
//Upload Page validation
