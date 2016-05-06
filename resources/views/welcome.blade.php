@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading search-selects">
                    <div class="row">
                        {{ Form::select('pawnshops', $data['pawnshops'], !empty($data['filter_ps']) ? $data['filter_ps'] : null, ['placeholder'=>'All Pawnshops', 'class'=>'form-control pull-left select-pawnshops']) }}
                        {{-- Form::select('branches', ['1'=>''], null, ['placeholder'=>'All Branches', 'class'=>'form-control pull-left']) --}}
                        {{-- Form::select('province', $data['provinces'], null, ['placeholder'=>'All Provinces', 'class'=>'form-control pull-left']) --}}
                        <div class="dropdown province-dropdown pull-left">
                            <button class="btn btn-default dropdown-toggle text-capitalize" type="button" id="province-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ !empty($data['filter']) ? $data['filter'] : 'All Provinces' }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu multi-level text-capitalize" role="menu" aria-labelledby="dropdownMenu">
                                @if(!empty($data['filter']))
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="/search/ap">All Provinces <span class="glyphicon glyphicon-triangle-right pull-right white-overlay"></span></a>
                                    </li>
                                @endif
                                @foreach($data['provinces'] as $key => $value)
                                    <li class="dropdown-submenu">
                                        @if($value[0])
                                            <a tabindex="-1" href="/search/p:{{ $key }}">{{ $key }} <span class="glyphicon glyphicon-triangle-right pull-right"></span></a>
                                            <ul class="dropdown-menu">
                                                @foreach($value as $key => $val)
                                                    @if($val) <li><a tabindex="-1" href="/search/c:{{ $val }}">{{ $val }}</a></li> @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <a tabindex="-1" href="/search/p:{{ $key }}">{{ $key }} <span class="glyphicon glyphicon-triangle-right pull-right white-overlay"></span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
                    @foreach($data['items'] as $key => $value)
                        <div class="col-md-4 portfolio-item">
                            <a href="{{ url('view', $value->id) }}">
                                {{-- <img class="img-responsive" src="http://placehold.it/700x400"> --}}
                                <img class="img-responsive" src="/images/{{ $value->users_id }}/{{ $value->ticket_no }}/image_0_349x200.jpg">
                            </a>
                            <h4 class="text-center"><a href="{{ url('view', $value->id) }}">Php {{ $value->price }}</a></h4>
                            <p class="text-overflow">{{ $value->description }}</p>
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
