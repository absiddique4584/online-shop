
@extends('site.components.layout')

@section('title')
  Online Shop
@endsection

@section('content')
    <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown outer-bottom-xs">
                <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">


@foreach($categories as $row)
                        <li class="dropdown menu-item">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$row->name}}</a>
                            <ul class="dropdown-menu mega-menu">
                                <li class="yamm-content">
                                    <div class="row">
                                        @foreach($row->sub_categories as $sub_categorie)
                                        <div class="col-sm-4 col-md-3">
                                            <a href="{{route('category', $sub_categorie->slug)}}">{{ $sub_categorie->name }}</a>
                                        </div><!-- /.col -->
                                        @endforeach
                                    </div><!-- /.row -->
                                </li><!-- /.yamm-content -->
                            </ul><!-- /.dropdown-menu -->
                        </li><!-- /.menu-item -->
                        @endforeach


                    </ul><!-- /.nav -->
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->

            <!-- ============================================== HOT DEALS ============================================== -->
            <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">hot deals</h3>
                <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

                    @foreach($hot_deals as $hot_deal)
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <img src="{{asset('uploads/product/'.$hot_deal->thumbnail)}}" alt="">
                                </div>


                                @php($nPrice = false)
                                @if($hot_deal->special_start <= date('Y-m-d') && $hot_deal->special_end >= date('Y-m-d'))
                                    @php($nPrice = true)
                                @endif
                                <div class="sale-offer-tag"><span>{{ sprintf('%.2f',(($hot_deal->selling_price-$hot_deal->special_price)/$hot_deal->selling_price)*100) }}%<br>off</span></div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="value">DAYS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="value">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="value">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="value">SEC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a href="#">{{ $hot_deal->name }}</a></h3>
                                <div class="rating rateit-small"></div>

                                <div class="product-price">
                                    <span class="price">&#2547;{{ $nPrice ? $hot_deal->special_price : $hot_deal->selling_price }} </span>
                                    @if($nPrice)
                                        <span class="price-before-discount ">&#2547;{{ $hot_deal->selling_price }}</span>
                                    @endif
                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->



                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                    <div class="add-cart-button btn-group">
                                        <form action="{{route('cart.add')}}" method="post" >
                                            @csrf
                                            <input type="hidden"  name="id" value="{{$hot_deal->id}}">
                                            <i class="fa fa-shopping-cart"></i>
                                        <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                        </form>
                                    </div>

                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div>
                    </div>

                    @endforeach
                </div><!-- /.sidebar-widget -->
            </div>
            <!-- ============================================== HOT DEALS: END ============================================== -->


            <!-- ============================================== SPECIAL OFFER ============================================== -->

            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Offer</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                        <!--------------------------DINAMIC Content------------------------------------------>
                        @php($sl=1)
                        @php($total = count($s_offers))
                        @foreach($s_offers as $s_offer)

                            @if(($sl % 3) == 1)
                        <div class="item">
                            <div class="products special-product">
                                @endif

                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{asset('uploads/product/'.$s_offer->thumbnail)}}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 style="height: 44px; overflow: hidden;" class="name"><a href="#">{{ $s_offer->name }}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				                              <span class="price">&#2547;{{ $s_offer->selling_price }}</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                @if(($sl % 3) == 0 || $sl == $total)

                            </div>
                        </div>
                            @endif
                            @php($sl++)
                        @endforeach
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!--------------------------DINAMIC Content End------------------------------------------>
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp">
                <h3 class="section-title">Product tags</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="tag-list">
                        <a class="item" title="Phone" href="category.html">Phone</a>
                        <a class="item active" title="Vest" href="category.html">Vest</a>
                        <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                        <a class="item" title="Furniture" href="category.html">Furniture</a>
                        <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                        <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                        <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                        <a class="item" title="Toys" href="category.html">Toys</a>
                        <a class="item" title="Rose" href="category.html">Rose</a>
                    </div><!-- /.tag-list -->
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
            <!-- ============================================== SPECIAL DEALS ============================================== -->

            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Deals</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                        <!--------------------DINAMIC CONTENT --------------------------->
                        @php($sl=1)
                        @php($total = count($s_deals))
                        @foreach($s_deals as $s_deal)

                            @if(($sl % 3) == 1)
                                <div class="item">
                                    <div class="products special-product">
                                        @endif

                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('uploads/product/'.$s_deal->thumbnail)}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 style="height: 44px;" class="name"><a href="#">{{ $s_deal->name }}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
                                                                <span class="price">&#2547;{{ $s_deal->selling_price }}</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        @if(($sl % 3) == 0 || $sl == $total)

                                    </div>
                                </div>
                            @endif
                            @php($sl++)
                        @endforeach
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!--------------------DINAMIC CONTENT END--------------------------->
            <!-- ============================================== SPECIAL DEALS : END ============================================== -->
            <!-- ============================================== NEWSLETTER ============================================== -->
            <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                <h3 class="section-title">Newsletters</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <p>Sign Up for Our Newsletter!</p>
                    <form role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                        </div>
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!-- ============================================== NEWSLETTER: END ============================================== -->

            <!-- ============================================== Testimonials============================================== -->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                <div id="advertisement" class="advertisement">
                    <div class="item">
                        <div class="avatar"><img src="{{ asset('assets/site/images/testimonials/member1.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">John Doe <span>Abc Company</span></div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img src="{{ asset('assets/site/images/testimonials/member3.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                    </div><!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img src="{{ asset('assets/site/images/testimonials/member2.png') }}" alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                </div><!-- /.owl-carousel -->
            </div>

            <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner">
                <img src="{{ asset('assets/site/images/banners/LHS-banner.jpg') }}" alt="Image">
            </div>


        </div><!-- /.sidemenu-holder -->
        <!-- ============================================== SIDEBAR : END ============================================== -->

        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
