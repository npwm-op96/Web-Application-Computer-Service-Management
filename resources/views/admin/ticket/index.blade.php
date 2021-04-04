@if (Auth::user()->type == 1)
    @include('/admin/partials/header')
    @include('/admin/partials/sidebar')
@else
    @include('/admin/partials/header')
    @include('/user/partials/sidebar')

@endif
{{-- <link href="//unpkg.com/bootstrap@next/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
{{-- <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css" /> --}}
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
<div id="app" class="container col-12">



    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                @if (Auth::user()->type == 0)

                    <button type="button" class="btn btn-success btn-circle btn-xl" data-toggle="modal"
                        data-target="#create-item"><a class="fas fa-plus"></a></button>
                    <a href="{{ url('ticket') }}" class="btn btn-secondary btn-circle btn-xl"><span
                            class="fas fa-undo-alt"></span> </a></button>
                    <a href="{{ url('ticket') }}" class="btn btn-info btn-circle btn-xl"><span
                            class="fas fa-file-export"></span> </a></button>
                @else
                    <a href="{{ url('ticket') }}" class="btn btn-secondary btn-circle btn-xl"><span
                            class="fas fa-undo-alt"></span> </a>
                        </button>
                    <a href="{{ url('ticket') }}" class="btn btn-info btn-circle btn-xl"><span
                            class="fas fa-file-export"></span> </a></button>
                @endif
                <div class="pull-right">
                    
                </div>
            </div>
    
        </div>
    </div>
    <br>
    <style type="text/css">
        parse {
            white-space: nowrap;
            width: 200px;
            overflow: hidden;
            border: 1px solid #000000;


        }

    </style>
    <style>
        /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                /* border: 1px solid #ccc; */
            }

            td {
                /* Behave  like a "row" */
                border: none;

                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            /*
 Label the data
 */

        }

    </style>

<div class="card shadow h-100 p-2 py-2">
    <table class="small table" role="table" id="ticket">
        <thead class="thead-dark " role="rowgroup">
            <tr role="row">
                
                <th w role="columnheader">ID_Ticket</th>
                <th><span class="fas fa-address-book"> Name</th>
                <th><span class="fas fa-laptop"> PC</th>
                <th><span class="fas fa-receipt"> Content</th>
                <th><span class="fas fa-align-justify"> Type</th>
                <th><span class="fas fa-clock"> StartTime</th>
                <th><span class="fas fa-user-cog"> IT</th>
                <th><span class="fas fa-spinner"> Status</th>
                <th><span class="fas fa-spinner"> ความคืบหน้า</th>
                <th><span class="fas fa-user-clock"> Update Time</th>

                <th><span class="fas fa-pause-circle"> End</th>
                <th><span class="far fa-thumbs-up"> Evaluate</th>
                <th><span class="fab fa-buromobelexperte"> Event</th>
            </tr>
        </thead>
        <tbody role="rowgroup">

        </tbody>
    </table>
</div>

    <div class="table responsive small">
        <ul id="pagination" class="pagination-sm"></ul>
    </div>



    <!-- Create Item Modal -->

    @include('admin/ticket/create')
    @include('admin/ticket/edit')
    @include('admin/ticket/show')
    @include('admin/ticket/Chats')











    @include('admin/ticket/satisfaction')



    <!-- Edit Item Modal -->






</div>
</div>







@include('/admin/partials/footer')









<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

{{-- <script type="text/javascript">
    $(document).ready(function() {
        setInterval(refreshTable, 2000);
    });

    function refreshTable() {
        $('#ticket').load('count.dat');
    }

</script> --}}


@extends('admin/ticket/ticket_app')
{{-- <script>
    $(document).ready(function() {
        $(".gallery li").on("click", function() {
            var dataId = $(this).attr("data-id");
            alert("The data-id of clicked item is: " + dataId);
        });
    });

</script> --}}
