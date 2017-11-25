@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Item</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="{{ route('item.update', $data['item']->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Auction Schedule</label>
                            <div class="col-md-6">
                                {{ Form::select('schedule', $data['auctions'], null, ['class'=>'form-control']) }}
                                @if ($errors->has('schedule'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schedule') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ticket_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Ticket #</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="ticket_no" value="{{ $data['item']->ticket_no }}">
                                @if ($errors->has('ticket_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Category</label>
                            <div class="col-md-6">
                                {{ Form::select('category', $data['categories'], null, ['class'=>'form-control']) }}
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Type</label>
                            <div class="col-md-6">
                                {{ Form::select('type', $data['types'], null, ['class'=>'form-control']) }}
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="price" value="{{ $data['item']->price }}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="description">{{ $data['item']->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Item photos</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="upload-image-container">
                                        <div class="thumbnail-delete">X</div>
                                        <img id="img_1" data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="./images/{{ $data['item']->users_id }}/{{ $data['item']->ticket_no }}/image_0_173x126.jpg" data-holder-rendered="true">
                                        <input type="file" name="image[]" class="image-uploader" id="image_1">
                                    </div>
                                    <div class="upload-image-container">
                                        <img id="img_2" data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="./images/{{ $data['item']->users_id }}/{{ $data['item']->ticket_no }}/image_1_173x126.jpg" data-holder-rendered="true">
                                        <input type="file" name="image[]" class="image-uploader" id="image_2">
                                    </div>
                                    <div class="upload-image-container">
                                        <img id="img_3" data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="./images/{{ $data['item']->users_id }}/{{ $data['item']->ticket_no }}/image_2_173x126.jpg" data-holder-rendered="true">
                                        <input type="file" name="image[]" class="image-uploader" id="image_3">
                                    </div>
                                    <div class="upload-image-container">
                                        <img id="img_4" data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="./images/{{ $data['item']->users_id }}/{{ $data['item']->ticket_no }}/image_3_173x126.jpg" data-holder-rendered="true">
                                        <input type="file" name="image[]" class="image-uploader" id="image_4">
                                    </div>
                                    <div class="upload-image-container">
                                        <img id="img_5" data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="./images/{{ $data['item']->users_id }}/{{ $data['item']->ticket_no }}/image_4_173x126.jpg" data-holder-rendered="true">
                                        <input type="file" name="image[]" class="image-uploader" id="image_5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('/item') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
