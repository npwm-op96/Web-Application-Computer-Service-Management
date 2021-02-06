@include('/admin/partials/header')
@include('/admin/partials/sidebar')






     <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
     <style>
body{
            font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .button{
          background:#8FB9A8;
        }


        .center{
            text-align:center;
        }

        .table-bordered {

            font-size : .7em;
        }




        td {
            vertical-align: bottom;

            text-align:center;
            font-size:100%;
        }

        .header>td{
            font-weight:bold;
            background : #c4c4c4;
        }

    </style>
  <div class="container col-12">
     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><div>
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-circle btn-lg"><span class="
         fas fa-plus-circle"></span></button>
              </div></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="small" id="user_table" width="85%"  cellspacing="0">
                  <thead>
                    <tr>
                        <th width='10px' >Image</th>
                        <th >First Name</th>
                        <th >Last Name</th>
                        <th >ID_Emp</th>
                        <th >แผนก</th>
                        <th >Position</th>
                        <th >Action</th>
                    </tr>
                  </thead>


                </table>
              </div>
            </div>
          </div>
  </div>


<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
     <h4 class="modal-title">เพิ่มพนักงาน</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4"> ชื่อ : </label>
            <div class="col-md-8">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">นามสกุล : </label>
            <div class="col-md-8">
             <input type="text" name="last_name" id="last_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">รหัสพนักงาน : </label>
            <div class="col-md-8">
             <input type="text" name="id_emp" id="id_emp" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">แผนก : </label>
            <div class="col-md-8">

              				<select name="id_dep" id="id_dep" class="browser-default custom-select">

	  <?php
			use App\Department;
			  ?>

			  <?php
			  $department = Department::latest()->get(); ?>
			  @foreach ( $department as $department)


            	<option value="{{$department->id_dep}}">{{$department->name_dep}}</option>

				@endforeach
            </select>

            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Position : </label>
            <div class="col-md-8">
             <input type="text" name="position" id="position" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">เลือกรูปพนักงาน : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image"  />
             <span id="store_image"></span>
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('employee.index') }}",
  },
  columns:[
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/images/" + data + " width='50px' class='img-circle' alt='Responsive image' />";
    },
    orderable: false
   },
   {
    data: 'first_name',
    name: 'first_name'
   },
   {
    data: 'last_name',
    name: 'last_name'
   },
   {
    data: 'id_emp',
    name: 'id_emp'
   },
   {
    data: 'dep.name_dep',
    name: 'dep.name_dep'
   },
   {
    data: 'position',
    name: 'position'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("เพิ่มพนักงาน");
     $('#action_button').val("เพิ่มข้อมูลพนักงาน");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('employee.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('employee.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   });
  }
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/employee/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#first_name').val(html.data.first_name);
    $('#last_name').val(html.data.last_name);
    $('#id_emp').val(html.data.id_emp);
    $('#id_dep').val(html.data.id_dep);
    $('#position').val(html.data.position);
    $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='50px' class='img-circle' />");
    $('#store_image').append("<input  type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"employee/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });

});
</script>
@include('/admin/partials/js')
