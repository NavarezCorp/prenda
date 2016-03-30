@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <span class="pull-left col-lg-4 user-help">Manage Auction</span>
                        <div class="col-lg-4 pull-right auction-schedule-button">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auction') }}">
                                <div class="input-group">
                                    {!! csrf_field() !!}
                                    <input type="text" name="schedule" class="form-control" placeholder="Enter auction schedule" id='datepicker' readonly="true">
                                    <span class="input-group-btn">
                                        <!--
                                        <button class="btn btn-default auction-schedule-button auction-schedule-calendar" type="button">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </button>
                                        -->
                                        <button class="btn btn-default auction-schedule-add" type="submit" disabled="disabled">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span> 
                                </div>
                            </form>
                        </div>
                        <!--<a class="pull-right" href="" data-toggle="modal" data-target="#auction-schedule-popup">Add</a>-->
                    </div>
                </div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="pull-right">{!! $data->links() !!}</div>
                    <dl class="dl-horizontal auction-list">
                        <dt><strong>Auction Date</strong></dt>
                        <dd><strong>Action</strong></dd>
                        @foreach ($data as $key => $value)
                            <dt>{{ $value->schedule }}</dt>
                            <dd>
                                <div class="row col-lg-10">
                                    <!--<a href="{{ route('auction.edit', $value->id) }}" class="pull-left">-->
                                    <a class="pull-left">
                                        <button class="edit-button" id="{{ $value->id }}"><i class="glyphicon glyphicon-pencil"></i></button>
                                    </a>
                                    <form action="/auction/{{ $value->id }}" method="POST" class="pull-left">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="delete-button"><i class="glyphicon glyphicon-remove"></i></button>
                                    </form>
                                    <a href="{{ url('/item/create') }}" class="pull-left">
                                        <button type="button" class="btn btn-primary">Post new item</button>
                                    </a>
                                    <div class="col-lg-7 hidden auction-schedule-edit-action auction-schedule-edit-action-{{ $value->id }}">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auction') }}">
                                            <div class="input-group">
                                                {!! csrf_field() !!}
                                                <input type="text" name="schedule-edit" class="form-control" placeholder="Enter auction schedule" id='datepicker-edit' readonly="true" value="{{ $value->schedule }}">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default auction-schedule-edit" type="submit" disabled="disabled">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                    <button class="btn btn-default auction-schedule-cancel" type="button">
                                                        <a href="{{ url('/auction') }}"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </button>
                                                </span> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </dd>
                        @endforeach
                    </dl>
                    <div class="pull-right">{!! $data->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="auction-schedule-popup" tabindex="-1" role="dialog" aria-labelledby="auction-schedule-popup">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Auction Schedule</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auction') }}">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 control-label">Auction Date</label>
                            <div class='col-sm-6'>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter auction schedule" id='datepicker'>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default calendar-button" type="button">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
