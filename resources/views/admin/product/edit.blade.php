@extends('admin.components.layout')

@section('title')
    Update Product | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Product</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Update Product</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('products.manage') }}" class="btn btn-primary pull-right">Manage Product</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('products.update',$products->id) }}" enctype="multipart/form-data">
                        @csrf


                        <!------NAME ------->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}" required placeholder="Product Name">
                            </div>
                        </div>
                        <!------------------>
                        <!------MODEL ------->
                        <div class="form-group">
                            <label for="model" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="model" name="model" value="{{ $products->model }}" required placeholder="Product model">
                            </div>
                        </div>
                        <!------------------>
                        <!------Buying Price------->
                        <div class="form-group">
                            <label for="buying_price" class="col-sm-3 control-label">Buying Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="buying_price" name="buying_price" value="{{ $products->buying_price }}" required placeholder="Buying Price">
                            </div>
                        </div>
                        <!------------------>
                        <!-----Selling Price------->
                        <div class="form-group">
                            <label for="selling_price" class="col-sm-3 control-label">Selling Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ $products->selling_price }}" required placeholder="Selling Price">
                            </div>
                        </div>
                        <!------------------>
                        <!------special_price------->
                        <div class="form-group">
                            <label for="special_price" class="col-sm-3 control-label">Special Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="special_price" name="special_price" value="{{ $products->special_price }}" required placeholder="Special Price">
                            </div>
                        </div>
                        <!------------------>
                        <!------Special Start------->
                        <div class="form-group">
                            <label for="special_start" class="col-sm-3 control-label">Special Start</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="special_start" name="special_start" value="{{ $products->special_start }}" required placeholder="Special Start">
                            </div>
                        </div>
                        <!------------------>
                        <!------Special End ------->
                        <div class="form-group">
                            <label for="special_end" class="col-sm-3 control-label">Special End</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="special_end" name="special_end" value="{{ $products->special_end }}" required placeholder="Special End">
                            </div>
                        </div>
                        <!------------------>
                        <!------Quantity------->
                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $products->quantity }}" required placeholder="Quantity">
                            </div>
                        </div>
                        <!------------------>
                        <!------Thumbnail------->
                        <div class="form-group">
                            <label for="thumbnail" class="col-sm-3 control-label">Thumbnail</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{ $products->thumbnail }}" required placeholder="Thumbnail">
                            </div>
                        </div>
                        <!------------------>





                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
