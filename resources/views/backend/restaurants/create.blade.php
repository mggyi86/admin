@extends('layouts.master')

@section('title', 'Create Restaurant')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
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
                            <form action="{{ route('backend.restaurants.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="form-group{{ $errors->has('merchant') ? ' has-error ' : ''}}">
                                        <label for="merchant"class="col-md-3 control-label">Select Merchant</label>
                                        <div class="col-md-4">
                                            <select id="merchant" class="form-control select2" name="merchant" required>
                                                <option></option>
                                                @forelse($merchants as $merchant)
                                                    <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                                @empty
                                                    Please Create Merchant First.
                                                @endforelse
                                            </select>
                                            @if ($errors->has('merchant'))
                                                <span class="help-block"> {{ $errors->first('merchant') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error ' : ''}}">
                                        <label for="name" class="col-md-3 control-label">Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Restaurant Name"
                                            name="name" value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="help-block"> {{ $errors->first('name') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('contact_name') ? ' has-error ' : ''}}">
                                        <label for="contact_name" class="col-md-3 control-label">Contact Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Contact Name"
                                            name="contact_name" value="{{ old('contact_name') }}" required>
                                            @if ($errors->has('contact_name'))
                                                <span class="help-block"> {{ $errors->first('contact_name') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone') ? ' has-error ' : ''}}">
                                        <label for="phone" class="col-md-3 control-label">Phone Number</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                            name="phone" value="{{ old('phone') }}" required>
                                            @if ($errors->has('phone'))
                                                <span class="help-block"> {{ $errors->first('phone') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error ' : ''}}">
                                        <label for="email" class="col-md-3 control-label">Email Address</label>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" placeholder="Email Address"
                                            name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                            <span class="help-block"> {{ $errors->first('email') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error ' : ''}}">
                                        <label for="address" class="col-md-3 control-label">Address</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Address"
                                            name="address" value="{{ old('address') }}" required>
                                            @if ($errors->has('address'))
                                                <span class="help-block"> {{ $errors->first('address') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error ' : ''}}">
                                        <label for="description" class="col-md-3 control-label">Description</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Description"
                                            name="description" value="{{ old('description') }}" required>
                                            @if ($errors->has('description'))
                                                <span class="help-block"> {{ $errors->first('description') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('service_charges') ? ' has-error ' : ''}}">
                                        <label for="service_charges" class="col-md-3 control-label">Service Charges(%)</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Service Charges(%)"
                                            name="service_charges" value="{{ old('service_charges') }}" required>
                                            @if ($errors->has('service_charges'))
                                                <span class="help-block"> {{ $errors->first('service_charges') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('packagings') ? ' has-error ' : ''}}">
                                        <label for="packagings" class="col-md-3 control-label">Packagings(per item)</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Pckagings(per item)"
                                            name="packagings" value="{{ old('packagings') }}" required>
                                            @if ($errors->has('packagings'))
                                                <span class="help-block"> {{ $errors->first('packagings') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('opening_time') ? ' has-error ' : ''}}">
                                        <label for="opening_time" class="col-md-3 control-label">Opening Time</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker timepicker-24"
                                                name="opening_time" value="{{ old('opening_time') }}">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-clock-o"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            @if ($errors->has('opening_time'))
                                            <span class="help-block"> {{ $errors->first('opening_time') }} </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('closing_time') ? ' has-error ' : ''}}">
                                        <label for="closing_time" class="col-md-3 control-label">Closing Time</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker timepicker-24"
                                                name="closing_time" value="{{ old('closing_time') }}">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-clock-o"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            @if ($errors->has('closing_time'))
                                            <span class="help-block"> {{ $errors->first('closing_time') }} </span>
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
                                            <a type="button" class="btn default" href="{{ route('backend.restaurants.index') }}">Cancel</a>
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
<script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
$(document).ready(function() {
    $('#merchant').select2({
        placeholder: 'Select a Merchant',
        allowClear: true
    });
    $(".timepicker-no-seconds").timepicker({
        autoclose: !0,
        minuteStep: 5,
        defaultTime: !1
    });
    $(".timepicker-24").timepicker({
        autoclose: !0,
        minuteStep: 5,
        showSeconds: !1,
        showMeridian: !1
    })
    $(".timepicker").parent(".input-group").on("click", ".input-group-btn", function (t) {
        t.preventDefault(), $(this).parent(".input-group").find(".timepicker").timepicker("showWidget")
    });
    $('.fileinput').fileinput();
});
</script>
@endpush
