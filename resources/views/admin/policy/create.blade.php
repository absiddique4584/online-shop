@extends('admin.components.layout')

@section('title')
    Add New Policy | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Policy</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-12">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Policy</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('policies.manage') }}" class="btn btn-primary pull-right">Manage Policy</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('policies.store') }}" >
                    @csrf

                    <!----------START-------------->
                        <div class="form-group">
                            <label for="privacy_policy" class="col-sm-3 control-label">Privacy Policy</label>
                            <div class="col-sm-9">
                                <textarea name="privacy_policy" class="form-control summernote " id="privacy_policy" cols="30" rows="10" value="{{ old('privacy_policy') }}"  required></textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="collect_info" class="col-sm-3 control-label">Collect Info</label>
                            <div class="col-sm-9">
                                <textarea name="collect_info" class="form-control summernote "  id="collect_info" cols="30" rows="8" value="{{ old('collect_info') }}" ></textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="utilize_info" class="col-sm-3 control-label">Utilize Info</label>
                            <div class="col-sm-9">
                                <textarea name="utilize_info" class="form-control summernote "  id="utilize_info" cols="30" rows="8" value="{{ old('utilize_info') }}" ></textarea>
                            </div>
                        </div>
                        <!----------END-------------->


                        <div class="row form-group ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9  ">
                                <button type="submit" class="btn btn-primary pull-right ">Add Policy</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection


