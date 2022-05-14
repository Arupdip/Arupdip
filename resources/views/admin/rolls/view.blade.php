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
                <h5 class="card-header">{{$user->name}} Roll Details
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<ul class="ist-group list-group-flush">
								<li class="list-group-item">
									<p> <strong>Designation:</strong>  </p>
								</li>
							</ul>
						</div>
						<div class="col-md-6"></div>
					</div>
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
				remote: "{{url('/email-validation/'.$user->id)}}"
			},
			phone: {
				required: true,
				number: true,
				remote: "{{url('/phone-validation/'.$user->id)}}"
			},
			employee_id: {
				required: true,
				remote: "{{url('/employee-id-validation/'.$user->id)}}"
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