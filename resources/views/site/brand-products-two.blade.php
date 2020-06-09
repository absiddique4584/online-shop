@extends('site.components.layout')

@section('title')
    Online Shop | Brand Wise Products
@endsection

@section('content')




    <!-- ====================== SECTION – HERO BANNER =================== -->



<div class="col-md-12">
       <h4 style="color: #59B210; margin-left: 18px;" >BRAND NAME :{{ ucwords($brand->brand_name) }} </h4>
       <!----------------------->
       <div class='col-md-3 sidebar'>
           <!-- ================================== TOP NAVIGATION ================================== -->
           <div class="side-menu animate-dropdown outer-bottom-xs">
               <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>All Brands</div>
               <nav class="yamm megamenu-horizontal" role="navigation">
                   <ul class="nav">
                       <li class="active" {{ request()->is('brand/products/*') ? 'active' : '' }} >
                           @foreach($brand_get as $brand)
                               <a   href="{{ route('brand.products.two',$brand->brand_slug) }}"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $brand->brand_name }}</a>
                           @endforeach

                       </li><!-- /.menu-item -->

                   </ul><!-- /.nav -->
               </nav><!-- /.megamenu-horizontal -->
           </div>
       </div>
           <!----------------------->

           <div class="col-md-9">

               <div class="filter-tabs">
                   <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                       <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                       <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                   </ul>
               </div>


               <div class="search-result-container ">
                   <div id="myTabContent" class="tab-content category-list">
                       <div class="tab-pane active " id="grid-container">
                           <div class="category-product">
                               <div class="row">
                                   {{--                        @if(count($cat_wise_products) > 0)--}}
                                   @if(!$brand_wise_products->isEmpty())
                                       @foreach($brand_wise_products as $product)
                                           <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp">
                                               <div class="products">
                                                   <div class="product">
                                                       <div class="product-image">
                                                           <div class="image"> <a href="{{ route('site.product-detail', $product->slug) }}"><img  src="{{ asset('uploads/product/'. $product->thumbnail) }}" alt="{{ $product->thumbnail }}"></a> </div>
                                                           <!-- /.image -->
                                                           <div class="tag new"><span class="special-price-percent">
                                                {{ sprintf('%.2f', (($product->selling_price - $product->special_price) / $product->selling_price) * 100) }}%
                                                    </span></div>
                                                       </div>
                                                       <!-- /.product-image -->

                                                       <div class="product-info text-left">
                                                           <h3 class="name"><a href="{{ route('site.product-detail', $product->slug) }}">{{ substr($product->name, 0, 19) }}</a></h3>
                                                           {{--                                                <div class="rating rateit-small"></div>--}}
                                                           <div class="description"></div>
                                                           <div class="product-price">
                                                               @php($special_price = false)
                                                               @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d'))
                                                                   @php($special_price = true)
                                                               @endif
                                                               <span class="price">
                                                &#2547;{{ $special_price ? $product->special_price : $product->selling_price }}
                                                </span>
                                                               @if($special_price)

                                                                   <span class="price-before-discount pull-right">
                                                &#2547;{{ $product->selling_price }}
                                                    </span>
                                                           @endif
                                                           <!-- /.product-price -->

                                                           </div>
                                                       </div>
                                                       <!-- /.product-info -->
                                                       <div class="cart clearfix animate-effect">
                                                           <div class="action">
                                                               <ul class="list-unstyled">
                                                                   <li class="add-cart-button btn-group">
                                                                       <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                       <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                   </li>
                                                                   <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('site.product-detail', $product->slug) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                   <li class="lnk"> <a class="add-to-cart" href="{{ route('site.product-detail', $product->slug) }}" title="Compare"> <i class="fa fa-eye"></i> </a> </li>
                                                               </ul>
                                                           </div>
                                                           <!-- /.action -->
                                                       </div>
                                                       <!-- /.cart -->
                                                   </div>
                                                   <!-- /.product -->

                                               </div>
                                               <!-- /.products -->
                                           </div>
                                       @endforeach
                                   @else
                                       <h2 class="text-center">No Product Found under this,<span style="color: #59B210; font-weight: bold;">{{ 'Brand - ' . $brand->brand_name . '!' }}</span> </h2>
                               @endif
                               <!-- /.item -->
                               </div>
                               <!-- /.row -->
                           </div>
                           <!-- /.category-product -->
                       </div>
                       <!-- /.tab-pane -->

                       <div class="tab-pane"  id="list-container">
                           <div class="category-product">
                               @if(count($brand_wise_products) > 0)
                                   {{--                    @if(!$cat_wise_products->isEmpty())--}}
                                   @foreach($brand_wise_products as $product)
                                       <div class="category-product-inner wow fadeInUp">
                                           <div class="products">
                                               <div class="product-list product">
                                                   <div class="row product-list-row">
                                                       <div class="col col-sm-4 col-lg-4">
                                                           <div class="product-image">
                                                               <div class="image"> <img src="{{ asset('uploads/product/'.$product->thumbnail) }}" alt=""> </div>
                                                           </div>
                                                           <!-- /.product-image -->
                                                       </div>
                                                       <!-- /.col -->
                                                       <div class="col col-sm-8 col-lg-8">
                                                           <div class="product-info">
                                                               <h3 class="name"><a href="{{ route('site.product-detail', $product->slug) }}">{{ $product->name }}</a></h3>
                                                               {{--                                                    <div class="rating rateit-small"></div>--}}
                                                               <div class="product-price">
                                                                   @php($special_price = false)
                                                                   @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d'))
                                                                       @php($special_price = true)
                                                                   @endif
                                                                   <span class="price">
                                                    &#2547;{{ $special_price ? $product->special_price : $product->selling_price }}
                                                        </span>
                                                                   @if($special_price)
                                                                       <span class="special-price-percent">
                                                {{ sprintf('%.2f', (($product->selling_price - $product->special_price) / $product->selling_price) * 100) }}% off
                                                        </span>
                                                                       <span class="price-before-discount pull-right">
                                                &#2547;{{ $product->selling_price }}
                                                        </span>
                                                                   @endif
                                                               </div>
                                                               <!-- /.product-price -->
                                                               <div class="description m-t-10">{!! $product->description  !!}</div>
                                                               <div class="cart clearfix animate-effect">
                                                                   <div class="action">
                                                                       <ul class="list-unstyled">
                                                                           <li class="add-cart-button btn-group">
                                                                               <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                               <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                           </li>
                                                                           <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('site.product-detail', $product->slug) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                           <li class="lnk"> <a class="add-to-cart" href="{{ route('site.product-detail', $product->slug) }}" title="Compare"> <i class="fa fa-eye"></i> </a> </li>
                                                                       </ul>
                                                                   </div>
                                                                   <!-- /.action -->
                                                               </div>
                                                               <!-- /.cart -->
                                                           </div>
                                                           <!-- /.product-info -->
                                                       </div>
                                                       <!-- /.col -->
                                                   </div>
                                                   <!-- /.product-list-row -->
                                                   <div class="tag new"><span>new</span></div>
                                               </div>
                                               <!-- /.product-list -->
                                           </div>
                                           <!-- /.products -->
                                       </div>
                                       <!-- /.category-product-inner -->
                                   @endforeach
                               @else
                                   {{--                        @foreach($category as $cat)--}}
                                   <h2 class="text-center">No Product Found under this,
                                       <br>
                                       <span style="color: #59B210; font-weight: bold;">{{ 'Brand - ' . $brand->brand_name . ' !' }}</span>
                                   </h2>
                                   {{--                        @endforeach--}}
                               @endif
                           </div>
                           <!-- /.category-product -->
                       </div>
                       <!-- /.tab-pane #list-container -->
                   </div>
                   <!-- /.tab-content -->
                   <div class="clearfix filters-container">
                       <div class="text-right">
                           <div class="pagination-container">
                               <ul class="list-inline list-unstyled">
                                   <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                   <li><a href="#">1</a></li>
                                   <li class="active"><a href="#">2</a></li>
                                   <li><a href="#">3</a></li>
                                   <li><a href="#">4</a></li>
                                   <li><a href="#">5</a></li>
                                   <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                               </ul>
                               <!-- /.list-inline -->
                           </div>
                           <!-- /.pagination-container --> </div>
                       <!-- /.text-right -->

                   </div>
                   <!-- /.filters-container -->

               </div>
           </div>
       </div>

           <!-- /.search-result-container -->
</div>
           <br>

@endsection

