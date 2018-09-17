@extends('layouts.master')

@section('title', 'Create Division')

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
                    <a href="{{ route('backend.divisions.show', $division->slug) }}" class="reload"> </a>
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
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Name </td>
                                <td> {{ $division->name }} </td>
                                <td>
                                    <span class="label label-sm label-success"> Approved </span>
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
