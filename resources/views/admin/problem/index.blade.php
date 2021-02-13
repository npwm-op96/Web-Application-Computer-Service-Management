@if(Auth::user()->type==1)
@include('/admin/partials/header')
@include('/admin/partials/sidebar')



@if(Auth::user()->type==1)


 
     <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<style type="text/CSS">
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
         tr {
            vertical-align: bottom;

            text-align:center;
            font-size:100%;
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
  <div class="col-12">
  <div class="col-md-12 col-lg-12 col-xl-12">
     <div class="card shadow mb-4">
              
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><div>
              <div class="row">
              <div class="col-2">
               <button type="button" name="create_record" id="create_record" class="btn btn-success btn-circle btn-lg"><span class="
         fas fa-plus-circle"></span></button>
              </div>
           
              
              </div></div></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class=" small" id="user_table" width="80%" cellspacing="0">
                  <thead>
                    <tr>
                        <th >รหัส</th>
                        <th >หมวดปัญหา</th>
                        <th >สร้างเมือ</th>
                        <th >อัพเดท</th>
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
          
          <h4 class="modal-title">เพิ่มรายแผนก</h4>
	   <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >หมวดปัญหา: </label>
            <div class="col-md-8">
             <input type="text" name="name_type" id="name_type" class="form-control" />
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
            <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <h6 align="center" style="margin:0;">คุณแน่ใจที่จะลบข้อมูลออกจาดระบบ ?</h6>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
    </div>
</div>





<script>
$(document).ready(function(){
  $.fn.dataTable.ext.errMode = 'none';

 $('#user_table').dataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('problem.index') }}",
  },
  columns:[
   {
    data: 'id',
    name: 'id'
   },
   {
    data: 'name_type',
    name: 'name_type'
   },

        {
    data: 'created_at',
    name: 'created_at'
   },
        {
    data: 'updated_at',
    name: 'updated_at'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("เพิ่มรายการ");
     $('#action_button').val("เพิ่ม");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  ($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('problem.store') }}",
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
 });

 
 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"problem/destroy/"+user_id,
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