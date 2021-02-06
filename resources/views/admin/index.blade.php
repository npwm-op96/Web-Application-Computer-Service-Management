@if(Auth::user()->type==1)
@include('/admin/partials/header')
@include('/admin/partials/sidebar')
@else
@include('/admin/partials/header')
@include('/user/partials/sidebar')

@endif

  <!-- Page Wrapper -->

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          @if(Auth::user()->type==1)

          <div class="row">
     

            <!-- Earnings (Monthly) Card Example -->
           
           
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <a class="collapse-item" href="{{url('member')}}">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Employee</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{

                        DB::table('employee')->count()
                      }}</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{

                          DB::table('employee')->count()}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-circle
 fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            </a>
      

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a class="collapse-item" href="{{url('member')}}">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{

                        DB::table('users')->count()
                      }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-walking fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
   

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                 <a class="collapse-item" href="{{url('stores')}}">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Store</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{

                            DB::table('stores')->count()
                          }}</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{

                              DB::table('stores')->count()}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-store
 fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <a class="collapse-item" href="{{url('ticket')}}">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ticket</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{

                        DB::table('ticket')->count()
                      }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          </div>
          @endif

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">แผนสรุปการแจ้งซ่อมรายปี</h6>
                </div>


                <div class="panel-body">
                    {!! $chart->html() !!}

                </div>
                {!! Charts::scripts() !!}
                {!! $chart->script() !!}



                </div>
              </div>


            <!-- Pie Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">แผนแบ่งประเภทของปัญหา</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                  </div>
                </div>

                 <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
              {!!$pie->html() !!}
              {!! Charts::scripts() !!}
                  {!! $chart->script() !!}

                  {!! $pie->script() !!}


                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row container">

            <!-- Content Column -->
            <div class="col-xl-8 col-lg-9">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">การแจ้งซ่อมแบบรายเดือน</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                    {!! $Ticket_D->html() !!}

                </div>
                {!! Charts::scripts() !!}
                {!! $Ticket_D->script() !!}



                </div>
              </div>
            </div> 
                <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-6">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">เปรียบเทียบ</h6>
                  </div>
                  <div class="card-body">
                                 <div class="panel-body">

                    {!! $pie_status->html() !!}

                </div>
                {!! Charts::scripts() !!}
                {!! $pie_status->script() !!}

              </div>
                
              </div>
              </div>
            <div class="col-xl-8 col-lg-7">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="card-body">
                  <div class="panel-body">

                    {!! $pie_status->html() !!}

                </div>
                {!! Charts::scripts() !!}
                {!! $pie_status->script() !!}

              </div>

              <!-- Approach -->


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      </div>
      <!-- End of Main Content -->
@include('/admin/partials/footer')
