@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="register-prof-pic col-md-4">
            <img class="img-responsive" src="/images/1140x350_images2.jpg">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Complete Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pawnshop</label>
                            <div class="col-md-6">
                                {{ Form::select('pawnshop', $data['pawnshops'], null, ['class'=>'form-control select-pawnshop']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Province</label>
                            <div class="col-md-6">
                                {{ Form::select('province', $data['provinces'], null, ['class'=>'form-control select-province']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                {{ Form::select('city', $data['cities'], null, ['class'=>'form-control select-city']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Branch</label>
                            <div class="col-md-6">
                                <div id="branches-autocomplete">
                                    <input name="branch" class="typeahead form-control" type="text" placeholder="enter pawnshop branch">
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telephone_no') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Telephone #</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone_no" value="{{ old('telephone_no') }}">
                                @if ($errors->has('telephone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mobile #</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">
                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
