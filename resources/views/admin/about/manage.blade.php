@extends('admin.components.layout')
@section('title')
    Manage About | Online Shop
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('abouts.manage')}}">Manage About</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated slideInUp">
        <div class="col-sm-12 ">

            @includeIf('message.message')

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>About</h3></div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary pull-right" href="{{route('abouts.create')}}">Add About</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th style="text-align: center;">Long Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ substr($about->long_desc,0,100) }}........</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ route('abouts.edit',base64_encode($about->id))}}"><i class="fa fa-pencil"></i>Edit</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('abouts.delete',base64_encode($about->id))}}"><i class="fa fa-trash-o"></i>Delete</a>
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


