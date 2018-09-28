@extends('layouts.master')

@section('title', 'Stock')

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
                    <i class="fa fa-comments"></i>Stock Table </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    {{--  <a href="#portlet-config" data-toggle="modal" class="config"> </a>  --}}
                    <a href="{{ route('backend.stocks.show', $stock->uuid) }}" class="reload"> </a>
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
                                <td> Restaurant Name </td>
                                <td> {{ $stock->restaurant->name }} </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> English Name </td>
                                <td> {{ $stock->name_en }} </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> Myanmar Name </td>
                                <td> {{ $stock->name_mm }} </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> Net Price </td>
                                <td> {{ $stock->net_price }} </td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td> Discounted Price </td>
                                <td> {{ $stock->discounted_price }} </td>
                            </tr>
                            <tr>
                                <td> 11 </td>
                                <td> Image </td>
                                <td>
                                    <div class="thumbnail" style="width: 200px; height: 150px;">
                                        <img alt="" src="{{ $stock->image_path }}">
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
