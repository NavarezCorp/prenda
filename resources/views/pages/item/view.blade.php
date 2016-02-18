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
                            <img data-src="holder.js/200x200" class="img-responsive item-photos-thumbnail-big" alt="200x200" src="{{ !empty($data['images'][0]) ? $data['images'][0] : 'http://placehold.it/750x500' }}" data-holder-rendered="true">
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
                                <dd></dd>
                                <dt>Branch</dt>
                                <dd></dd>
                                <dt>Location</dt>
                                <dd></dd>
                                <dt>Contact No(s)</dt>
                                <dd></dd>
                                <dt>Auction Date</dt>
                                <dd>{{ App\Auction::find($data['items'][0]->auction_schedule_id)->schedule }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 item-image-list item-photos-thumbnail">
                            <img alt="image2" src="{{ !empty($data['images'][1]) ? $data['images'][1] : '/images/700x400.jpg' }}">
                            <img alt="image3" src="{{ !empty($data['images'][2]) ? $data['images'][2] : '/images/700x400.jpg' }}">
                            <img alt="image4" src="{{ !empty($data['images'][3]) ? $data['images'][3] : '/images/700x400.jpg' }}">
                            <img alt="image5" src="{{ !empty($data['images'][4]) ? $data['images'][4] : '/images/700x400.jpg' }}">
                        </div>
                        {{--
                        <div class="item-view-button">
                            <a href="{{ url('/') }}" class="btn btn-primary" role="button">Tag item as sold</a>
                            <a href="{{ route('item.edit', $data['items'][0]->id) }}" class="btn btn-success" role="button">Edit item</a>
                            <a href="{{ url('/item/create') }}" class="btn btn-info" role="button">Post new item</a>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
