@extends('layouts.adminlayout')

@section('content')

<style>
	ul, li {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.ms-options-wrap > .ms-options > ul label {
		position: relative;
		display: inline-block;
		width: 100%;
		padding: 8px 4px;
		margin: 1px 0;
	}
	.ms-options-wrap > .ms-options > ul input[type="checkbox"] {
		margin-right: 5px;
		position: absolute;
		left: 5px;
		top: 14px;
	}
	.ms-options-wrap button, .ms-options-wrap > button:focus, .ms-options-wrap > button{
		border: 1px solid transparent;
		border-radius: 0.25rem;
		background: #0002;
		color: #0008;
		font-size: 18px;
		font-family: arial;
		padding: 0 20px;
		box-shadow: none;
		transition: all 0.3s;
		display: block;
		width: 100%;
		height: calc(1.5em + 0.75rem + 2px);
	}
</style>

<div class="container-fluid bdy">
    <div class="row">
      <div class="col-sm-3 py-5">
        @include('layouts.sidebar')
    </div>
    <div class="col-sm-9">
        <div class="py-5 section">
            <card class="card">
				<h5 class="card-header">{{$user->name}}
					@isset($user->usertype->name){{$user->usertype->name}} @endisset
					Manage Rolls
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
					<form id="user_roll" enctype="multipart/form-data" action="{{url('/')}}/admin/rolls" method="post" >
						<input type="hidden" name="user_id" value="{{$user->id}}" />
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<label>Designation<span class="text-danger">*</span></label>
									<select name="user_type" class="form-control pri-form" autocomplete="off" required>
										<option selected="" disabled="">Designation</option>

										@foreach($usertype as $type)
										<option value="{{$type->type}}">{{$type->name}}</option>



										@endforeach
										{{-- @if(empty($user->user_type) || $user->user_type == 3)
											<option value="3">AMC Officer</option>
										@endif
										@if(empty($user->user_type) || $user->user_type == 3 || $user->user_type == 4)
											<option value="4">AD Officer</option>
										@endif
										@if(empty($user->user_type) || $user->user_type == 3 || $user->user_type == 4 || $user->user_type == 5)
											<option value="5">Commissioner</option>
										@endif									 --}}
									</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<label>AMC<span class="text-danger">*</span></label>
									<select name="amc[]" class="form-control pri-form" multiple id="amc" autocomplete="off" required>
										@foreach ($amc as $key=>$val)
										<option value="{{$val->id}}">{{$val->name}}</option>
										@endforeach
									</select>
                                </div>
                            </div>
                                           
                            <div class="col-md-12 text-center">
                              
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

<script>
	
	$('#amc').multiselect({
		columns: 1,
		placeholder: 'Select AMC',
		search: true,
		selectAll: true
	});
	
	
	$("#user_roll").validate({		
		submitHandler : function(form) {
			form.submit();
		}
	})
</script>
@stop