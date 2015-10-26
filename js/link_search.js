/**
 * Created by rajesh on 10/26/15.
 */
$(document).ready(function(){
       var link_upload_click=$("#link_upload_click");
    $("#upload-form").hide();
    $("#help-image").hide();
    link_upload_click.click(function(){
        $("#upload-form").toggle("slow", function() {
            // Animation complete.
        });
        $("#help-image").toggle("slow", function() {
            // Animation complete.
        });
    });


//.........link auto search..........
    var editorTitle=$("#search_link");
    $("#search_link").keyup(function(){
        $.ajax({

            type: "GET",
            url: "link_search.php",
            headers: { 'x-my-custom-header': '' },
            data: 'search=' + editorTitle.val(),
            success: function(aa){
                $('#search_data').html(aa);
            },
            error: function(x)
            {

            }

        });
        console.log(editorTitle.val());
    });


//..........link auto search end..........

});
