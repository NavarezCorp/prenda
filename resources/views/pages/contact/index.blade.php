@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contact Us
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Our Office
                </div>
                <div class="panel-body">
                    <div>
                        23 Lapu-lapu Street,<br />
                        Agdao, Davao City, Philippines 8000<br />
                        #(083) 221-8324<br />
                        prenda@navarezcorp.com<br />
                    </div>
                    <hr />
                    {!! $data['map'] !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
