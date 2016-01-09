@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @foreach ($data as $key => $value)
                        <div class="col-md-4 portfolio-item">
                            <a href="{{ route('item.show', $value->id) }}">
                                <img class="img-responsive" src="http://placehold.it/700x400">
                            </a>
                            <h4><a href="{{ route('item.show', $value->id) }}">#{{ $value->ticket_no }}</a></h4>
                            <p>Php {{ $value->price }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
