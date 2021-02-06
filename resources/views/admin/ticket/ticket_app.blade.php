
    <script type="text/javascript">

		var url = "{{route('posts.index')}}";



	</script>

	<script>
	var page = 1;

	var current_page = 1;

	var total_page = 0;

	var is_ajax_fire = 0;




	manageData();




	/* manage data list */

	function manageData() {



	    $.ajax({

	        dataType: 'json',

	        url: url,

	        data: {page:page}

	    }).done(function(data){



	    	total_page = data.last_page;

	    	current_page = data.current_page;



	    	$('#pagination').twbsPagination({

		        totalPages: total_page,

		        visiblePages: current_page,

		        onPageClick: function (event, pageL) {

		        	page = pageL;

	                if(is_ajax_fire != 0){

		        	  getPageData();

	                }

		        }

		    });



	    	manageRow(data.data);

	        is_ajax_fire = 1;

	    });

	}




	$.ajaxSetup({

	    headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	        }

	});




	/* Get Page Data*/

	function getPageData() {

		$.ajax({

	    	dataType: 'json',

	    	url: url,

	    	data: {page:page}

		}).done(function(data){

			manageRow(data.data);

		});

	}





	/* Add new Post table row */

	function manageRow(data) {

		var	rows = '';

		$.each( data, function( key, value ) {

		  	rows = rows + '<tr class="small" >';

		  	rows = rows + '<td>'+value.id_ticket+'</td>';

	      rows = rows + '<td role="cell" >'+value.emps.first_name+'</td>';
	      rows = rows + '<td>'+value.stores.computer_name+'</td>';

		  rows = rows + '<td data-id="'+value.id+'">';

        rows = rows + '<span data-toggle="modal" data-target="#edit-show" class="edit-show d-inline-block text-truncate" style="max-width: 70px;">'+value.content+'&nbsp;<i class="far fa-eye"></i></span> ';


        rows = rows + '</td>';

	      rows = rows + '<td>'+value.problem_type+'</td>';
	      rows = rows + '<td>'+value.created_at+'</td>';
		  if (value.id_staff==null)
	      rows = rows + '<td>'+'รอเจ้าหน้าทีตอบรับ'+'</td>';
		  else
		  rows = rows + '<td>'+value.it.first_name+'</td>';


            if(value.status=='success')
	            rows = rows + '<td><span class="badge badge-success lg">Success</span></td>';
            else if(value.status=='accept')
                rows = rows + '<td><span class="badge badge-primary">Accept</span></td>';
            else if(value.status=='failed')
                rows = rows + '<td><span class="badge badge-danger">Failed</span></td>';
            else if(value.status=='waiting')
				rows = rows + '<td><span class="badge badge-warning">Waiting</span></td>';
				 if(value.proceed=='waiting')
				rows = rows + '<td>รอแจ้งผล</td>';
				else if(value.status=='success')
				rows = rows + '<td>เสร็จสิน</td>';
				else
				rows = rows + '<td>'+value.proceed+'</td>';
	      		rows = rows + '<td>'+value.updated_at+'</td>';

				 if(value.status=='success')
				 	rows = rows + '<td>'+value.updated_at+'</td>';
				else
	      		rows = rows + '<td>'+value.end_time+'</td>';

				rows = rows + '<td>'+value.satisfaction+'</td>';

				@if(Auth::user()->type==0)
                	if(value.satisfaction==null)
                  rows = rows + '<td class=small data-id="'+value.id_ticket+'">';
                     if(value.status=='success'||value.status=='failed')

                    rows = rows + ' <button data-toggle="modal" data-target="#edit-satisfaction" class="edit-satisfaction fas fa-grin btn btn-primary small  btn-sm ">  </button>';

                    else if(value.status!='waiting')
                    rows = rows + '<button data-toggle="modal" data-target="#chat" class="edit-chat fab fa-rocketchat btn btn btn-info small edit-item btn-sm "></button> ';
                    else
					rows = rows + '';


						@else
					if(value.id_staff== null||value.id_staff=={{ Auth::user()->id_emp }})
                        if(value.satisfaction==null)
						rows = rows + '<td class=small data-id="'+value.id_ticket+'">';
						rows = rows + '<button data-toggle="modal" data-target="#edit-chat" class="edit-chat fab fa-rocketchat btn btn-info small btn-sm "></button> ';
			        	rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="fas fa-edit btn btn-primary small edit-item btn-sm "></button> ';

			        rows = rows + '<button class="fas fa-trash-alt btn btn-danger small remove-item btn-sm "> </button>';
				@endif



	        rows = rows + '</td>';

		  	rows = rows + '</tr>';

		});

		$("tbody").html(rows);

	}
	setInterval(getPageData, 5000);   // 1000 = 1 second



	/* Create new Post */

	$(".crud-submit").click(function(e){

	    e.preventDefault();

	    var form_action = $("#create-item").find("form").attr("action");

	    var id_emp = $("#create-item").find("input[name='id_emp']").val();
        var status = $("#create-item").find("input[name='status']").val();

	    var content = $("#create-item").find("textarea[name='content']").val();
	    var problem_type = $("#create-item").find("select[name='problem_type']").val();



	    $.ajax({

	        dataType: 'json',

	        type:'POST',

	        url: form_action,

	        data:{id_emp:id_emp, content:content,problem_type:problem_type,status:status}

	    }).done(function(data){

	        getPageData();

	        $(".modal").modal('hide');

	        toastr.success('แจ้งซ่อมเรียบร้อย', 'Success Alert', {timeOut: 5000});

	    });

	});











	/* Remove Post */

	$("body").on("click",".remove-item",function(){

	    var id = $(this).parent("td").data('id');

	    var c_obj = $(this).parents("tr");



	    $.ajax({

	        dataType: 'json',

	        type:'delete',

	        url: url + '/' + id,

	    }).done(function(data){



	        c_obj.remove();

	        toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});

	        getPageData();



	    });

	});














	/* Edit Post */

	$("body").on("click",".edit-item",function(){

	    var id = $(this).parent("td").data('id');

	    var status = $(this).parent("td").prev("td").prev("td").text();

	    var id_staff = $(this).parent("td").prev("td").text();
		var proceed = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();



	    $("#edit-item").find("input[name='status']").val(status);

	    $("#edit-item").find("textarea[name='id_staff']").val(id_staff);
		 $("#edit-item").find("input[name='proceed']").val(proceed);


	    $("#edit-item").find("form").attr("action",url + '/' + id);

	});




	/* Updated new Post */

	$(".crud-submit-edit").click(function(e){

	    e.preventDefault();

	    var form_action = $("#edit-item").find("form").attr("action");

	    var status = $("#edit-item").find("select[name='status']").val();

	    var id_staff = $("#edit-item").find("input[name='id_staff']").val();
		var proceed = $("#edit-item").find("textarea[name='proceed']").val();
		var end_time = $("#edit-item").find("input[name='end_time']").val();
		var satisfaction = $("#edit-satisfaction").find("select[name='satisfaction']").val();


	    $.ajax({

	        dataType: 'json',

	        type:'PUT',

	        url: form_action,

	        data:{status:status, id_staff:id_staff,proceed:proceed,end_time:end_time,satisfaction:satisfaction}

	    }).done(function(data){

	        getPageData();

	        $(".modal").modal('hide');

	        toastr.success('อัพเดทเรียบร้อย.', 'Success Alert', {timeOut: 5000});

	    });

	});

$("body").on("click",".edit-satisfaction",function(){

	    var id = $(this).parent("td").data('id');

	    var status = $(this).parent("td").prev("td").prev("td").text();
		var proceed = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();



	    $("#edit-item").find("input[name='status']").val(status);

		 $("#edit-item").find("input[name='proceed']").val(proceed);


	    $("#edit-item").find("form").attr("action",url + '/' + id);

	});
	$(".crud-submit-edit1").click(function(e){

	    e.preventDefault();

	    var form_action = $("#edit-item").find("form").attr("action");

	    var status = $("#edit-item").find("select[name='status']").val();

	    var id_staff = $("#edit-item").find("input[name='id_staff']").val();
		var proceed = $("#edit-item").find("textarea[name='proceed']").val();
		var end_time = $("#edit-item").find("input[name='end_time']").val();
		var satisfaction = $("#edit-satisfaction").find("select[name='satisfaction']").val();


	    $.ajax({

	        dataType: 'json',

	        type:'PUT',

	        url: form_action,

	        data:{satisfaction:satisfaction}

	    }).done(function(data){

	        getPageData();

	        $(".modal").modal('hide');

	        toastr.success('อัพเดทเรียบร้อย.', 'Success Alert', {timeOut: 5000});

	    });

	});

	
		
		





  /* Show*/


$("body").on("click",".edit-show",function(){

    var id = $(this).parent("td").data('id');

    var content = $(this).parent("td").text();


    $("#edit-show").find("textarea[name='title']").val(content);

    $("#edit-show").find("form").attr("action",url + '/' + id);

});

  /* Chat*/

$("body").on("click",".edit-chat",function(){

    var id = $(this).parent("td").data('id');

    var content = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();


    $("#edit-chat").find("input[name='id_ticket']").val(content);

    $("#edit-chat").find("form").attr("action",url + '/' + id);

});

	</script>