@foreach($sliders as $row)
                    <div class="item" style="background-image: url({{ asset('uploads/slider/'.$row->image) }});">

                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div style="color: purple;" class="slider-header fadeInDown-1">{{$row->title}}</div>
                                <div class="big-text fadeInDown-1">
                                    {{$row->sub_title}}
                                </div>

                                <div class="excerpt fadeInDown-2 hidden-xs">

                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="{{ $row->url }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->
                    @endforeach
                </div><!-- /.owl-carousel -->
            </div>

            <!-- ========================================= SECTION – HERO : END ========================================= -->

            <!-- ============================================== INFO BOXES ============================================== -->
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">money back</h4>
                                    </div>
                                </div>
                                <h6 class="text">30 Days Money Back Guarantee</h6>
                            </div>
                        </div><!-- .col -->

                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">free shipping</h4>
                                    </div>
                                </div>
                                <h6 class="text">Shipping on orders over $99</h6>
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">Special Sale</h4>
                                    </div>
                                </div>
                                <h6 class="text">Extra $5 off on all items </h6>
                            </div>
                        </div><!-- .col -->
                    </div><!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div><!-- /.info-boxes -->
            <!-- ============================================== INFO BOXES : END ============================================== -->
            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">New Products</h3>
                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                        <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                        @foreach($categories as $category)
                            <li>
                                <a data-transition-type="backSlide" href="#{{ $category->slug }}" data-toggle="tab">{{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul><!-- /.nav-tabs -->
                </div>

                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="{{ asset('assets/site/images/products/p1.jpg') }}" alt=""></a>
                                                </div><!-- /.image -->

                                                <div class="tag new"><span>new</span></div>
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div>

                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="smartphone">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="{{ asset('assets/site/images/products/p5.jpg') }}" alt=""></a>
                                                </div><!-- /.image -->

                                                <div class="tag sale"><span>sale</span></div>
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->



                </div><!-- /.tab-content -->
            </div><!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="{{ asset('assets/site/images/banners/home-banner1.jpg') }}" alt="">
                            </div>

                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->
                    <div class="col-md-5 col-sm-5">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="{{ asset('assets/site/images/banners/home-banner2.jpg') }}" alt="">
                            </div>

                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.wide-banners -->

            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    @foreach($f_products as $f_product )
                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="#"><img src="{{asset('uploads/product/'.$f_product->thumbnail)}}" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag new">
                                        <span > {{ sprintf('%.d',(($f_product->selling_price-$f_product->special_price)/$f_product->selling_price)*100) }}%off </span>
                                    </div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="#">{{ $f_product->name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
				                  <span class="price">&#2547; {{ $f_product->special_price }} </span>
                                        <span class="price-before-discount">&#2547; {{ $f_product->selling_price }}</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                            </li>



                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="#" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="#" title="Compare">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                    @endforeach
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">

                    <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="{{ asset('assets/site/images/banners/home-banner.jpg') }}" alt="">
                            </div>
                            <div class="strip strip-text">
                                <div class="strip-inner">
                                    <h2 class="text-right">New Mens Fashion<br>
                                        <span class="shopping-needs">Save up to 40% off</span></h2>
                                </div>
                            </div>
                            <div class="new-label">
                                <div class="text">NEW</div>
                            </div><!-- /.new-label -->
                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.wide-banners -->
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== BEST SELLER ============================================== -->

            <div class="best-deal wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">Best seller</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p20.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p21.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p22.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p23.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p24.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p25.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p26.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('assets/site/images/products/p27.jpg') }}" alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!-- ============================================== BEST SELLER : END ============================================== -->

            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                <h3 class="section-title">latest form blog</h3>
                <div class="blog-slider-container outer-top-xs">
                    <div class="owl-carousel blog-slider custom-carousel">

                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="{{ asset('assets/site/images/blog-post/post1.jpg') }}" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="{{ asset('assets/site/images/blog-post/post2.jpg') }}" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="{{ asset('assets/site/images/blog-post/post1.jpg') }}" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="{{ asset('assets/site/images/blog-post/post2.jpg') }}" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="{{ asset('assets/site/images/blog-post/post1.jpg') }}" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                    </div><!-- /.owl-carousel -->
                </div><!-- /.blog-slider-container -->
            </section><!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->

            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
                <h3 class="section-title">New Arrivals</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">




                    @foreach($n_arrivals as $n_arrival)
                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="#"> <img src="{{asset('uploads/product/'.$n_arrival->thumbnail)}}" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag sale"><span>new</span></div>
                                </div><!-- /.product-image -->
                                @php($nPrice = false)
                                @if($n_arrival->special_start <= date('Y-m-d') && $n_arrival->special_end >= date('Y-m-d'))
                                    @php($nPrice = true)
                                @endif

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="#">{{ $n_arrival->name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">&#2547;{{ $nPrice ? $n_arrival->special_price : $n_arrival->selling_price }} </span>

                                        @if($nPrice)
                                            <span class="off"> {{ sprintf('%.d',(( $n_arrival->selling_price-$n_arrival->special_price)/$n_arrival->selling_price)*100) }}%OFF </span>
                                            <span class="price-before-discount pull-right">&#2547;{{ $n_arrival->selling_price }}</span>
                                        @endif
                                    </div>
                                    <!-- /.product-price -->

                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                    @endforeach
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        </div><!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
    </div><!-- /.row -->
    <br>
@endsection
