@extends('admin.components.layout')

@section('title')
    Update Condition | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Condition</a></li>
            </ul>
        </div>
    </div><br/><br/>

    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Update Condition</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('conditions.manage') }}" class="btn btn-primary pull-right">Manage Condition</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('conditions.update',$conditions->id) }}" >
                        @csrf



                        <!----------START-------------->
                        <div class="form-group">
                            <label for="introduction" class="col-sm-3 control-label">Introduction</label>
                            <div class="col-sm-9">
                                <textarea name="introduction" class="form-control summernote " id="introduction" cols="30" rows="10" value="{{$conditions->id}}" placeholder="Introduction" required>{{$conditions->introduction}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">Account</label>
                            <div class="col-sm-9">
                                <textarea name="account" class="form-control summernote "  id="account" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Account">{{$conditions->account}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->


                        <!----------START-------------->
                        <div class="form-group">
                            <label for="order" class="col-sm-3 control-label">Order</label>
                            <div class="col-sm-9">
                                <textarea name="order" class="form-control summernote " id="order" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Order">{{$conditions->order}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="conduct" class="col-sm-3 control-label">Conduct</label>
                            <div class="col-sm-9">
                                <textarea name="conduct" class="form-control summernote " id="conduct" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Conduct">{{$conditions->conduct}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="submission" class="col-sm-3 control-label">Submission</label>
                            <div class="col-sm-9">
                                <textarea name="submission" class="form-control summernote " id="submission" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Submission">{{$conditions->submission}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="information" class="col-sm-3 control-label">information</label>
                            <div class="col-sm-9">
                                <textarea name="information" class="form-control summernote " id="information" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Information">{{$conditions->information}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="indemnity" class="col-sm-3 control-label">Indemnity</label>
                            <div class="col-sm-9">
                                <textarea name="indemnity" class="form-control summernote " id="indemnity" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Indemnity">{{$conditions->indemnity}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="losses" class="col-sm-3 control-label">Losses</label>
                            <div class="col-sm-9">
                                <textarea name="losses" class="form-control summernote " id="losses" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Losses">{{$conditions->losses}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="promise" class="col-sm-3 control-label">Promise</label>
                            <div class="col-sm-9">
                                <textarea name="promise" class="form-control summernote " id="promise" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Promise">{{$conditions->promise}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="introduction" class="col-sm-3 control-label">Waiver</label>
                            <div class="col-sm-9">
                                <textarea name="waiver" class="form-control summernote " id="waiver" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Waiver">{{$conditions->waiver}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="law" class="col-sm-3 control-label">Law</label>
                            <div class="col-sm-9">
                                <textarea name="law" class="form-control summernote " id="law" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Law">{{$conditions->law}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="offer" class="col-sm-3 control-label">Offer</label>
                            <div class="col-sm-9">
                                <textarea name="offer" class="form-control summernote" id="offer" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Offer">{{$conditions->offer}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="process" class="col-sm-3 control-label">Process</label>
                            <div class="col-sm-9">
                                <textarea name="process" class="form-control summernote " id="process" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Process">{{$conditions->process}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="security" class="col-sm-3 control-label">Security</label>
                            <div class="col-sm-9">
                                <textarea name="security" class="form-control summernote " id="security" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Security">{{$conditions->security}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->

                        <!----------START-------------->
                        <div class="form-group">
                            <label for="warranty" class="col-sm-3 control-label">Warranty</label>
                            <div class="col-sm-9">
                                <textarea name="warranty" class="form-control summernote" id="warranty" cols="30" rows="8" value="{{$conditions->id}}" placeholder="Warranty" required>{{$conditions->warranty}}</textarea>
                            </div>
                        </div>
                        <!----------END-------------->



                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection

