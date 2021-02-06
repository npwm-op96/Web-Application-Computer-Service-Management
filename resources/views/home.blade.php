@include('/user/partials/header')
@include('/user/partials/sidebar')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $session = Auth::user()->emps->first_name }}
                    {{ $session}}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@include('/user/partials/footer')
