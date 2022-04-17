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
                <h5 class="card-header">Add District
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <form id="mandalfrm" name="mandalfrm" enctype="multipart/form-data" action="{{url('/')}}/admin/district" method="post" >

                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control pri-form" autocomplete="off" required />
                                </div>
                            </div>                  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District Code<span class="text-danger">*</span></label>
                                    <input type="text" name="code" class="form-control pri-form" autocomplete="off" required/>
                                </div>
                            </div>                  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select class="form-control pri-form" name="state_id" required>
                                        <option value="">Select</option>
                                        @foreach($state as $s)
                                            <option value="{{$s->state_id}}">{{$s->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                  
                            <div class="col-md-12">
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