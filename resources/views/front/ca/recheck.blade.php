@extends('front.trader.layouts.app')

@section('content')

<?php
$log = array();

if(isset($traderold->logs))
{
$traderold = $traderold->logs;

$log = json_decode($traderold, true);
}

function getfield($name, $array)
{
if(isset($array[$name])){
    return '<p class="complain " >'.$array[$name].'</p>';
}
else {
    return '<p  class="pdivrm"></p>';
}

}
?>

<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
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
				<form name="" class="clearfix" id="ca-register-form" enctype="multipart/form-data" method="post" action="{{url('trader/reset-trader-details')}}" novalidate="novalidate">
                    @csrf
                    <div class="form-section">
                        <h6>CA Details</h6>
                        <div class="row">
                            
                           <input type="hidden" value="{{$id}}" name="id">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name<span class="text-danger">*</span></label>
                                    <input type="text" name="fathersname" class="form-control pri-form f1" />
                                  
                                </div>
                                <?php echo getfield('fathersname', $log); ?>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control pri-form f1"></textarea>
                                 
                                </div>
                                <?php echo getfield('address', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="text" name="dob" class="form-control pri-form f1" autocomplete="off" />
                                   
                                </div>
                                <?php echo getfield('dob', $log); ?>
                            </div>
                          
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state_id" id="state-dd" class="form-control pri-form f1">
										<option value="" >-- Select --</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                                <?php echo getfield('state_id', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="district_id" id="district-dd" class="form-control pri-form f1">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                                <?php echo getfield('district_id', $log); ?>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhaar No.<span class="text-danger">*</span></label>
                                    <input type="text" name="aadhar_no" class="form-control aadharNoCls pri-form f1 aadhar_no" value="" maxlength="12" />
                                </div>
                                <?php echo getfield('aadhar_no', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Aadhaar<span class="text-danger">*</span></label>
                                    <input type="file" name="aadhar_file" class="form-control pri-form f1"  />
                                </div>
                                <?php echo getfield('aadhar_file', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
                                    <input maxlength="10" type="text" name="pan_no" class="form-control pri-form f1 pan" />
                                </div>
                                <?php echo getfield('pan_no', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="pan_file" class="form-control pri-form f1"  />
                                </div>
                                <?php echo getfield('pan_file', $log); ?>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>AMC Name<span class="text-danger">*</span></label>
                                <select name="amc_id" class="form-control pri-form">
                                    <option>-- Select --</option>
                                    @foreach($amc as $row)
                                    <option value="{{$row->id}}" >{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php echo getfield('amc_id', $log); ?>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>GSTIN<span class="text-danger">*</span></label>
                                <input type="text" name="gstin" class="form-control pri-form" maxlength="15"  />
                            </div>
                            <?php echo getfield('gstin', $log); ?>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Market Name<span class="text-danger">*</span></label>
                                <input type="text" name="marketname" class="form-control pri-form" maxlength="15"  />
                            </div>
                            <?php echo getfield('marketname', $log); ?>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Power of Attorney<span class="text-danger">*</span></label>
                                <input type="text" name="power_attorney" class="form-control pri-form" maxlength="15"  />
                            </div>
                            <?php echo getfield('power_attorney', $log); ?>
                        </div>



                    </div>
                   

                        <div class="mt-2 text-center">
                            <p class="complain errorstatus" style="display:none"></p>

                            <button class="btn btn-cancel" type="button" onclick="window.history.back()">Back to Status</button>
                            <button class="btn" type="submit">Submit</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"> </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"> </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"> </script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
$( document ).ready(function() {
    $('.pdivrm').each(function(i, obj) {
	    $(this).parent("div").remove();
	});
	
	$('input[name="dob"]').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		startDate: new Date(moment().subtract(20, 'years')),
		maxDate: new Date(moment().subtract(20, 'years')),
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
	
	var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	$.validator.addMethod("pan_no", function(value, element) {
		return this.optional( element ) || regpan.test( $('input[name="pan_no"]').val() );
	}, "Please enter valid 10 digit PAN number");
});


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
				url: "{{url('ca/reset-ca-details')}}",
				data: formdata, // serializes the form's elements.
				cache: false,
				contentType: false,
				processData: false,
				success: function(data) {
					if (data.success == true) {
						window.location.href = "{{url('/')}}/ca/approval-status/{{$id}}";
					} else {
						$(".errorstatus").show();
						$(".errorstatus").html(data.message);
					}
				}
			});			
		}

	});

/*
$("#trader-register-form").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.



				var formdata = new FormData(this);
				$.ajax({
					type: "POST",
					url: "{{url('ca/reset-ca-details')}}",
					data: formdata, // serializes the form's elements.
					cache: false,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.success == true) {
							window.location.href = "{{url('/')}}/ca/approval-status/{{$id}}";
						} else {
							$(".errorstatus").show();
							$(".errorstatus").html(data.message);
						}
					}
				});

});*/
</script>
@endsection