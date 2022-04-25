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
                <h5 class="card-header">Add New User
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
					<form id="user_form" name="user_form" enctype="multipart/form-data" action="{{url('/')}}/admin/user" method="post" >

                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control pri-form" autocomplete="off" required />
                                </div>
                            </div>                 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control pri-form" autocomplete="off" required />
                                </div>
                            </div>                  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone<span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control pri-form" autocomplete="off" required maxlength="10" />
                                </div>
                            </div>          
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employee Id<span class="text-danger">*</span></label>
									<input type="text" name="employee_id" class="form-control pri-form" autocomplete="off" required />
                                </div>
                            </div>   

							<div class="col-md-4">
								<div class="form-group">
									<label>Is Active<span class="text-danger">*</span></label>
									<select name="status" class="form-control pri-form">
										<option value="1">Yes</option>
										<option value="2">No</option>
									</select>
								</div>
							</div>           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control pri-form" autocomplete="off" required />
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
	
	$("#user_form").validate({
		rules: {
			email: {
				required: true,
				email: true,
				remote: "{{url('/email-validation')}}"
			},
			phone: {
				required: true,
				number: true,
				remote: "{{url('/phone-validation')}}"
			},
			employee_id: {
				required: true,
				remote: "{{url('/employee-id-validation')}}"
			}
		},
		messages:{
			email:{
				remote: "Email already exists, use another one."
			},
			phone:{
				remote: "Phome number already exists, use another one."
			},
			employee_id:{
				remote: "Employee id already exists, check this."
			}
		},
		submitHandler : function(form) {
			form.submit();
		}
	})
</script>
@stop