@extends('layouts.master')

@section('title', 'Restaurant')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Tables</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Basic Bootstrap Tables
    <small>basic bootstrap tables with various options and styles</small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-comments"></i>Striped Table </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    {{--  <a href="#portlet-config" data-toggle="modal" class="config"> </a>  --}}
                    <a href="{{ route('backend.restaurants.show', $restaurant->slug) }}" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover"> {{--table-bordered--}}
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Description </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Merchant Name </td>
                                <td> {{ $restaurant->merchant->name }} </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> Name </td>
                                <td> {{ $restaurant->name }} </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> Contact Name </td>
                                <td> {{ $restaurant->contact_name }} </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> Phone Number </td>
                                <td> {{ $restaurant->phone }} </td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td> Email </td>
                                <td> {{ $restaurant->email }} </td>
                            </tr>
                            <tr>
                                <td> 6 </td>
                                <td> Address </td>
                                <td> {{ $restaurant->address }} </td>
                            </tr>
                            <tr>
                                <td> 7 </td>
                                <td> Description </td>
                                <td> {{ $restaurant->description }} </td>
                            </tr>
                            <tr>
                                <td> 8 </td>
                                <td> Service Charges(%) </td>
                                <td> {{ $restaurant->service_charges }} </td>
                            </tr>
                            <tr>
                                <td> 9 </td>
                                <td> Packagings(per item) </td>
                                <td> {{ $restaurant->packagings }} </td>
                            </tr>
                            <tr>
                                <td> 9 </td>
                                <td> Opening Time </td>
                                <td> {{ $restaurant->opening_time }} </td>
                            </tr>
                            <tr>
                                <td> 10 </td>
                                <td> Closing Time </td>
                                <td> {{ $restaurant->closing_time }} </td>
                            </tr>
                            <tr>
                                <td> 11 </td>
                                <td> Image </td>
                                <td>
                                    <div class="thumbnail" style="width: 200px; height: 150px;">
                                        <img alt="" src="{{ $restaurant->image_path }}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection
