@include('/admin/partials/header')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div id="wrapper" >

    <!-- Sidebar -->
    <ul class="shadow navbar-nav sidebar sidebar-dark" id="accordionSidebar" style="  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Management<sup>IT</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ url('chart') }}">
                <i class="fas fa-chart-pie"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ url('post_public') }}">
                <i class="fas fa-comment-alt"></i>
                <span>โพสสาธารณะ</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            เมนูการใช้งาน
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-box-open"></i>
                <span>คลังอุปกรณ์</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage</h6>
                    <a class="collapse-item" href="{{ url('stores') }}">คอมพิวเตอร์</a>
                    <a class="collapse-item" href="{{ url('number') }}">เบอร์ภายใน</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-layer-group"></i>
                <span>ระบบการแจ้งซ่อม</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ตัวเลือก</h6>
                    <a class="collapse-item" href="{{ url('ticket') }}">รายการแจ้งซ่อม</a>
                    <a class="collapse-item" href="{{ url('export') }}">รายงาน</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ตั้งค่าส่วนของระบบ
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fingerprint"></i>
                <span>สมาชิก</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ตัวเลือก</h6>

                    <a class="collapse-item" href="{{ url('member') }}">จัดการสมาชิก</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-user-cog"></i>
                <span>ระบบพนักงาน</span>
            </a>
            <div id="collapseEmp" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ตัวเลือก</h6>
                    <a class="collapse-item" href="{{ url('employee') }}">รายชื่อพนักงาน</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDep"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-braille"></i>
                <span>ระบบเงือนไข</span>
            </a>
            <div id="collapseDep" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">ตัวเลือก</h6>
                    <a class="collapse-item" href="{{ url('problem') }}">เพิ่มหมวดปัญหา</a>
                    <a class="collapse-item" href="{{ url('department') }}">เพิ่มแผนก</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->





        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="
      color:#ffffff;
      background-color:#23252d;
      
      
      ">
      <?

      ?>
      <span class="badge badge-light"><a class="nav-link " href="{{ url()->previous() }}">Back</a></span>


                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" id="Noti_fetch" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter " id="count_new">


                            </span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <div id="Noti_new">
                            </div>
                        

                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter" ></span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>


                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <b>{{ Auth::user()->emps->first_name }} <br>
                                    {{ Auth::user()->emps->last_name }}</b> </span>

                            <img class="img-profile rounded-circle"
                                src="{{ URL::to('/') }}/images/{{ Auth::user()->emps->image }}">

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <a href="{{ url('profile') }}" class="dropdown-item" data-toggle="modal"
                                data-target="#profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            {{-- {{ Route::previous()->getName() }} --}}

            <!-- /.container-fluid -->

        <script>

$( document ).ready(function() {

       $.ajax({
  url: "/posts",
  data: {
    // zipcode: 97201
  },
  success: function( result ) {
      console.log(result.data)
      let noti = result.data
      var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
      var result = noti.filter(noti => noti = noti.created_at.split(" "),noti[0]==utc);



      console.log(result.length)


    $( "#count_new" ).html(result.length);
  }
});
});

$( "#Noti_fetch" ).click(function() {
    
    $.ajax({
  url: "/posts",
  data: {
    // zipcode: 97201
  },
  success: function( result ) {
    $( "#Noti_new" ).html('')
      console.log(result.data)
      let noti = result.data
      var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
      var result = noti.filter(noti => noti = noti.created_at.split(" "),noti[0]==utc);



//       console.log(result)

      $.each(result, function(index,element){
        $( "#Noti_new" ).append( "<div class='p-2'><img class='rounded-circle' src='/images/" +element.emps.image +"' width='20px'>" +"   "+element.id_emp+" "+element.content+"</div>" );

 });
    //   result.forEach(element => {
    //   });

  }
});

});

            

        </script>
        @include('profile')
        @include('profileapp')
