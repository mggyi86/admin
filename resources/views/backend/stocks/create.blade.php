@extends('layouts.master')

@section('title', 'Create Stock')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
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
        <div class="tabbable-line boxless tabbable-reversed">
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
                            <form action="{{ route('backend.stocks.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="form-group{{ $errors->has('restaurant') ? ' has-error ' : ''}}">
                                        <label for="restaurant" class="col-md-3 control-label">Select Restaurant</label>
                                        <div class="col-md-4">
                                            <select id="restaurant" class="form-control select2" name="restaurant" required>
                                                <option></option>
                                                @forelse($restaurants as $restaurant)
                                                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                                @empty
                                                    Please Create Restaurant First.
                                                @endforelse
                                            </select>
                                            @if ($errors->has('restaurant'))
                                                <span class="help-block"> {{ $errors->first('restaurant') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name_en') ? ' has-error ' : ''}}">
                                        <label for="name_en" class="col-md-3 control-label">English Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Stock Name"
                                            name="name_en" value="{{ old('name_en') }}" required>
                                            @if ($errors->has('name_en'))
                                                <span class="help-block"> {{ $errors->first('name_en') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name_mm') ? ' has-error ' : ''}}">
                                        <label for="name_mm" class="col-md-3 control-label">Myanmar Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Contact Name"
                                            name="name_mm" value="{{ old('name_mm') }}" required>
                                            @if ($errors->has('name_mm'))
                                                <span class="help-block"> {{ $errors->first('name_mm') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('net_price') ? ' has-error ' : ''}}">
                                        <label for="net_price" class="col-md-3 control-label">Net Price</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" placeholder="Net Price"
                                            name="net_price" value="{{ old('net_price') }}" required>
                                            @if ($errors->has('net_price'))
                                                <span class="help-block"> {{ $errors->first('net_price') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('discounted_price') ? ' has-error ' : ''}}">
                                        <label for="discounted_price" class="col-md-3 control-label">Discounted Price</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" placeholder="Discounted Price"
                                            name="discounted_price" value="{{ old('discounted_price') }}" required>
                                            @if ($errors->has('discounted_price'))
                                                <span class="help-block"> {{ $errors->first('discounted_price') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('image') ? ' has-error ' : ''}}">
                                        <label for="image" class="col-md-3 control-label">Image</label>
                                        <div class="col-md-4">
                                            <div class="input-group fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="image"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                                @if ($errors->has('image'))
                                                <span class="help-block"> {{ $errors->first('image') }} </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-4">
                                            <button type="submit" class="btn green">Submit</button>
                                            <a type="button" class="btn default" href="{{ route('backend.stocks.index') }}">Cancel</a>
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
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
$(document).ready(function() {
    $('#restaurant').select2({
        placeholder: 'Select a Restaurant',
        allowClear: true
    });
    $('.fileinput').fileinput();
});
</script>
@endpush
