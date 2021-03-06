@extends('layouts.adminlayout')

@section('content')


<div class="container-fluid bdy">
    <div class="row">
      <div class="col-sm-3 py-5">
        @include('layouts.sidebar')
    </div>
    <div class="col-sm-9">
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header">Edit License Type
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <form id="mandalfrm" name="mandalfrm" enctype="multipart/form-data" action="{{url('/')}}/admin/licensetype/{{$licensetype->id}}" method="post" >

                        @csrf

                        @method("put")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License Type<span class="text-danger">*</span></label>
                                    <input type="text" name="name" disabled="" class="form-control pri-form" autocomplete="off" required value="{{$licensetype->name}}" />
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Registration Fees<span class="text-danger">*</span></label>
                                    <input type="number" name="reg_fee" class="form-control pri-form" autocomplete="off" required value="{{$licensetype->reg_fee}}" />
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License Fees<span class="text-danger">*</span></label>
                                    <input type="number" name="license_fee" class="form-control pri-form" autocomplete="off" required value="{{$licensetype->license_fee}}"/>
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Renewal Penalty Fees<span class="text-danger">*</span></label>
                                    <input type="number" name="penalty" class="form-control pri-form" autocomplete="off" required value="{{$licensetype->penalty}}"/>
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License Validity <small> (Years) </small><span class="text-danger">*</span></label>
                                    <input type="number" name="validity" class="form-control pri-form" autocomplete="off" required value="{{$licensetype->validity}}"/>
                                </div>
                            </div>                  
                            <div class="col-md-6 ">
                               
                               
                                    <label>&nbsp;</label>
                                    <div><button class="btn" type="submit">Save</button></div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </card>
        </div>
      </div>
    </div>
</div>
@stop