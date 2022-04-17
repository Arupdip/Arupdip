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
                <h5 class="card-header">Add AMC
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <form id="mandalfrm" name="mandalfrm" enctype="multipart/form-data" action="{{url('/')}}/admin/amc" method="post" >

                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" required class="form-control pri-form" autocomplete="off" />
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                   <select class="form-control pri-form" name="district_id" required>
                                        <option value="">Select</option>
                                         @foreach($district as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address" required class="form-control pri-form"></textarea>
                                </div>
                            </div>                  
                            <div class="col-12">
                                <div class="text-center">
                                    <label>&nbsp;</label>
                                    <div><button class="btn" type="submit">Save</button></div>
                                </div>
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