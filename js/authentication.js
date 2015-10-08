$(document).ready(function() {


	var current_batch_id;
	var current_group_id;
	$("#link_loading").hide();

	batch_come();
	
	$("#bt_login").click(function(){


		var userName = $('#username').val();
		var pass = $('#password').val();


	//	console.log(userName);

		 $.ajax({
		 	type: 'post', 
		 	url: 'http://www.coderstrust.com/mentors/login.json', 
		 	data: {"mentor": {"email": userName,"password": pass}}, 
		 	error: function (data) {
		 		alert("you are not authentic user")
		 	}, 
		 	success: function (data) {
		 		
				var UserName=data.user;
				var Token_data=data.token;
		 		save_token(data.user, data.token);
		 		window.location = "/edu_kpi/dashboard.php?user="+UserName+"&token="+Token_data;
				//window.location.href = "somepage.php?w1=" + hello + "&w2=" + world;



			}
		})
	});

	// start token save
		var save_token = function(user_name, user_token)
		{
				console.log(user_name);
		 		console.log(user_token);	

		 		if (typeof(Storage) !== "undefined") {
				    // Store
				    localStorage.setItem("usertoken", user_token);
				    localStorage.setItem("username", user_name);
				    // Retrieve
				    // alert(localStorage.getItem("usertoken"));
				} else {
				    alert("browser not supported");
				}
		}
	// end taken save

	// start batch come

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

  				 $('#bt_select').attr('enabled', 'true');
  				 $('#bt_select').append(
			                $("<option></option>").text("Select Batch").val("select")
			           );
			        $.each(data, function() {
			           $('#bt_select').append(
			                $("<option></option>").text(this.name).val(this.id)
			           );
			        });
  			}
  		})
	}

	// end of batch come

	// start group come
	function group_come(batch_id){

		var token = 'Bearer '+localStorage.getItem("usertoken");
		$.ajax({headers: {
   'Authorization': token }, 
	   type: 'get', 
	   url: 'http://www.coderstrust.com/api/batches/'+batch_id+'/groups.json', 
	   error: function (data) {console.log(data)}, 
	   success: function (data) {
	   	console.log(data);
	   	 $('#gr_select').attr('enabled', 'true');
	   	 $('#gr_select').html("");
	   	 $('#gr_select').append(
			                $("<option></option>").text("Select Group").val("select")
			           );
			        $.each(data, function() {
			           $('#gr_select').append(
			                $("<option></option>").text(this.name).val(this.id)
			           );
			        });
	   }
	})

	}
	// end group come

	$("#bt_select").change(function(){

       var batchId = $("#bt_select").val();
       console.log(batchId);
       current_batch_id = batchId;
       group_come(batchId);
    });


	$("#gr_select").change(function(){

		$('#worktable').html("");
		$('#records_table').html("");
		$("#link_loading").show();
       var groupId = $("#gr_select").val();
       console.log(groupId);
       current_group_id = groupId;

       student_come();
    });


	//start get student list for attendance
	function student_come(){
		// alert(current_batch_id+" "+current_group_id);

		var token = 'Bearer '+localStorage.getItem("usertoken");

		$.ajax({headers: {
			'Authorization': token },
			type: 'get',
			url: 'http://www.coderstrust.com/api/batches/'+current_batch_id+'/groups/'+current_group_id+'/students.json',
			error: function (data) {console.log(data)},
			success: function (data) {

				console.log(data);
				var trHTML = '';
				$('#records_table').html("");
				$.each(data, function() {
					// console.log(this.name+"  "+this.hours_spent_today);
					trHTML += '<tr><td><input  class="form-control input-sm transparent" readonly type="number" name="s_id[]" value="'+this.id+'"></td><td><input  class="form-control input-sm transparent" readonly type="text" name="name[]" value="'+this.name+ '"</td><td><input  type="checkbox" name="attendance[]" value="1" id="'+ this.id +'"> Yes <input  type="checkbox" name="attendance[]" value="0"> No </td></tr>';
					//trHTML += '<tr><td>'+this.id+'</td><td>'+this.name+ '</td><td><input  type="checkbox" name="attendance[]" value="1" id="'+ this.id +'"> Yes <input  type="checkbox" name="attendance[]" value="0"> No </td></tr>';

				});

				$('#records_table').append('<tr><th>Student ID</th><th>Student Name</th><th>Attendance</th></tr>');
				$('#records_table').append(trHTML);



				//worksnap hours

				var trHTML = '';
				$('#worktable').html("");
				$.each(data, function() {
					console.log(this.name+"  "+this.hours_spent_today);
					trHTML += '<tr><td><input  class="form-control input-sm transparent" readonly type="number" name="s_id[]" value="'+this.id+'"></td><td><input  class="form-control input-sm transparent" readonly type="text" name="name[]" value="'+this.name+ '"</td><td><input  class="form-control input-sm transparent" readonly type="text" name="hour[]" value="'+this.hours_spent_today+ '"</td></tr>';

				});

				$("#link_loading").hide();
				$('#worktable').append('<tr><th>Student ID</th><th>Student Name</th><th>Wroksnap Hours</th></tr>');
				$('#worktable').append(trHTML);

			}
		})

	}

	//end get student list


});