@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading search-selects">
                    <div class="row">
                        {{ Form::select('pawnshops', $data['pawnshops'], null, ['placeholder'=>'All Pawnshops', 'class'=>'form-control pull-left']) }}
                        {{-- Form::select('branches', ['1'=>''], null, ['placeholder'=>'All Branches', 'class'=>'form-control pull-left']) --}}
                        {{-- Form::select('province', $data['provinces'], null, ['placeholder'=>'All Provinces', 'class'=>'form-control pull-left']) --}}
                        {{--
                        <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    All Provinces <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                                </a>
                                <ul class="dropdown-menu text-capitalize" role="menu">
                                    @foreach($data['provinces'] as $key => $value)
                                        <li>
                                            <a href="#">{{ $key }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                                            <ul class="dropdown-menu text-capitalize" role="menu">
                                                @foreach($value as $key => $val)
                                                    <li><a href="#">{{ $val }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        --}}
                        <div class="dropdown province-dropdown pull-left">
                            <button class="btn btn-default dropdown-toggle" type="button" id="province-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                All Provinces <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu multi-level text-capitalize" role="menu" aria-labelledby="dropdownMenu">
                                {{--
                                <li><a href="#">Some action</a></li>
                                <li><a href="#">Some other action</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Hover me for more options</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="#">Second level</a></li>
                                        <li class="dropdown-submenu">
                                            <a href="#">Even More..</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">3rd level</a></li>
                                                <li><a href="#">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Second level</a></li>
                                        <li><a href="#">Second level</a></li>
                                    </ul>
                                </li>
                                --}}
                                @foreach($data['provinces'] as $key => $value)
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">{{ $key }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                                        <ul class="dropdown-menu">
                                            @foreach($value as $key => $val)
                                                <li><a tabindex="-1" href="#">{{ $val }}</a></li>
                                            @endforeach
                                        </ul>
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
