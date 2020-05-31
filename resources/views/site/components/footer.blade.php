<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                @foreach($profiles as $profile)


                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Owner of this website</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <img style="height: 180px; width: 180px;" src="{{asset('uploads/profile/'.$profile->image)}}" alt="">
                          <h4 style="color: #ffffff;">  {{$profile->name}}</h4>

                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->




                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                                </div>
                                <div class="media-body">
                                    <p>{{$profile->name}}</p>
                                    <p>{{$profile->address}}</p>
                                </div>
                            </li>

                            <li class="media">
                                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                                </div>
                                <div class="media-body">
                                    <p>{{$profile->phone}}<br>{{$profile->website_address}}</p>
                                </div>
                            </li>

                            <li class="media">
                                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                                </div>
                                <div class="media-body">
                                    <span><a href="#">{{$profile->email}}</a></span>
                                </div>
                            </li>

                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->
                @endforeach



                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Customer Service</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Code Of Conduct</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->



                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Online Shop</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('about')}}" title="About us">About Online Shop</a></li>
                            <li><a href="#" title="Blog">Online Shop Blog</a></li>
                            <li><a href="#" title="Company">Online Shop Carrer</a></li>
                            <li class=" last"><a href="" title="Suppliers">How to Buy</a></li>
                            <li><a href="{{route('condition')}}" title="Investor Relations">Terms & Conditions</a></li>
                            <li class=" last"><a href="{{route('policy')}}" title="Suppliers">Privacy Policy</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                    <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                    <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{ asset('assets/site/images/payments/1.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/site/images/payments/2.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/site/images/payments/3.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/site/images/payments/4.png') }}" alt=""></li>
                        <li><img src="{{ asset('assets/site/images/payments/5.png') }}" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


<!-- For demo purposes – can be removed on production -->


<!-- For demo purposes – can be removed on production : End -->



<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/site/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/site/js/echo.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/site/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/site/js/scripts.js') }}"></script>


</body>

</html>
