

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Online Shop | 404 Not Found</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap-select.min.css') }}">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="{{ asset('assets/site/js/jquery-1.11.1.min.js') }}"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @if(Session::get('customerId'))
                            <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon fa fa-arrow-circle-right" ></i>Logout</a></li>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li><a href="#"><i class="icon fa fa-lock"></i>Login</a></li>
                            <li><a href="#"><i class="icon fa fa-home"></i>Register</a></li>
                        @endif
                    </ul>
                </div><!-- /.cnt-account -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ route('index') }}">

                            <img src="{{ asset('assets/site/images/logo.png') }}" alt="">

                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->                </div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <input class="search-field" placeholder="Search here..."/>
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->                </div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><span class="count">{{ Cart::getTotalQuantity()}}</span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
						<span class="sign">&#2547;</span><span class="value"> {{ Cart::getTotal() }}</span>
					</span>
                                </div>


                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>

                                @foreach(Cart::getContent() as $item )
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="{{ route('product',$item->attributes->slug) }}">
                                                        <img src="{{ asset( 'uploads/product'.$item->attributes->thumbnail ) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="{{route('product',$item->attributes->slug)}}">{{ substr($item->name,0,20) }}</a></h3>
                                                <div class="price">&#2547; {{ $item->price * $item->quantity }}</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                @endforeach
                                <div class="clearfix"></div>
                                <hr>

                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Sub Total :</span><span class='price'>&#2547; {{ Cart::getTotal() }}</span>

                                    </div>
                                    <div class="clearfix"></div>

                                    <a href="#" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div><!-- /.cart-total-->


                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->                </div>
                <!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">

                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('brand') }}">Brand Wise Shopping</a></li>
                                <li class="dropdown navbar-right special-menu" >
                                    <a href="#" >Todays Offer</a>

                                </li>


                            </ul><!-- /.navbar-nav -->

                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img style="width: 600px; height: 350px; margin-left: 230px;" src="{{ asset('assets/site/images/404.jpg') }}" alt="image">
        </div>
    </div>
</div>

<br>
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">



                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="#" title="About us">Order History</a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li><a href="{{ route('site.contact-us') }}" title="Popular Searches">Contact Us</a></li>
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




