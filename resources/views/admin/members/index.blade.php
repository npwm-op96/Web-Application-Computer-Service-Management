@if(Auth::user()->type==1)
@include('/admin/partials/header')
@include('/admin/partials/sidebar')

     <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



@if(Auth::user()->type==1)



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
              <div class="row">
              <div class="col-2">
               <button type="button" name="create_record" id="create_record" class="btn btn-success btn-circle btn-lg"><span class="
         fas fa-plus-circle"></span></button>
              </div>
              <div class="row">ผู้ดูแลระบบ = 1 ผู้ใช้=0</div>

              </div></div></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class=" small" id="user_table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >รหัสพนักงาน</th>
                        <th >ชื่อ</th>
                        <th width="10%">รหัสผ่าน</th>
                        <th >ระดับ</th>
                        <th >สถานะ</th>
                        <th >ตั้งค่่า</th>
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
        <h4 class="modal-title">เพิ่มสมาชิก</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >รหัสพนักงาน : </label>
            <div class="col-md-8">
             <input type="text" name="id_emp" id="id_emp" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">รหัสผ่าน : </label>
            <div class="col-md-8">
             <input type="text" name="password" id="password" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">ระดับ : </label>
            <div class="col-md-8">

               <select id="type" name="type" class="browser-default custom-select">
            <option value=1>ผู้ดูแลระบบ</option>
            <option value=0>ผู้ใช้</option>

          </select>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">สถานะ : </label>
            <div class="col-md-8">

                           <select id="status" name="status" class="browser-default custom-select">
            <option value=1>ปกติ</option>
            <option value=0>ไม่ปกติ</option>
            <option value=2>ระงับ</option>



          </select>
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
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">คุณแน่ใจที่จะลบ สมาชิกท่านนี้ออกจาดระบบ ?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>





<script>
$(document).ready(function(){

 $('#user_table').dataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('member.index') }}",
  },
  columns:[
   {
    data: 'id_emp',
    name: 'id_emp'
   },
   {
    data: 'emps.first_name',
    name: 'emps.first_name'
   },

   {
    data: 'password',
    name: 'password'
   },
   {
    data: 'type',
    name: 'type'
   },
   {
    data: 'status',
    name: 'status'
   },

   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("เพิ่มสมาชิก");
     $('#action_button').val("เพิ่มข้อมูลสมาชิก");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('member.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    processing: true,
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
    url:"{{ route('member.update') }}",
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
   url:"/member/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#id_emp').val(html.data.id_emp);
    $('#password').val();
    $('#type').val(html.data.type);
    $('#status').val(html.data.status);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("จัดการข้อมูลสมาชิก");
    $('#action_button').val("แก้ไข");
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
   url:"member/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('กำลังลบ...');
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

@else
@endif
@endif
@include('/admin/partials/js')
