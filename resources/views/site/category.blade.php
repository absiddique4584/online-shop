@extends('site.components.layout')

@section('title')
    Online Shop
@endsection

@section('content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                             <div class="row">



                                 @foreach($products as $product)

                                 <div class="col-sm-4 col-md-3 wow fadeInUp">
                                     <div class="products">

                                         <div class="product">
                                             <div class="product-image">
                                                 <div class="image">
                                                     <a href="detail.html"><img  src="{{asset('uploads/product/'.$product->thumbnail)}}" alt=""></a>
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
                                                             <a class="add-to-cart" href="#" title="Compare">
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
                             </div>
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->


                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div><!-- /.row -->

    </div>
    <br>

@endsection
