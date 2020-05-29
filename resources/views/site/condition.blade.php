
@extends('site.components.layout')

@section('title')
    Online Shop
@endsection

@section('content')
    <h4 style="text-align: center;">Online Shop > Terms & Conditions</h4>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>


                                        <div>
                                            <h4><b>Terms & Conditions of Online Shop</b></h4>
                                        </div>
                                        <hr>
                                        @foreach($conditions as $condition)
                                            <p> <b>Introduction :<br></b>{!! $condition->introduction !!} </p>
                                            <p> <b>Account :<br></b> {!! $condition->account !!} </p>
                                            <p> <b>Order :<br></b> {!! $condition->order !!} </p>
                                            <p> <b>Conduct :<br></b> {!! $condition->conduct !!} </p>
                                            <p> <b>Submission :<br></b> {!! $condition->submission !!} </p>
                                            <p> <b>Information :<br></b> {!! $condition->information !!} </p>
                                            <p> <b>Indemnity :<br></b> {!! $condition->indemnity !!} </p>
                                            <p> <b>Losses :<br></b> {!! $condition->losses !!} </p>
                                            <p> <b>Promise :<br></b> {!! $condition->promise !!} </p>
                                            <p> <b>Waiver :<br></b> {!! $condition->waiver !!} </p>
                                            <p> <b>Law :<br></b> {!! $condition->law !!} </p>
                                            <p> <b>Offer :<br></b> {!! $condition->offer !!} </p>
                                            <p> <b>Process :<br></b> {!! $condition->process !!} </p>
                                            <p> <b>Security :<br></b> {!! $condition->security !!} </p>
                                            <p> <b>Warranty :<br></b>{!! $condition->warranty !!} </p>
                                        @endforeach





                </div><!-- /.col -->
            </div><!-- /.row -->

        </div>
        <br>

@endsection

