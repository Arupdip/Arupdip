@extends('layouts.frontlayout')

@section('content')
<style>
.error{
    color: red;
}
</style>
<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
            <h4 class="m-0 px-4 pt-3">New Trader Registration
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
                    <li class="active current priya-truck" onclick="gotoForm(this)">Trader Details</li>
                    <li class="priya-industry" onclick="gotoForm(this)">Firm Details</li>
                    <!-- <li class="priya-user" onclick="gotoForm(this)">User Details</li> -->
                    <li class="priya-inr" onclick="gotoForm(this)">Process Payment</li>
                </ul>
                <form name="" class="clearfix" id="trader-register-form" enctype="multipart/form-data" method="post" action="{{url('save-trader-details')}}" novalidate="novalidate">
                    @csrf
                    <div class="form-section">
                        <h6>Trader Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Type of Firm<span class="text-danger">*</span></label>
                                    <select name="typeoffirm"  class="form-control pri-form f1">
                                        <option value="" >-- Select --</option>
                                        <option>Sole Proprietorship</option>
                                        <option>Partnership</option>
                                        <option>Corporation</option>
                                        <option>Cooperative</option>
                                        <option>Limited Liability </option>
                                        <option>Company</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name_of_applicant" 
                                        class="form-control pri-form f1" aria-required="true" />
                                    <span class="text-danger" id="err_dup_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name<span class="text-danger">*</span></label>
                                    <input type="text" name="fathersname" class="form-control pri-form f1" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="gender" required="" class="form-control" value="M" onchange="priGroup(this)"><i></i> Male
                                        </label>
                                        <label class="pri-radio ml-4">
											<input type="radio" name="gender" required="" class="form-control" value="F" onchange="priGroup(this)">
											<i></i> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control pri-form f1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="text" name="dob" readonly="" class="form-control pri-form f1" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PIN Code<span class="text-danger">*</span></label>
                                    <input type="tel"  maxlength="6" name="pincode" class="form-control pri-form f1" />
                                </div>
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="district_id" id="district-dd" class="form-control pri-form f1">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mandal<span class="text-danger">*</span></label>
                                    <select name="mandal_id" class="form-control pri-form f1">
										<option value="" >-- Select --</option>
                                        @foreach($mandal as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhaar No.<span class="text-danger">*</span></label>
                                    <input type="text" name="aadhar_no" class="form-control aadharNoCls pri-form f1 aadhar_no" value="" maxlength="12" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Aadhaar<span class="text-danger">*</span></label>
                                    <input type="file" name="aadhar_file" class="form-control pri-form f1"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
                                    <input maxlength="10" type="text" name="pan_no" class="form-control pri-form f1 pan" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="pan_file" class="form-control pri-form f1"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number<span class="text-danger">*</span></label>
									<input type="tel"  maxlength="10" name="mobile" id="mobile" class="form-control pri-form f1" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternate Mobile Number<span class="text-danger">*</span></label>
									<input type="tel" maxlength="10" name="alternate_mobile" id="alternate_mobile" class="form-control pri-form f1" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" autocomplete="off" name="email" class="form-control pri-form f1"  />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn" type="button" onclick="nextForm2(this)">Next <i class="priya-angle-right"></i></button>
                        </div>
                    </div>
                    <div class="form-section" style="display: none;">
                        <h6>Firm Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Name<span class="text-danger">*</span></label>
                                    <input type="text" name="firmname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="firmaddress" class="form-control pri-form"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PIN Code<span class="text-danger">*</span></label>
                                    <input type="tel" name="firmpincode" maxlength="6" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="firm_state_id" id="firmstate_id" class="form-control pri-form">
										<option  selected="" disabled="">--Select state--</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="firmdistrict_id" id="firmdistrict_id" required="" class="form-control pri-form">
                                        <option selected="" disabled="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
									<select name="amc_id" id="amc_list" required="" class="form-control pri-form">
										<option selected="" disabled="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Registration No<span class="text-danger">*</span></label>
                                    <input type="text" name="firmregisteration_no" class="form-control aadharNoCls pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GSTIN<span class="text-danger">*</span></label>
									<input type="text" name="gstin" class="form-control pri-form" maxlength="15"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Pan No<span class="text-danger ">*</span></label>
                                    <input type="text" name="firmpanno" class="form-control pri-form " maxlength="10" />
                                    <label id="firmpanerror" style="display: none"  class="error" >Please enter valid Firm Pan Number</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Firm PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="firmpan_file" class="form-control pri-form"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload GSTIN<span class="text-danger">*</span></label>
                                    <input type="file" name="gstin_file" class="form-control pri-form"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Declaration of Solvency<span class="text-danger">*</span></label>
                                    <input type="file" name="declarationofsolvency" class="form-control pri-form"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Guarantee Copy<span class="text-danger">*</span></label>
                                    <input type="file" name="uploadedbankguaranteetype" class="form-control pri-form"  />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Name<span class="text-danger">*</span></label>
                                    <select name="bankname" required="" class="form-control pri-form">
										<option selected="" disabled="">-- Select --</option>
                                        <option value="sbi">State bank of india</option>
                                        <option value="pnb">Punjab Natioanl Bank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Holder Name as per Bank A/c No<span class="text-danger">*</span></label>
                                    <input type="text" name="account_holder" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Account No<span class="text-danger">*</span></label>
									<input type="password" autocomplete="off" name="account_no" id="account_no" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Account No<span class="text-danger">*</span></label>
									<input type="tel" name="c_account_no" id="c_account_no" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IFSC Code<span class="text-danger">*</span></label>
									<input type="text" name="ifsc" id="ifsc" class="form-control pri-form" maxlength="11" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm IFSC Code<span class="text-danger">*</span></label>
									<input type="text" name="c_ifsc" id="c_ifsc" class="form-control pri-form" id="c_ifsc" maxlength="11" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Copy of Bank Passbook<span class="text-danger">*</span></label>
                                    <input type="file" name="account_file" class="form-control pri-form" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="mt-2 text-center">
                            <p class="complain errorstatus" style="display:none"></p>

                            <button class="btn" type="button" onclick="prevForm(this)"><i class="priya-angle-left"></i> Prev</button>
                            {{-- <button class="btn" type="button" onclick="nextForm(this)">Next <i class="priya-angle-right"></i></button> --}}
                            <button class="btn" type="submit">Submit <i class="priya-angle-right"></i></button>
                        </div>
                    </div>
                    <!-- <div class="form-section" style="display: none;">
                        <h6>User Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User ID<span class="text-danger">*</span></label>
                                    <input type="text" name="" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" name="" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" name="" class="form-control pri-form" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn" type="button" onclick="nextForm(this)"><i class="priya-angle-left"></i> Prev</button>
                            <button class="btn" type="button" onclick="nextForm(this)">Next <i class="priya-angle-right"></i></button>
                        </div>
                    </div> -->
                    <div class="form-section" style="display: none;">
                        <h6>Terms &amp; Conditions</h6>
                        <div class="row">
                            <div class="col-md-12">
								<p> 1. 	I/We agree to abide by the Andhra Pradesh (Agricultural Produce & Live Stock) Markets Act 1966 And Rules 1969 and by laws made there under and amendments made to it from time and the directions or orders issued by the Director of Marketing from time to time.</p>
								<p> 2. 	I/We agree to keep all the necessary records and information about the functioning  of our business and to cooperate to produce whatever information or documents will be asked for inspection by appropriate authority.</p>
								<p> 3.	I/We agree to pay whatever charges of fees  or amounts liable and due from me legally.</p>
								<p> 4.	I/We agree to avoid business with the persons doing illegal business and will co-operate in taking legal actions against such persons.</p>
								<p> 5.	I/We have not been guilty of any offence or misconduct in any of the market comiittees in any state.</p>
								<p> 6.	I/We are not partners to whom the license has been refused.</p>
								<p> 7.	I/We have not applied for this license just to avail the advantages accuring there form.</p>
								<p> 8.	I/We have not caused any distrubances hither to for the smooth and healthy  functioning of any market Committee or entered into any disreputable and fradulent translation with any Person in the state.</p>
								
                            </div>
                            <div class="col-md-12">
                                <label class="pri-check">
                                    <input type="checkbox" class="" value="1" onchange="if($(this).is(':checked')){$('#payfeebtn').show()}else{$('#payfeebtn').hide()}"><i></i>
                                    I agree with the Terms &amp; Conditions mentioned above
                                </label>
                            </div>
                        </div>
                        {{-- <div class="payment-options collapse">
                            <a href="approval-status.php" class="payment-option" target="_blank"><img src="../images/sbi-logo.png" alt=""></a>
                            <a href="approval-status.php" class="payment-option" target="_blank"><img src="../images/PayU.jpg" alt=""></a>
                        </div> --}}
                        <button type="submit">submit</button>
                        <div class="mt-2 text-center">
                            <!-- <button class="btn" type="button" onclick="prevForm(this)"><i class="priya-angle-left"></i> Prev</button> -->
                            <button id="payfeebtn" class="btn collapse" type="button" onclick="$('.payment-options').slideDown(300)">Pay Fees</button>
                            <!-- <button class="btn" type="button" onclick="nextForm(this, 2)">Next <i class="priya-angle-right"></i></button> -->
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- To auto select state and sistrict --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"> </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"> </script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>

	$(document).ready(function () {
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
		
		$('#district-dd').on('change',function() {
			var districtId = $(this).val();
			$("#amc_list").html('');
			$.ajax({
				url: "{{url('fetch-amc-by-district')}}",
				type: "POST",
				data: {
					district_id: districtId,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#amc_list').html('<option value="">Select AMC</option>');
					$.each(res.amc, function (key, value) {
						$("#amc_list").append('<option value="' + value.id + '">' + value.name + '</option>');
					});
				}
			});
		})

		$('#firmstate_id').on('change', function () {
			var idState = this.value;
			$("firmdistrict_id").html('');
			$.ajax({
				url: "{{url('fetch-districts')}}",
				type: "POST",
				data: {
					state_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#firmdistrict_id').html('<option value="">Select City</option>');
					$.each(res.districts, function (key, value) {
						$("#firmdistrict_id").append('<option value="' + value
						.id + '">' + value.name + '</option>');
					});
				}
			});
		});



        $('#firmdistrict_id').on('change',function(){
			var districtId = $(this).val();
			$("#amc_list").html('');
			$.ajax({
				url: "{{url('fetch-amc-by-district')}}",
				type: "POST",
				data: {
					district_id: districtId,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#amc_list').html('<option value="">Select AMC</option>');
					$.each(res.amc, function (key, value) {
						$("#amc_list").append('<option value="' + value.id + '">' + value.name + '</option>');
					});
				}
			});
		})

		var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
		$.validator.addMethod("pan_no_valid", function(value, element) {
			return this.optional( element ) || regpan.test( $('input[name="pan_no"]').val() );
		}, "Please enter valid 10 digit PAN number");
		
		$.validator.addMethod("firm_pan_no_valid", function(value, element) {
			return this.optional( element ) || regpan.test( $('input[name="pan_no"]').val() );
		}, "Please enter valid 10 digit PAN number");

		var ifsc_type = /^([A-Za-z0]{4})(0\d{6})$/;
		$.validator.addMethod("ifsc_valid", function(value, element) {
			return this.optional( element ) || ifsc_type.test( $('input[name="ifsc"]').val() );
		}, "Please enter valid 11 digit bank IFSC code");
		
		$.validator.addMethod("alt_mobile", function(value, element) {
			var mobile_val = $('input[name="mobile"]').val()
			if (value != mobile_val) {
				return true;
			}
            //alert(value)
		}, "Mobile number and alternate mobile number must be unique");


		$("#trader-register-form").validate({
			rules: {
				typeoffirm: "required",
				name: "required",
				fathersname: "required",
				gender:  {
					required: true
				},
				address: "required",
				dob: "required",
				pincode: "required",
				state_id: "required",
				district_id: "required",
				mandal_id: "required",
				aadhar_no:{
					required : true,
					number: true,
					maxlength: 12,
					minlength : 12,
				},

				aadhar_file: {
					required : true,
				},
				pan_no:{
					required : true,
					pan_no_valid: true
				},
				pan_file: "required",
				mobile:{
					required:true,
					minlength:10,
					maxlength:10,
					number: true
				},
				alternate_mobile:{
					required:true,
					minlength:10,
					maxlength:10,
					number: true,
					alt_mobile: true
				},
				email:  {
					required : true,
					email : true
				},
				firmname: "required",
				firmaddress: "required",
				firmpincode: "required",
				firm_state_id: "required",
				firmdistrict_id: "required",
				amc_id: "required",
				firmregisteration_no:"required",
				gstin: {
					required : true,
					maxlength: 15,
					minlength : 15,
				},
				firmpanno: {
					required : true,
					firm_pan_no_valid: true
				},
				firmpan_file: "required",
				gstin_file: "required",
				declarationofsolvency: "required",
				uploadedbankguaranteetype: "required",
				bankname: "required",
				account_holder: "required",
				account_no: "required",
				c_account_no: {
					required : true,
					equalTo : "#account_no"
				},
				ifsc: {
					required : true,
					ifsc_valid: true,
					maxlength: 11,
					minlength : 11,
				},
				c_ifsc:{
					required : true,
					equalTo : "#ifsc"
				},
				account_file: "required",
			},

			messages : {
				typeoffirm : "Please select type of firm",
				name : "Please enter your full name",
				fathersname : "Father's name is required",
				gender : "Please choose gender",
				address : "Please enter your Address",
				dob : "Please select date of birth",
				pincode : "Please enter your Pincode",
				state_id : "Please select your Sate",
				district_id : "Please select your District",
				mandal_id : "Please select your Mandal",
				aadhar_file : "Please upload aadhar card",
				pan_no :{
					required : "Please enter your PAN number",
				},
				pan_file : "Please upload your Pan card",
				aadhar_no :{
					required : "Please enter your aadhaar number",
					maxlength: "Please enter valid aadhaar number",
					minlength : "Please enter valid aadhaar number",
				} ,
				email :{
					required : "Please enter your email",
					email : "Please provide valid email address"
				},
				mobile :{
					required : "Please enter Mobile number",
					number : "Please provide number only"
				},
				firmname : "Please provide firm name",
				firmaddress : "Please provide firm Address",
				firmpincode : "Please provide firm pin code",
				firm_state_id : "Please selec firm state",
				firmdistrict_id : "Please select firm district",
				amc_id : "Please provide AMC name",
				gstin :{
					required : "Please enter your GST number",
					maxlength: "Please enter valid GST number",
					minlength : "Please enter valid GST number",
				} ,
				firmpanno : "Please provide firm PAN no",
				firmpan_file : "Please upload firm pan file",
				gstin_file : "Please upload gst file",
				declarationofsolvency : "Please provide declaration solvency",
				uploadedbankguaranteetype : "Please upload bank guarantee",
				bankname : "Please provide bank name",
				uploadedbankguaranteetype : "Please upload bank guarantee",
				account_holder : "Please provide account holder name",
				account_no : "Please provide account number",
				c_account_no : {
					required : "Please provide confirm account number",
					equalTo: "Account number and confirm account number is not match",
				},
				ifsc : "Please provide IFSC number",
				c_ifsc : {
					required : "Please provide confirm IFSC number",
					equalTo: "IFSC code and confirm IFSC code is not match",
				},
				account_file : "Please provide account number",

			},
			submitHandler: function(form) {

				$(".errorstatus").hide();
				$(".errorstatus").html("");


				var formdata = new FormData(form);

				$.ajax({
					type: "POST",
					url: "{{url('save-trader-details')}}",
					data: formdata, // serializes the form's elements.
					cache: false,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.success == true) {
							window.location.href = "{{url('/')}}/trader-payment/"+data.message;
						} else {
							$(".errorstatus").show();
							$(".errorstatus").html(data.message);
						}
					}
				});
			}


		});

	});



	function nextForm2(d)
	{
		var t1= true;
		$(".f1").each(function() {
			if ($(this).val()=='')
				t1 = false;
		});

		if (t1 == true) {
			var cur = $(d).parents('.form-section');
			let	nextStep = $(d).parents('.form-section').next();
			$("#progressbar li").eq($(".form-section").index(nextStep)).addClass("active current").siblings().removeClass("current");
			nextStep.show();
			cur.hide();
		} else {
			$("#trader-register-form").valid()
		}
	}
</script>
@stop