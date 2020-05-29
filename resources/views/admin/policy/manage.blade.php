@extends('admin.components.layout')

@section('title')
    Manage Policy | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Dashboard</a></li>
                <li><i class="" aria-hidden="true"></i><a href="javascript:avoid(0)">Policy</a></li>
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
                            <h3>Policy</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('policies.create') }}" class="btn btn-primary pull-right">Add Policy</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>

                            <tr>
                                <th>Sl No</th>
                                <th>Introduction</th>
                                <th>Account</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($policies as $policy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($policy->privacy_policy,0,35) !!}</td>
                                    <td>{!! substr($policy->collect_info,0,35) !!}</td>
                                    <td>{!! substr($policy->utilize_info,0,35) !!}</td>
                                    <td>
                                        <a href="{{ route('policies.edit', base64_encode($policy->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('policies.delete', base64_encode($policy->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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


