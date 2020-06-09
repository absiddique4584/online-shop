@extends('admin.components.layout')
@section('title')
    Manage Mail | Online Shop
@endsection

@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="#">Manage Mail</a></li>
            </ul>
        </div>
    </div><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12 ">

            @includeIf('message.message');

            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6"><h3>All Mails</h3></div>

                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mails as $mail)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $mail->first_name.' '.$mail->last_name }}</td>
                                    <td>{{ $mail->mobile }}</td>
                                    <td>{{ $mail->email }}</td>
                                    <td>{{ substr($mail->message,0,25) }}</td>

                                    <td>
                                        <a class="btn btn-danger btn-xs" href="{{ route('mails.delete',base64_encode($mail->id))}}"><i class="fa fa-trash-o"></i>Delete</a>
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


