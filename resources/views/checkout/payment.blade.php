@extends('site.components.layout')

@section('title')
    Online Shop | Checkout Shipping
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="sign-in-page">
                @includeIf('message.message')


                <h4 class="checkout-subtitle">Payment Information</h4>

                <form class="register-form outer-top-xs"  method="post" action="{{ route('order') }}">
                    @csrf


                   <div>
                       <div class="radio">
                           <label><input type="radio" value="Cash"  name="type">Cash on delivery</label>
                       </div>
                   </div>
                    <div>
                       <div class="radio">
                           <label><input type="radio" value="bkash"  name="type">bkash</label>
                       </div>
                   </div>
                    <div>
                       <div class="radio">
                           <label><input type="radio" value="Rocket"  name="type">Rocket</label>
                       </div>
                   </div>

                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Confirm Order</button>
                </form>


            </div>
            <!-- create a new account -->
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    <br>


@endsection


