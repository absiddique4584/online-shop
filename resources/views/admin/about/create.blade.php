@extends('admin.components.layout')

@section('title')
    Add New About | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Add About</a></li>
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
                            <h3>Add New About</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('abouts.manage') }}" class="btn btn-primary pull-right">Manage About</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('abouts.store') }}" >
                        @csrf


                        <div class="form-group">
                            <label for="long_desc" class="col-sm-3 control-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="long_desc" id="long_desc" cols="30" rows="10" value="{{ old('title') }}" required placeholder="Long description"></textarea>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add About</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection

