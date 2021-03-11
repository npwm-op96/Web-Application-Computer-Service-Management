	<script>
    	// function getPageData() {

		$.ajax({

	    	dataType: 'json',

	    	url: url,

	    	data: {data},

		}).done(function(data){

			manageRow(data.data);

		});

	// }




	/* Add new Post table row */

	function manageRow(data) {

		var	result = '';

		$.each( data, function( key, value ) {

		  	result = result + '<div class="row" >';

		  	result= result + '<div>'+value.id_ticket+'</div>';
	      result = result + '<div>'+value.problem_type+'</div>';
	      result = result + '<div>'+value.created_at+'</div>';
	      result = result + '<div>'+value.id_staff+'</div>';

		  	result = result + '</div>';

		});

		$("tbody").html(result);

	}
	setInterval(manageData, 10000);   // 1000 = 1 second


	// });


	/* Edit Post */

	$("body").on("click",".profile",function(){


	});


	</script>
