@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage City
                    <a class="pull-right" href="/city/create">Add</a>
                </div>

                <div class="panel-body">
                    <div class="pull-right">{!! $cities->links() !!}</div>
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($cities as $index => $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->description }}</td>
                                    <td class="table-tools-column"><i class="glyphicon glyphicon-pencil"></i></td>
                                    <td class="table-tools-column"><i class="glyphicon glyphicon-remove"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{!! $cities->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
