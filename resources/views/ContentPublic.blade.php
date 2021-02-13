@if (Auth::user()->type == 1)
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
                <h1 class="h3 mb-0 text-gray-800">Content</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>
            <div class="contianer">
                <div class="row">
                @for ($i = 1; $i <= 20; $i++)
                        <div class="col-6 p-2">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Network</h5>
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                  <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>
                              </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <br>


        </div>
        <!-- End of Main Content -->
        @include('/admin/partials/footer')
