@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pricing
                </div>

                <div class="panel-body">
                    <table class="table table-bordered pricing-table">
                        <tbody>
                            <tr>
                                <td class="no-border"></td>
                                <td class="text-center pricing-header">1st Month</td>
                                <td class="text-center pricing-header">Succeding Months</td>
                                <td class="text-center pricing-header">Php 500/Month</td>
                            </tr>
                            <tr>
                                <td>Post Item</td>
                                <td class="text-center">Unlimited</td>
                                <td class="text-center">5 items/month</td>
                                <td class="text-center">Unlimited</td>
                            </tr>
                            <tr>
                                <td>Email and phone support</td>
                                <td class="text-center">Yes</td>
                                <td class="text-center">Yes</td>
                                <td class="text-center">Yes</td>
                            </tr>
                            <tr>
                                <td>Pawnshop System</td>
                                <td class="text-center">Not yet available</td>
                                <td class="text-center">Not yet available</td>
                                <td class="text-center">Not yet available</td>
                            </tr>
                            <tr>
                                <td>Sales analytics monitoring</td>
                                <td class="text-center">Not yet available</td>
                                <td class="text-center">Not yet available</td>
                                <td class="text-center">Not yet available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
