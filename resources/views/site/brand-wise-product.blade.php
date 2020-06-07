
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
                                <li class="dropdown menu-item">
                                    @foreach($brand_wise_products as $brand)
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $brand->brand_name }}</a>
                                    @endforeach
                                        <ul class="dropdown-menu mega-menu">
                                        <li class="yamm-content">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <ul class="links list-unstyled">
                                                        <li><a href="#">Dresses</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </li><!-- /.yamm-content -->
                                    </ul><!-- /.dropdown-menu -->
                                </li><!-- /.menu-item -->

                            </ul><!-- /.nav -->
                        </nav><!-- /.megamenu-horizontal -->
                    </div><!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">

                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                                                    Camera
                                                </a>
                                            </div><!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                    </ul>
                                                </div><!-- /.accordion-inner -->
                                            </div><!-- /.accordion-body -->
                                        </div><!-- /.accordion-group -->


                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder">
      	    <span class="min-max">
                 <span class="pull-left">$200.00</span>
                 <span class="pull-right">$800.00</span>
            </span>
                                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

                                        <input type="text" class="price-slider" value="" >

                                    </div><!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
<------------ Please Insert From Here
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

    @endsection
