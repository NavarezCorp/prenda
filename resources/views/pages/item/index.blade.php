@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Item
                    <a class="pull-right" href="/item/create">Add</a>
                </div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="pull-right">{!! $items->links() !!}</div>
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <th>ID</th>
                            <th>User</th>
                            <th>Auction</th>
                            <th>Ticket #</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Sold</th>
                        </thead>
                        <tbody>
                            @foreach ($items as $index => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->auction_schedule_id }}</td>
                                    <td>{{ $item->ticket_no }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->type_id }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->is_sold }}</td>
                                    <td class="table-tools-column"><i class="glyphicon glyphicon-pencil"></i></td>
                                    <td class="table-tools-column">
                                        <form action="/type/{{ $item->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="table-delete-button"><i class="glyphicon glyphicon-remove"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{!! $items->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
