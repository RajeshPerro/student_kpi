$(document).ready(function(){

    var current_batch_id;
    var current_group_id;
    batch_come();
    function batch_come () {
        // body...
        var token = 'Bearer '+localStorage.getItem("usertoken");
        console.log(token);
        $.ajax({
            headers: {
                'Authorization': token },
            type: 'get',
            url: 'http://www.coderstrust.com/api/batches.json',
            error: function (data) {console.log(data)},
            success: function (data) {
                console.log(data)

                $('#batch_id').attr('enabled', 'true');
                $('#batch_id').append(
                    $("<option></option>").text("Select Batch").val("select")
                );
                $.each(data, function() {
                    $('#batch_id').append(
                        $("<option></option>").text(this.name).val(this.id)
                    );
                });
            }
        })
    }

    // start group  finding

    function group_come(batch_id){

        var token = 'Bearer '+localStorage.getItem("usertoken");
        $.ajax({headers: {
            'Authorization': token },
            type: 'get',
            url: 'http://www.coderstrust.com/api/batches/'+batch_id+'/groups.json',
            error: function (data) {console.log(data)},
            success: function (data) {
                console.log(data);
                $('#group_id').attr('enabled', 'true');
                $('#group_id').html("");
                $('#group_id').append(
                    $("<option></option>").text("Select Group").val("select")
                );
                $.each(data, function() {
                    $('#group_id').append(
                        $("<option></option>").text(this.name).val(this.id)
                    );
                });
            }
        })

    }



    $("#batch_id").change(function(){

        var batchId = $("#batch_id").val();
        console.log(batchId);
        current_batch_id = batchId;
        group_come(batchId);
    });


    $("#group_id").change(function(){

        var groupId = $("#group_id").val();
        console.log(groupId);
        current_group_id = groupId;
        //student_come();
    });

});