@extends('layouts.master')

@section('title', 'Edit Merchant')

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
                            <form action="{{ route('backend.merchants.update', $merchant->slug) }}" class="form-horizontal" method="POST">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="form-body">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error ' : ''}}">
                                            <label for="name" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Name"
                                                name="name" value="{{ old('name') ? old('name') : $merchant->name }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block"> {{ $errors->first('name') }} </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error ' : ''}}">
                                            <label for="email" class="col-md-3 control-label">Email Address</label>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" placeholder="Email Address"
                                                name="email" value="{{ old('email') ? old('email') : $merchant->email }}" required>
                                                @if ($errors->has('email'))
                                                <span class="help-block"> {{ $errors->first('email') }} </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-error ' : ''}}">
                                            <label for="phone" class="col-md-3 control-label">Phone Number</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone" value="{{ old('phone') ? old('phone') : $merchant->phone }}">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block"> {{ $errors->first('phone') }} </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error ' : ''}}">
                                            <label for="address" class="col-md-3 control-label">Address</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Address"
                                                name="address" value="{{ old('address') ? old('address') : $merchant->address }}">
                                                @if ($errors->has('address'))
                                                    <span class="help-block"> {{ $errors->first('address') }} </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{--  <div class="form-group{{ $errors->has('password') ? ' has-error ' : ''}}">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" placeholder="Password"
                                                name="password" value="{{ old('password') }}">
                                                @if ($errors->has('password'))
                                                <span class="help-block"> {{ $errors->first('password') }} </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error ' : ''}}">
                                            <label for="password_confirmation" class="col-md-3 control-label">
                                                Confirm Password
                                            </label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" placeholder="Confirm Password"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                                                @if ($errors->has('password_confirmation'))
                                                <span class="help-block"> {{ $errors->first('password_confirmation') }} </span>
                                                @endif
                                            </div>
                                        </div>  --}}
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-4">
                                            <button type="submit" class="btn green">Submit</button>
                                            <a type="button" class="btn default" href="{{ route('backend.merchants.index') }}">Cancel</a>
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
