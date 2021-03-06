@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Item
                    <a class="pull-right" href="{{ url('/item/create') }}">Add</a>
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
                            <th>ID</th>
                            <th>Ticket #</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Sold</th>
                            <th></th>
                            <th></th>
                            <!--<th></th>-->
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->ticket_no }}</td>
                                    <td>{{ App\Category::find($value->category_id)->name }}</td>
                                    <td>{{ App\Type::find($value->type_id)->name }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td>{{ ($value->is_sold == 0) ? 'No' : 'Yes' }}</td>
                                    <td class="table-tools-column">
                                        <a href="{{ route('item.show', $value->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td>
                                    <td class="table-tools-column">
                                        <a href="{{ route('item.edit', $value->id) }}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <!--
                                    <td class="table-tools-column">
                                        <form action="/type/{{ $value->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="table-delete-button"><i class="glyphicon glyphicon-remove"></i></button>
                                        </form>
                                    </td>
                                    -->
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
@endsection
