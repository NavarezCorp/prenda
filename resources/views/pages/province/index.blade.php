@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Province
                    <a class="pull-right" href="/province/create">Add</a>
                </div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="pull-right">{!! $provinces->links() !!}</div>
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($provinces as $index => $province)
                                <tr>
                                    <td>{{ $province->id }}</td>
                                    <td>{{ $province->name }}</td>
                                    <td class="table-tools-column"><i class="glyphicon glyphicon-pencil"></i></td>
                                    <td class="table-tools-column">
                                        <form action="/province/{{ $province->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="table-delete-button"><i class="glyphicon glyphicon-remove"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{!! $provinces->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
