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


    $("#student-id").change(function(){
        console.log("Batch="+BatchId.val()+"Group="+GroupId.val()+"Student Id="+$("#student-id").val());
        $.ajax({

            type: "GET",
            url: "name_show.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + BatchId.val() + '&group=' + GroupId.val() + '&s_id=' +$("#student-id").val(),
            success: function(aa){
                $('#name-show').html(aa);
                //console.log(aa);
            },
            error: function(x)
            {

            }

        });
    });

    $(".date-show").change(function(){
        console.log("Batch="+BatchId.val()+"Group="+GroupId.val()+"Student Id="+$("#student-id").val());

        console.log("Name="+$("#student-name").val()+"ExamType="+$("#exam-type").val()+"Skill="+$("#front_end").val()+"SkillName="+$("#skill-name").val());
        $.ajax({

            type: "GET",
            url: "date_show.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + BatchId.val() + '&group=' + GroupId.val() + '&s_id=' +$("#student-id").val() +'&name='+$("#student-name").val()+'&ExamType='+$("#exam-type").val()+'&Skill='+$("#front_end").val()+'&SkillName='+$("#skill-name").val(),
            success: function(aa){
                $('#date-select').html(aa);
                console.log(aa);
            },
            error: function(x)
            {

            }

        });
    });

    $("#date-select").change(function(){
        console.log("Batch="+BatchId.val()+"Group="+GroupId.val()+"Student Id="+$("#student-id").val());

        console.log("Name="+$("#student-name").val()+"ExamType="+$("#exam-type").val()+"Skill="+$("#front_end").val()+"SkillName="+$("#skill-name").val());
        $.ajax({

            type: "GET",
            url: "score_show.php",
            headers: { 'x-my-custom-header': '' },
            data: 'batch=' + BatchId.val() + '&group=' + GroupId.val() + '&s_id=' +$("#student-id").val() +'&name='+$("#student-name").val()+'&ExamType='+$("#exam-type").val()+'&Skill='+$("#front_end").val()+'&SkillName='+$("#skill-name").val()+'&date='+$("#date-select").val(),//+'&outof='+$("#of").val()+'&obtain='+$("#obtain").val()+'&actual='+$("#actual").val(),
            success: function(aa){
                $('#score-show').html(aa);

            },
            error: function(x)
            {

            }

        });
    });
});
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

function score_cal()
{
    var result,actual, outof= parseFloat($("#of").val()), obtained= parseFloat($("#obtain").val()),ac=$("#actual");
    var exam_type=$("#exam-type").val(),score_msg=$("#score_msg"),save=$("#save");
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