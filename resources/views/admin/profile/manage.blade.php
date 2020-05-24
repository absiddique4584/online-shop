@extends('admin.components.layout')
@section('title')
    Manage Profile | Online Shop
@endsection

@section('content')
    @if(auth()->user()->is_admin===0)
    <div><h1>You Don't Have Excess In This Section</h1>
    <h4>Only Admin Can Excess and Create,Edit,Delete</h4>
    </div>
    @endif
    @if(auth()->user()->is_admin===1)
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="{{route('profiles.manage')}}">Profile</a></li>
            </ul>
        </div>
    </div><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div  class="col-sm-10 col-sm-offset-1">

            @includeIf('message.message')
            <br/>
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <br>
                    <!------------------------------------------------>
                    <form style="display: none;" class="form-horizontal create_section" method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-------------->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Profile Name">
                            </div>
                        </div>
                            <!-------------->

                        <!-------------->
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required placeholder="Permanent Address">
                            </div>
                        </div>
                        <!-------------->

                        <!-------------->
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
                            </div>
                        </div>
                        <!-------------->
                        <!-------------->
                        <div class="form-group">
                            <label for="website_address" class="col-sm-3 control-label">Website</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="website_address" name="website_address" value="{{ old('website_address') }}" required placeholder="Website Address">
                            </div>
                        </div>
                        <!-------------->

                            <!-------------->
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                                </div>
                            </div>
                            <!-------------->

                        <!-------------->
                            <div class="row">
                                <div class="col-md-12">
                            <div class="col-md-10">
                        <div class="form-group">
                            <label style="margin-left: 40px;" for="image" class="col-sm-3 control-label">Image</label>

                                <input style="display:none; " type="file" class="" id="image" data-id="image" onChange="previewImage(this)" name="image" value="{{ old('image') }}" required >
                                <input  type="button" data-id="image" class="btn btn-info fileClick" value="Select Image"/> <br>
                                <a href=""class="image">
                                    <img style="height: 80px; margin-left: 230px; " src=""  id="preview_image" alt=""/>
                                </a>

                        </div>
                            </div>
                        <!-------------->
                            <div class="col-md-2">
                                <button  type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                            </div>
                            </div>
                            <hr>
                    </form>

                    <!------------------------------------------------>



                    <div class="row">
                        <div class="col-sm-6"><h3>About Yourself</h3></div>
                            <div class="col-md-6 ">
                                <div class="radio radio-custom radio-inline radio-primary pull-right">
                                    <input type="radio" id="create" name="create" value="1">
                                    <label for="create">Create New Profile</label>
                                </div>
                                <br>
                                <div class="radio radio-custom radio-inline radio-danger pull-right" style="margin-right: 7px;">
                                    <input type="radio" id="exit" name="create" value="0">
                                    <label for="exit">Exit From Create</label>
                                </div>
                            </div>
                    </div>
                    <hr style="margin-top: 0;"/>
                    <div class="row">
                    @foreach($profiles as $row)

                   <div >
                      <b class="col-sm-4 " style="color: deeppink;">NAME :</b> <h5 class="col-sm-8">{{ $row->name }}.
                           <!---------------------------------------->

                           <button type="button" class="" data-toggle="modal" data-target="#primary-modal"><i class="fa fa-pencil-square"></i></button>
                           <!-- Modal -->
                           <form method="POST" action="{{route('profiles.update',$row->id)}}" enctype="multipart/form-data">
                               @csrf


                           <div class="modal fade" id="primary-modal" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header state modal-primary">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i>Edit Name</h4>
                                       </div>
                                       <div class="modal-body">
                                           <label for="name">Name</label>
                                           <input style="width: 400px;" type="text" id="name" name="name" value="{{$row->name}}">
<div class="clearfix"></div>
                                           <label for="address">address</label>
                                           <input style="width: 400px;" type="text" id="address" name="address" value="{{$row->address}}">
                                           <div class="clearfix"></div>
                                           <label for="phone">phone</label>
                                           <input style="width: 400px;" type="text" id="phone" name="phone" value="{{$row->phone}}">

                                           <div class="clearfix"></div>
                                           <label for="website_address">website_address</label>
                                           <input style="width: 400px;" type="text" id="website_address" name="website_address" value="{{$row->website_address}}">
                                           <div class="clearfix"></div>

                                           <label for="email">email</label>
                                           <input style="width: 400px;" type="text" id="email" name="email" value="{{$row->email}}">

                                           <div class="clearfix"></div>
                                           <label for="image">Image</label>
                                           <input style="width: 400px;" type="text" id="image" name="image" value="{{$row->image}}">
                                       </div>
                                       <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary" >Save</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           </form>
                           <!---------------------------------------->
                       </h5>
                   </div>
                    <div>
                        <b class="col-sm-4" style="color: deeppink;" >ADDRESS :</b> <h5 class="col-sm-8">{{ $row->address }}</h5>
                    </div>
                    <div>
                        <b class="col-sm-4" style="color: deeppink;" >PHONE :</b> <h5 class="col-sm-8">{{ $row->phone }}</h5>
                    </div>
                    <div>
                        <b class="col-sm-4" style="color: deeppink;" >WEBSITE ADDRESS :</b> <h5 class="col-sm-8">{{ $row->website_address }}</h5>
                    </div>
                    <div>
                        <b class="col-sm-4" style="color: deeppink;" >EMAIL :</b> <h5 class="col-sm-8">{{ $row->email }}</h5>
                    </div>
                    <div>
                        <b class="col-sm-4" style="color: deeppink;" >IMAGE :</b> <h5 class="col-sm-8"><img style="width: 170px; height: 170px; border: 1px solid #333333;" src="{{asset('uploads/profile/'.$row->image)}}" alt=""></h5>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection


