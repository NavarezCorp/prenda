@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View City
                    <a class="pull-right" href="/city">List</a>
                    <a class="pull-right show-edit-link" href="{{ route('city.edit', $data->id) }}">Edit</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <tbody>
                            <tr>
                                <td class="col-md-3 text-right">ID</td>
                                <td>{{ $data->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Name</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Description</td>
                                <td>{{ $data->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Date Created</td>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Date Updated</td>
                                <td>{{ $data->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
