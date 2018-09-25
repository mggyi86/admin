@extends('layouts.master')

@section('title', 'Restaurants')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endpush
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ route('backend.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Restaurants</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Restaurant Table
    {{--  <small>basic bootstrap tables with various options and styles</small>  --}}
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Restaurant Lists</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        @include('flash::message')
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="{{ route('backend.restaurants.create') }}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-print"></i> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="restaurants-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Merchant Name</th>
                            <th>Name</th>
                            <th>Contact Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Service Charges(%)</th>
                            <th>Packagings(per item)</th>
                            <th>Opening Time</th>
                            <th>Closing Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection

@push('scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
$(document).ready(function() {
    var table = $('#restaurants-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: true,
    ajax: '{!! url('/backend/restaurants') !!}',
    columns: [
        { data: 'DT_Row_Index', name: 'index_column'},
        { data: 'user_id', name: 'user_id'},
        { data: 'name', name: 'name'},
        { data: 'contact_name', name: 'contact_name'},
        { data: 'phone', name: 'phone'},
        { data: 'email', name: 'email'},
        { data: 'address', name: 'address'},
        { data: 'description', name: 'description'},
        { data: 'service_charges(%)', name: 'service_charges(%)'},
        { data: 'packagings(per item)', name: 'packagings(per item)'},
        { data: 'opening_time', name: 'opening_time'},
        { data: 'closing_time', name: 'closing_time'},
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 0
    }],
    "order": [[ 1, 'asc' ]]
    });
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    $('#restaurants-table').on('click', '.btn-delete[data-remote]', function (e) {
        e.preventDefault();
        var url = $(this).data('remote');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this division!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    type: 'DELETE'
                }).always(function (data) {
                    $('#restaurants-table').DataTable().draw(false);
                });
                swal("Deleted!", "Restaurant has been deleted.", "success");
            } else {
              swal("Cancelled", "Restaurants is safe :)", "error");
            }
        });
    });
});
</script>
@endpush
