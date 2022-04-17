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
                <h5 class="card-header">Add Role Type
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
					<form id="mandalfrm" name="mandalfrm" enctype="multipart/form-data" action="{{url('/')}}/admin/usertype/{{$userType->id}}" method="post" onsubmit="return rythuBazaarValidateFunc();">
                     	@csrf
						@method("put")
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Role Type <span class="text-danger">*</span></label>
									<input type="number" name="type"  class="form-control pri-form" value="{{$userType->type}}" required="" autocomplete="off"/>
                                </div>
                            </div> 
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Role Type Name<span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control pri-form" value="{{$userType->name}}" required="" autocomplete="off"/>
                                </div>
                            </div> 
							
                            <div class="col-md-1">
                                <div class="text-center">
                                    <label>&nbsp;</label>
                                    <div><button class="btn" type="submit">Update</button></div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="text-left">
                                    <label>&nbsp;</label>
									<div>
										<a class="btn" href="javascript:void(0)" onclick="window.location.reload()">Reset</a>
									</div>
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