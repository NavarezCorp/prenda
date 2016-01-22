@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading search-selects">
                    <div class="row">
                        {{ Form::select('pawnshops', $data['pawnshops'], null, ['placeholder'=>'All Pawnshops', 'class'=>'form-control pull-left']) }}
                        {{ Form::select('branches', ['1'=>''], null, ['placeholder'=>'All Branches', 'class'=>'form-control pull-left']) }}
                        {{ Form::select('province', $data['provinces'], null, ['placeholder'=>'All Provinces', 'class'=>'form-control pull-left']) }}
                        <div class="col-lg-4 pull-right">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default search-button" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="pull-right">{!! $data['items']->links() !!}</div>
                    <div class="row clearboth">
                    @foreach ($data['items'] as $key => $value)
                        <div class="col-md-4 portfolio-item">
                            <a href="{{ route('item.show', $value->id) }}">
                                <img class="img-responsive" src="http://placehold.it/700x400">
                            </a>
                            <h4><a href="{{ route('item.show', $value->id) }}">#{{ $value->ticket_no }}</a></h4>
                            <p>Php {{ $value->price }}</p>
                        </div>
                    @endforeach
                    </div>
                    <div class="pull-right">{!! $data['items']->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
