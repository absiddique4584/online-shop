@extends('site.components.layout')

@section('title')
    Online Shop | Checkout Shipping
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <div class="sign-in-page">
        @includeIf('message.message')


                <h4 class="checkout-subtitle">Shipping Information</h4>
                <p class="text title-tag-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequatur ea error exercitationem id inventore libero maxime mollitia, nam nesciunt officiis perferendis perspiciatis placeat quia reiciendis, repellendus unde ut veritatis!</p>

                <form class="register-form outer-top-xs"  method="post" action="{{ route('checkout.shipping') }}">
                    @csrf

                    <div class="form-group">
                        <label class="info-title" for="name">Full Name <span>*</span></label>
                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value=" {{ $customer->name }}" placeholder="Name" required  >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="email">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value=" {{ $customer->email }}"  placeholder="Write Your Email" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" pattern="01[3|5|6|7|8|9][0-9]{8}" value="{{ $customer->phone }}" required  placeholder="Write Your Mobile No.">
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="address">Address <span>*</span></label>
                        <textarea class="form-control" name="address" id="address"  placeholder="Write Your Address">{{old('address')}}</textarea>
                    </div>

                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Save Shipping Info</button>
                </form>


            </div>
            <!-- create a new account -->
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    <br>


@endsection

