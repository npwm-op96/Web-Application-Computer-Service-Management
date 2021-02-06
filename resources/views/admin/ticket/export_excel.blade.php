

@if(Auth::user()->type==1)
@include('/admin/partials/header')
@include('/admin/partials/sidebar')
@else
@include('/user/partials/header')
@include('/user/partials/sidebar')

@endif

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




        td {
            vertical-align: bottom;

            text-align:center;
            font-size:70%;
        }

        .header>td{
            font-weight:bold;
            background : #c4c4c4;               
        }

    </style>
  <div class="container col-12">
     <div class="card shadow mb-4">
  
            <div class="card-body">
              <div class="table-responsive">
              
                <table  id="user_table" width="100%" cellspacing="0">
                  <thead class="small thead-dark ">
                    <tr class="small">
                        <th >รหัส</th>
                        <th >ชื่อผู้แจ้ง</th>
                        <th >ปัญหา</th>
                        <th >ประเภท</th>
                        <th >เวลาแจ้ง</th>
                        <th >เจ้าหน้าที่</th>
                        <th >สถานะ</th>
                        <th >ความคืนหน้า</th>
                        <th >เวลาการเสร็จสิน</th>
                        <th >คะแนนการประเมิน</th>
 
                    </tr>
                  </thead>
                  <tr class="small">
                  </tr>


                </table>
              </div>
            </div>
          </div>
  </div>



@include('/admin/partials/footer');


 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https:////cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"></script>


<script>
$(document).ready(function(){
 $.fn.dataTable.ext.errMode = 'none';
 
 $('#user_table').DataTable({

   dom: 'Bfrtlp',

        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<button class="btn btn-warning"><i class="far fa-copy"></i></button>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<button class="btn btn-success"><i class="fas fa-file-excel"></i></button>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<button class="btn btn-info"><i class="far fa-edit"></i></button>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<button class="btn btn-danger"><i class="fas fa-file-pdf"></i></button>',
                titleAttr: 'PDF'
            },

            
        ],
    
   
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('export.index') }}",
  },
  columns:[
  
   {
    data: 'id_ticket',
    name: 'id_ticket'
   },
   {
    data: 'emps.first_name',
    name: 'id_emp'
   },
   {
    data: 'content',
    name: 'content'
   },
      {
    data: 'problem_type',
    name: 'problem_type'
   },
   {
    data: 'created_at',
    name: 'created_at'
   },

     {
    data: 'it.first_name',
    name: 'it.first_name'
   },
   {
    data: 'status',
    name: 'status'
   },
     {
    data: 'proceed',
    name: 'proceed'
   },
     {
    data: 'end_time',
    name: 'end_time'
   },
     {
    data: 'satisfaction',
    name: 'satisfaction'
   },
   
  ],
        
 });
 



});
</script>
