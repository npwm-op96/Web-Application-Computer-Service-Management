<?php

use App\Employee;
use App\Store;
?>
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้ใช้</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        

      </div>
      <div class="container" style="
                background-image: url('https://source.unsplash.com/random');
                background-size: 500px 255px;
                height: 250px;
          " >
      <br><br> <br><br><br>
      <div class="d-flex justify-content-center">
      <img class="img-profile rounded-circle "  src="{{ URL::to('/') }}/images/{{Auth::user()->emps->image }}" style="
      
      width:40%;
      /* height:60%; */
      
      
      ">
      </div>
      <br>
        </div>
        <br><br><br>
  

        <?php $id= Auth::user()->emps->id_emp ?>
<?php $employee = Employee::latest()->with('dep')->where('id_emp',$id)
        ->get(); 
  ?>
  <?php $store = Store::latest()->where('id_emp',$id)
        ->get(); 
  ?>

     @foreach ($employee as $employee)
     

     

        <div class="container row">
  
      <div class="container"><i class="fas fa-address-card"></i>  ชื่อ: {{$employee->first_name}}  
        <br><i class="far fa-address-card"></i>  นามสกุล: {{$employee->last_name}}
        <br><i class="fas fa-key"></i>  รหัสพนักงาน: {{ Auth::user()->emps->id_emp }} 
        <br><i class="fas fa-key"></i>  แผนก: {{$employee->dep->name_dep}}
        <br><i class="fas fa-chess-knight"></i>  ตำแหน่ง: {{ Auth::user()->emps->position }}
        <br><i class="fas fa-chalkboard-teacher"></i>  ชื่ออุปกณ์ที่ใช้:  
        @foreach ($store as $store) 
         {{ $store->computer_name }}
        @endforeach
      <br><br><br><br><br>
      @endforeach
     
        		<div id='profile' for='profile'></div>
      <div>
      </div>
      </div>

      
      
      
      
      
      

  



      </div>

    </div>

  </div>

</div>

