
@extends('site.components.layout')

@section('title')
    Online Shop
@endsection

@section('content')
    <h4 style="text-align: center;"></h4>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>


                    <div>
                        <h4 style="text-align: center;"><b>Online Shop > Privacy & Policies</b></h4>
                    </div>
                    <hr>
                    @foreach($policies as $policy)
                        <p style="font-size: 21px;"> <b>Privacy Policy :<br></b>{!! $policy->privacy_policy !!} </p>
                        <p style="font-size: 21px;" > <b>Collect Information:<br></b> {!! $policy->collect_info !!} </p>
                        <p style="font-size: 21px;" > <b>Utilize Information :<br></b> {!! $policy->utilize_info !!} </p>
                    @endforeach





                </div><!-- /.col -->
            </div><!-- /.row -->

        </div>
        <br>

@endsection


