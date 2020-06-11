@extends('site.components.layout')

@section('title')
    Online Shop | Checkout
@endsection

@section('content')

    <div class="sign-in-page">
        <div class="row">
            @includeIf('message.message')
            <!-- Sign-in -->
            <div class="col-md-6 col-sm-6 sign-in">
                <h4 class="">Sign in</h4>
                <p class="">Hello, Welcome to your account.</p>
                <div class="social-sign-in outer-top-xs">
                    <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                    <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                </div>
                <form class="register-form outer-top-xs" role="form">
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                    </div>
                    <div class="radio outer-xs">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                        </label>
                        <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                </form>
            </div>
            <!-- Sign-in -->

            <!-- create a new account -->
            <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="checkout-subtitle">Create a new account</h4>
                <p class="text title-tag-line">Create your new account.</p>

                <form class="register-form outer-top-xs"  method="post" action="{{ route('customer.register') }}">
                    @csrf

                    <div class="form-group">
                        <label class="info-title" for="name">Name <span>*</span></label>
                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value=" {{ old('name') }}" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="email">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value=" {{old('email')}}" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" pattern="01[3|5|6|7|8|9][0-9]{8}" value="{{ old('phone') }}" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="password">Password <span>*</span></label>
                        <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="confirm_password">Confirm Password <span>*</span></label>
                        <input type="password" name="confirm_password" class="form-control unicase-form-control text-input" id="confirm_password" required >
                    </div>

                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                </form>


            </div>
            <!-- create a new account -->
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    <br>


@endsection

