@extends('layouts.frontlayout')

@section('content')
<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
            <style>
                .error{
                    color:red;
                    }
            </style>
            <h4 class="m-0 px-4 pt-3">Online License Management System
                <div class="btn-grp">
                    <btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn>
                    <btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn>
                </div>
            </h4>
            <hr />
        </div>
        <div class="card-body pt-0">
            <div class="p-2">
                <ul id="progressbar">
                    <li class="active priya-cubes">Collect Trader Details</li>
                    <li class="priya-hourglass-2">Process Payment</li>
                    <li class="priya-file-text-o">Department Approval</li>
                    <li class="priya-bell-o">Notify Trader</li>
                    <li class="priya-check">Resolve</li>
                </ul>
                <form name="" id="ca-register-form" class="clearfix" enctype="multipart/form-data" method="post" action="{{url('save-ca-details')}}" >
                    @csrf
                    <div class="form-section">
                        <h6>CA Details</h6>
                       
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Does any of your family members hold Commission Agent License<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="isfamilymemberholdca" class="commodity_wether_cls" value="1"  onchange="priGroup(this)"><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
											<input type="radio" name="isfamilymemberholdca" class="commodity_wether_cls redioGroup" value="0"  onchange="priGroup(this)">
											<i></i> No
                                        </label>
                                    </div>
                                    <div class="pri-collapsed">
                                        <label>Attach File<span class="text-danger">*</span></label>
                                        <input type="file" name="familymemberholdcafile" class="form-control pri-form" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Do you have any other firm/Business or Are you a partner of any firm/business<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="isotherfirm" class="commodity_wether_cls" value="1" onchange="priGroup(this)"><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio"  name="isotherfirm" class="commodity_wether_cls" value="0" onchange="priGroup(this)"><i></i> No
                                        </label>
                                    </div>
                                    <div class="pri-collapsed">
                                        <label>Attach File<span class="text-danger">*</span></label>
                                        <input type="file" name="upladedotherfirmfile" class="form-control pri-form" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Do you have a trader license<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="traderlicense" class="" value="1" ><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio"  name="traderlicense" class="" checked value="0" ><i></i> No
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhar No.<span class="text-danger">*</span></label>
                                    <input type="text" id="aadhar_no" name="aadhar_no"
                                        class="form-control  pri-form aadhar_no" maxlength="16" value="" />
                                        <label id="aadharerror" style="display: none"  class="error" >Please enter valid Aadhar Number</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Aadhaar<span class="text-danger">*</span></label>
                                    <input type="file" id="aadhar_file" name="aadhar_file"
                                        class="form-control  pri-form aadhar_file"  />
                                       
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name<span class="text-danger">*</span></label>
                                    <input type="text" id="name"  name="name"
                                        class="form-control pri-form" aria-="true" />
                                    <span class="text-danger" id="err_dup_error"></span>
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name<span class="text-danger">*</span></label>
                                    <input type="text"  name="fathersname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="text"  name="dob" class="form-control pri-form" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Is Minor<span class="text-danger">*</span></label>
                                    <select name="is_minor" class="form-control pri-form">
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address"  class="form-control pri-form"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number<span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
									<input type="text"  name="pan_no" class="form-control pri-form pan_no" maxlength="10" />
                                    <label id="pannoerror" style="display: none"  class="error" >Please enter valid Pan Number</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email ID<span class="text-danger">*</span></label>
                                    <input type="text"  name="email" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Market Name <span class="text-danger">*</span></label>
                                    <input type="text"  name="marketname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state_id"  id="state-dd" class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                         @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="district_id"   id="district-dd" class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GSTIN<span class="text-danger">*</span></label>
									<input type="text" name="gstin"  class="form-control pri-form"  maxlength="15"/>
                                </div>
                            </div>
                            <!--<div class="col-md-4">
                                <div class="form-group">
                                    <label>License Type<span class="text-danger">*</span></label>
                                    <select name="liscencetype_id"  class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                         @foreach($liscencetype as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <select name="amc_id"  class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                          @foreach($amc as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name in Power Of Attorney<span class="text-danger">*</span></label>
                                    <input type="text"  name="power_attorney" class="form-control pri-form" />
                                </div>
                            </div>
                            

                        </div>
                        <div class="mt-2 text-center">
                            <p class="complain errorstatus" style="display:none"></p>
							<button class="btn submit_btn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- To auto select state and sistrict --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"> </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"> </script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
	$(document).ready(function () {
		$('#ca-register-form input[type=text]').attr("disabled",true);
		$('#ca-register-form textarea').attr('disabled', true);
		$('#ca-register-form select').attr('disabled', true);
		$('.submit_btn').attr('disabled', true);

		redioGroup();
		$('.commodity_wether_cls').click(function() {
			redioGroup();
		})

		function redioGroup()
		{
			if ($('input[name="isfamilymemberholdca"]:checked').val() == 1 && $('input[name="isotherfirm"]:checked').val() == 1) {
				$('#ca-register-form input[type=text]').attr("disabled",false);
				$('#ca-register-form textarea').attr('disabled', false);
				$('#ca-register-form select').attr('disabled', false);
				$('.submit_btn').attr('disabled', false);
			} else {
				$('#ca-register-form input[type=text]').attr("disabled",true);
				$('#ca-register-form textarea').attr('disabled', true);
				$('#ca-register-form select').attr('disabled', true);
				$('.submit_btn').attr('disabled', true);
				$('label.error').remove();
			}
		}


		$('input[name="dob"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1901,
			maxDate: new Date(),
			maxYear: parseInt(moment().format('YYYY'),10),
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			}
		});

		$('input[name="dob"]').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY'));
		});

		$('input[name="dob"]').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		$('#state-dd').on('change', function () {
			var idState = this.value;
			$("#district-dd").html('');
			$.ajax({
				url: "{{url('fetch-districts')}}",
				type: "POST",
				data: {
					state_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#district-dd').html('<option value="">Select City</option>');
					$.each(res.districts, function (key, value) {
						$("#district-dd").append('<option value="' + value
						.id + '">' + value.name + '</option>');
					});
				}
			});
		});


		var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
		$.validator.addMethod("pan_no", function(value, element) {
			return this.optional( element ) || regpan.test( $('input[name="pan_no"]').val() );
		}, "Please enter valid 10 digit PAN number");

		//for form validation

		$("#ca-register-form").validate({
			rules: {
				isfamilymemberholdca: "required",
				familymemberholdcafile: "required",
				isotherfirm: "required",
				upladedotherfirmfile: "required",

                aadhar_file: "required",

                pan_file: "required",
				aadhar_no:  {
					required : true,
					number: true,
					maxlength: 12,
					minlength : 12,
				},
				name: "required",
				age: {
					required : true,
					number: true
				},
				fathersname: "required",
				dob: "required",
				is_minor: "required",
				address: "required",
				mobile: "required",
				pan_no:{
					required : true,
				},
				email: {
					required : true,
					email : true
				},
				marketname: "required",
				state_id: "required",
				district_id: "required",
				gstin:  {
					required : true,
					maxlength: 15,
					minlength : 15,
				},
				liscencetype_id: "required",
				amc_id: "required",
				power_attorney: "required",

			},
			messages : {
				gstin :{
					required : "Please enter your GST number",
					maxlength: "Please enter valid GST number",
					minlength : "Please enter valid GST number",
				} ,
				aadhar_no :{
					required : "Please enter your aadhaar number",
					maxlength: "Please enter valid aadhaar number",
					minlength : "Please enter valid aadhaar number",
				} ,
				email :{
					required : "Please enter your email",
					email : "Please provide valid email address"
				},
				pan_no:{
					required : "Please enter your PAN number",
				}

			},
			submitHandler : function(form) {
				$(".errorstatus").hide();
				$(".errorstatus").html("");

				var formdata = new FormData(form);

				$.ajax({
					type: "POST",
					url: "{{url('save-ca-details')}}",
					data: formdata, // serializes the form's elements.
					cache: false,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.success == true) {
							window.location.href = "{{url('/')}}/ca-payment/"+data.message;
						} else {
							$(".errorstatus").show();
							$(".errorstatus").html(data.message);
						}
					}
				});
			}

		});



	});


</script>
@stop
