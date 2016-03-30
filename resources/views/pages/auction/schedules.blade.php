@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <span class="pull-left col-lg-4 user-help">Auction Schedules</span>
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
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <th>Pawnshop</th>
                            <th>Branch</th>
                            <th>Auction Date</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ App\Http\PrendaHelpers::get_pawnshop_name($value->users_id) }}</td>
                                    <td></td>
                                    <td>{{ $value->schedule }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
