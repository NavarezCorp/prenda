@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Item
                    @if (!Auth::guest())
                        <a class="pull-right" href="{{ url('/item') }}">List</a>
                        {{-- <a class="pull-right show-edit-link" href="{{ route('item.edit', $data->id) }}">Edit</a> --}}
                    @endif
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 item-primary-image">
                            {{-- <img class="img-responsive" src="http://placehold.it/750x500"> --}}
                            <img data-src="holder.js/200x200" class="img-responsive item-photos-thumbnail-big" alt="200x200" src="/images/{{ $data['items']->users_id }}/{{ $data['items']->ticket_no }}/image_0_725x483.jpg" data-holder-rendered="true">
                        </div>
                        <div class="col-md-4">
                            <dl class="dl-horizontal item-details">
                                <dt><strong>PRICE</strong></dt>
                                <dd><strong>Php {{ $data['items']->price }}</strong></dd>
                                <dt>Description</dt>
                                <dd>{{ $data['items']->description }}</dd>
                                <dt>Ticket #</dt>
                                <dd>{{ $data['items']->ticket_no }}</dd>
                                <dt>Pawnshop</dt>
                                <dd>{{ App\Pawnshop::find(App\User::find($data['items']->users_id)->pawnshop_id)->name }}</dd>
                                <dt>Branch</dt>
                                <dd>{{ App\User::find($data['items']->users_id)->branch }}</dd>
                                <dt>Location</dt>
                                <dd>
                                    {{ !empty(App\City::find(App\User::find($data['items']->users_id)->city_id)->name) ? App\City::find(App\User::find($data['items']->users_id)->city_id)->name . 'City, ' : '' }} 
                                    {{ !empty(App\Province::find(App\User::find($data['items']->users_id)->province_id)->name) ? App\Province::find(App\User::find($data['items']->users_id)->province_id)->name : '' }}
                                </dd>
                                <dt>Contact No(s)</dt>
                                <dd>
                                    {{ !empty(App\User::find($data['items']->users_id)->telephone_no) ? 'Tel: ' . App\User::find($data['items']->users_id)->telephone_no . ' / ' : '' }} 
                                    {{ !empty(App\User::find($data['items']->users_id)->mobile_no) ? 'Cel: ' . App\User::find($data['items']->users_id)->mobile_no : '' }}</dd>
                                <dt>Auction Date</dt>
                                <dd>{{ App\Auction::find($data['items']->auction_schedule_id)->schedule }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 item-image-list item-photos-thumbnail">
                            @foreach($data['images'] as $key => $value)
                                <img alt="image{{ $key }}" class="{{ $data['items']->users_id }}/{{ $data['items']->ticket_no }}" src="/{{ $value->url }}">
                            @endforeach
                        </div>
                        <div class="item-view-button">
                            @if($data['items']->is_sold)
                                <a class="btn btn-default tag-as-sold disabled" role="button">Tag item as sold</a>
                            @else
                                <a class="btn btn-primary tag-as-sold" role="button" id="{{ $data['items']->id }}">Tag item as sold</a>
                            @endif
                            <a href="{{ route('item.edit', $data['items']->id) }}" class="btn btn-success" role="button">Edit item</a>
                            <a href="{{ url('/item/create') }}" class="btn btn-info" role="button">Post new item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialog-confirm" title="Tag item as sold">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to tag this item as sold?
    </p>
</div>
@endsection
