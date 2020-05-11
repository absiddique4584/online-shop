@extends('admin.components.layout')

@section('title')
    Manage Products | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Products</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Products</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">Add Product</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Special Price</th>
                                <th>Special Price Date </th>
                                <th>Quantity</th>
                                <th>Thumbnail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ substr( $product->name,0,18)  }}</td>
                                    <td>{{ $product->model }}</td>
                                    <td><input type="text" value="{{ $product->buying_price }}"></td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->special_price }}</td>
                                    <td>{{ $product->special_start .' - '. $product->special_end }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td><img style="width: 30px; height: 40px;" src="{{ $product->thumbnail }}" alt=""></td>
                                    <td>
                                        <input type="checkbox" {{ $product->status === 'active' ? 'checked':'' }} id="productStatus" data-id="{{ $product->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                               data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', base64_encode($product->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('products.delete', base64_encode($product->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
