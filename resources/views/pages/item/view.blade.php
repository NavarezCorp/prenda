@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Item
                    @if(!Auth::guest())
                        <a class="pull-right" href="{{ url('/item') }}">List</a>
                        {{-- <a class="pull-right show-edit-link" href="{{ route('item.edit', $data->id) }}">Edit</a> --}}
                    @endif
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 item-primary-image">
                            {{-- <img class="img-responsive" src="http://placehold.it/750x500"> --}}
                            <img data-src="holder.js/200x200" class="img-responsive item-photos-thumbnail-big" alt="200x200" src="./images/{{ $data['items'][0]->users_id }}/{{ $data['items'][0]->ticket_no }}/image_0_725x483.jpg" data-holder-rendered="true">
                        </div>
                        <div class="col-md-4">
                            <dl class="dl-horizontal item-details">
                                <dt><strong>PRICE</strong></dt>
                                <dd><strong>Php {{ $data['items'][0]->price }}</strong></dd>
                                <dt>Description</dt>
                                <dd>{{ $data['items'][0]->description }}</dd>
                                <dt>Ticket #</dt>
                                <dd>{{ $data['items'][0]->ticket_no }}</dd>
                                <dt>Pawnshop</dt>
                                <dd>{{ App\Pawnshop::find(App\User::find($data['items'][0]->users_id)->pawnshop_id)->name }}</dd>
                                <dt>Branch</dt>
                                <dd>{{ App\User::find($data['items'][0]->users_id)->branch }}</dd>
                                <dt>Location</dt>
                                <dd>
                                    {{ !empty(App\City::find(App\User::find($data['items'][0]->users_id)->city_id)->name) ? App\City::find(App\User::find($data['items'][0]->users_id)->city_id)->name . 'City, ' : '' }} 
                                    {{ !empty(App\Province::find(App\User::find($data['items'][0]->users_id)->province_id)->name) ? App\Province::find(App\User::find($data['items'][0]->users_id)->province_id)->name : '' }}</dd>
                                <dt>Contact No(s)</dt>
                                <dd>
                                    {{ !empty(App\User::find($data['items'][0]->users_id)->telephone_no) ? 'Tel: ' . App\User::find($data['items'][0]->users_id)->telephone_no . ' / ' : '' }} 
                                    {{ !empty(App\User::find($data['items'][0]->users_id)->mobile_no) ? 'Cel: ' . App\User::find($data['items'][0]->users_id)->mobile_no : '' }}
                                </dd>
                                <dt>Auction Date</dt>
                                <dd>{{ !empty(App\Auction::find($data['items'][0]->auction_schedule_id)->schedule) ? App\Auction::find($data['items'][0]->auction_schedule_id)->schedule : '' }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 item-image-list item-photos-thumbnail">
                            @foreach($data['images'] as $key => $value)
                                <img alt="image{{ $key }}" class="{{ $data['items'][0]->users_id }}/{{ $data['items'][0]->ticket_no }}" src="/{{ $value->url }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
