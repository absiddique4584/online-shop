
@extends('site.components.layout')

@section('title')
    Online Shop
@endsection

@section('content')
    <h4 style="text-align: center;">Online Shop > About</h4>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">

                                    <div>
                                        <h4><b>About Online Shop</b></h4>
                                    </div>
                                        <hr>
                                        @foreach($abouts as $about)
                                            <p>{{$about->long_desc}}</p>
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
