@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Admin
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-2 control-label">Image Path</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="image_path">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Image Width</label>
                            <div class="col-md-1">
                                <input type="text" class="form-control text-center" name="image_width">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Image Height</label>
                            <div class="col-md-1">
                                <input type="text" class="form-control text-center" name="image_height">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
