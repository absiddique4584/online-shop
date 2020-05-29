@extends('admin.components.layout')

@section('title')
    Manage Condition | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Condition</a></li>
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
                            <h3>Condition</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('conditions.create') }}" class="btn btn-primary pull-right">Add Condition</a>
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
                                <th>Conduct</th>
                                <th>Submission</th>
                                <th>Information</th>
                                <th>Indemnity</th>
                                <th>Losses</th>
                                <th>Promise</th>
                                <th>Waiver</th>
                                <th>Law</th>
                                <th>Offer</th>
                                <th>Process</th>
                                <th>Security</th>
                                <th>Warranty</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($conditions as $condition)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($condition->introduction,0,20) !!}</td>
                                    <td>{!! substr($condition->account,0,20) !!}</td>
                                    <td>{!! substr($condition->order,0,20) !!}</td>
                                    <td>{!! substr($condition->conduct,0,20) !!}</td>
                                    <td>{!! substr($condition->submission,0,20) !!}</td>
                                    <td>{!! substr($condition->information,0,20) !!}</td>
                                    <td>{!! substr($condition->indemnity,0,20) !!}</td>
                                    <td>{!! substr($condition->losses,0,20) !!}</td>
                                    <td>{!! substr($condition->promise,0,20) !!}</td>
                                    <td>{!! substr($condition->waiver,0,20) !!}</td>
                                    <td>{!! substr($condition->law,0,20) !!}</td>
                                    <td>{!! substr($condition->offer,0,20) !!}</td>
                                    <td>{!! substr($condition->process,0,20) !!}</td>
                                    <td>{!! substr($condition->security,0,20) !!}</td>
                                    <td>{!! substr($condition->warranty,0,20) !!}</td>
                                    <td>
                                        <a href="{{ route('conditions.edit', base64_encode($condition->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('conditions.delete', base64_encode($condition->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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

