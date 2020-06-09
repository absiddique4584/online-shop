@extends('site.components.layout')

@section('title')
    Online Shop | Brand Wise Products
@endsection

@section('content')


    <div class='row'>
        <div class='col-md-3 sidebar'>
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown outer-bottom-xs">
                <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>All Brands</div>
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        <li class="dropdown menu-item {{ request()->is('brand/products/*') ? 'active' : '' }} ">
                            @foreach($brand_wise_products as $brand)
                                <a href="{{ route('brand.products.two',$brand->brand_slug) }}"><i
                                        class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $brand->brand_name }}
                                </a>
                            @endforeach

                        </li><!-- /.menu-item -->

                    </ul><!-- /.nav -->
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->


            </div><!-- /.sidebar-module-container -->
        <div class='col-md-9'>
            <h1 style="margin-top: 220px;">
                <------------ Please Insert From Here </h1>
            <!---              <div class="search-result-container ">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row">




                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">

                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="detail.html"><img  src="#" alt=""></a>
                                                            </div><!-- /.image -->

            <!---                <div class="tag new"><span>new</span></div>
                      </div><!-- /.product-image -->


            <!---                          <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Lorem Ipsum</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
<span class="price">
    $450.99				</span>
                                            <span class="price-before-discount">$ 800</span>

                                        </div><!-- /.product-price -->

            <!---                             </div><!-- /.product-info -->
            <!---                             <div class="cart clearfix animate-effect">
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
                                                           <i class="fa fa-signal"></i>
                                                       </a>
                                                   </li>
                                               </ul>
                                           </div><!-- /.action -->
            <!---                             </div><!-- /.cart -->
            <!---                          </div><!-- /.product -->

            <!---                      </div><!-- /.products -->
            <!---                   </div><!-- /.item -->


            <!---                </div><!-- /.row -->
            <!---             </div><!-- /.category-product -->

            <!---        </div><!-- /.tab-pane -->

            <!---     </div><!-- /.tab-content -->
            <!---      <div class="clearfix filters-container">



                </div><!-- /.filters-container -->

            <!---     </div><!-- /.search-result-container -->

        </div><!-- /.col -->
    </div><!-- /.row -->
    <br>
@endsection
