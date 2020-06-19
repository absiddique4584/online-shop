@extends('admin.components.layout')
@section('title')
    Manage Orders | Online Shop
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('checkout.orders.manage')}}">Manage Orders</a></li>
            </ul>
        </div>
    </div><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-md-12 ">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>Orders</h3></div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th>Pay Status</th>
                                <th>Pay Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ ucwords(substr($order->customer->name,0,21)) }}</td>
                                    <td>{{ $order->customer->phone }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td><span class="text-capitalize badge badge-xs {{ randomColor($order->status) }}">{{ $order->status }}</span></td>
                                    <td><span class="text-capitalize badge badge-xs {{ randomColor($order->p_status) }}">{{ $order->p_status }}</span></td>
                                    <td>{{ $order->p_type }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-success btn-xs"><i class="fa fa-info"></i></a>
                                        <a href="{{ route('checkout.orders.edit', base64_encode($order->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('checkout.orders.delete', base64_encode($order->id)) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete this order?')" ><i class="fa fa-trash-o"></i></a>
                                    </td>
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
@endsection


