@extends('site.components.layout')

@section('title')
    Online Shop
@endsection

@section('content')

            <div class='row'>
                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                             <div class="row">

                                 @if($products->isEmpty())
                                     <h1 class="text-center"><b>Product Not Found !</b></h1>
                                 @else


                                 @foreach($products as $product)

                                 <div class="col-sm-4 col-md-3 wow fadeInUp">
                                     <div class="products">

                                         <div class="product">
                                             <div class="product-image">
                                                 <div class="image">
                                                     <a href="{{route('product',$product->slug)}}"><img  src="{{asset('uploads/product/'.$product->thumbnail)}}" alt=""></a>
                                                 </div><!-- /.image -->

                                                 <div class="tag new"><span>new</span></div>
                                             </div>
                                             <!-- /.product-image -->
                                           @php($price = false)
                                            @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d') )
                                                 @php($price = true)
                                                 @endif
                                             <div class="product-info text-left">
                                                 <h3 class="name"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3>
                                                 <div class="rating rateit-small"></div>
                                                 <div class="description"></div>

                                                 <div class="product-price">
				                                   <span class="price"> &#2547;{{ $price ? $product->special_price:$product->selling_price}} </span>


                                                     @if($price)
                                                     <span class=""> {{ sprintf('%.2f',(($product->selling_price-$product->special_price)/$product->selling_price)*100) }}% off</span>
                                                     <span class="price-before-discount pull-right"> &#2547;{{$product->selling_price}} </span>
                                                     @endif

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
                                                             <a class="add-to-cart" href="{{route('product',$product->slug)}}" title="Wishlist">
                                                                 <i class="icon fa fa-heart"></i>
                                                             </a>
                                                         </li>

                                                         <li class="lnk">
                                                             <a class="add-to-cart" href="{{route('product',$product->slug)}}" title="Compare">
                                                                 <i class="fa fa-eye"></i>
                                                             </a>
                                                         </li>
                                                     </ul>
                                                 </div><!-- /.action -->
                                             </div><!-- /.cart -->
                                         </div><!-- /.product -->

                                     </div><!-- /.products -->
                                 </div><!-- /.item -->
                                 @endforeach

                                 @endif
                             </div>
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->


                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div>
            <br>
            <br>
@endsection
