@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    About Us
                </div>
                <div class="panel-body">
                    <p><h1>What is Prenda?</h1></p>
                    <p>"Prenda" is a Bisaya term which now a days commonly found in a Pawnshop store. In other words "Pawn". Item's are pawned on pawnshop store and if owners no longer wants to redeemed their items, it will expire and pawnshop store will have the authority to auction the item.</p>
                    <p><h3>And what's special about Prenda?</h3></p>
                    <p>If you haven't noticed how great this online site is, ITEM's came from a PAWNSHOP store. Which means, items have undergone a scrutiny and meticulous inspection before it is being approved.</p>
                    <p><h3>How good is that for me?</h3></p>
                    <p>It would mean that you have a good quality item. Quality gold, quality watches and many more. Not like the usual online seller whom you don't know and some's are scammer. Those kind of sellers are headaches to online seller sites cause they had no idea of the sellers. It degrades dignity and security on the sites. And they'd keep trying on how to prevent and fight it for the good of the buyer.</p>
                    <p>Unlike Prenda, you are guaranteed that they belong to a legit Pawnshop store. And because of this, if there are problems, you know where to reach out or return the item. Unlike others, all you can do is shout out to social media and then still nothing. We do this cause we CARE for you.</p>
                    <p><h3>Customer Service</h3></p>
                    <p>For any questions, suggestion or feedback, please contact us <a href="{{ url('/contact') }}">here</a> and we will try our best to respond to your inquiry within 24 hours. We will be glad to hear from you.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
