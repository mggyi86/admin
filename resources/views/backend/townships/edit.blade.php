@extends('layouts.master')

@section('title', 'Edit Township')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endpush

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Form Stuff</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Form Layouts
    <small>form layouts</small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <div class="boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Form Actions On Bottom </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="{{ route('backend.townships.update', $township->slug) }}" class="form-horizontal" method="POST">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="form-body">
                                    <div class="form-group{{ $errors->has('division') ? ' has-error ' : ''}}">
                                        <label for="division"class="col-md-3 control-label">Select Division</label>
                                        <div class="col-md-4">
                                            <select id="division" class="form-control select2" name="division" required>
                                                <option></option>
                                                @forelse($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                    @if($division->name == $township->division->name)
                                                    selected="selected"
                                                    @endif
                                                    >{{ $division->name }}
                                                    </option>
                                                @empty
                                                    Please Create Division First.
                                                @endforelse
                                            </select>
                                            @if ($errors->has('division'))
                                                <span class="help-block"> {{ $errors->first('division') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error ' : ''}}">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control"
                                            placeholder="Enter Township Name" name="name" value="{{ old('name') ? old('name') : $township->name }}"
                                            required>
                                            @if ($errors->has('name'))
                                                <span class="help-block"> {{ $errors->first('name') }} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-4">
                                            <button type="submit" class="btn green">Submit</button>
                                            <a type="button" class="btn default" href="{{ route('backend.divisions.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
$(document).ready(function() {
    $('#division').select2({
        placeholder: 'Select a Division',
        allowClear: true
    });
});
</script>
@endpush
