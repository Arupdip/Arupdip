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
                <form name="" class="clearfix" id="trader-register-form" enctype="multipart/form-data" method="post" action="{{url('trader/reset-trader-details')}}" novalidate="novalidate">
                    @csrf
                    <div class="form-section">
                        <h6>Trader Details</h6>
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
                                    <label>PIN Code<span class="text-danger">*</span></label>
                                    <input type="tel"  maxlength="6" name="pincode" class="form-control pri-form f1" />
                                   
                                 </div>
                                 <?php echo getfield('pincode', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state_id" id="state-dd" class="form-control pri-form f1">
										<option  selected="" disabled="">-- Select --</option>
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
										<option selected="" disabled="">-- Select --</option>
                                    </select>
                                </div>
                                <?php echo getfield('district_id', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mandal<span class="text-danger">*</span></label>
                                    <select name="mandal_id" class="form-control pri-form f1">
										<option selected="" disabled="" >-- Select --</option>
                                        @foreach($mandal as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <?php echo getfield('mandal_id', $log); ?>
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
                        
                    </div>
                    <div class="form-section" >
                        <h6>Firm Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Name<span class="text-danger">*</span></label>
                                    <input type="text" name="firmname" class="form-control pri-form" />
                                </div>
                                <?php echo getfield('firmname', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="firmaddress" class="form-control pri-form"></textarea>
                                </div>
                                <?php echo getfield('firmaddress', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PIN Code<span class="text-danger">*</span></label>
                                    <input type="tel"  max="6" name="firmpincode" class="form-control pri-form" />
                                </div>
                                <?php echo getfield('firmpincode', $log); ?>
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
                                <?php echo getfield('firm_state_id', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="firmdistrict_id" id="firmdistrict_id" class="form-control pri-form">
										<option selected="" disabled="">-- Select --</option>
                                    </select>
                                </div>
                                <?php echo getfield('firmdistrict_id', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <select name="amc_id" class="form-control pri-form">
										<option selected="" disabled="">-- Select --</option>
                                        @foreach($amc as $row)
                                        <option value="{{$row->id}}" >{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <?php echo getfield('amc_id', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Registration No<span class="text-danger">*</span></label>
                                    <input type="text" name="firmregisteration_no" class="form-control aadharNoCls pri-form" />
                                </div>
                                <?php echo getfield('firmregisteration_no', $log); ?>
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
                                    <label>Firm Pan No<span class="text-danger ">*</span></label>
                                    <input type="text" name="firmpanno" class="form-control pri-form " maxlength="10" />
                                    <label id="firmpanerror" style="display: none"  class="error" >Please enter valid Firm Pan Number</label>
                                </div>
                                <?php echo getfield('firmpanno', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Firm PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="firmpan_file" class="form-control pri-form"  />
                                </div>
                                <?php echo getfield('firmpan_file', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload GSTIN<span class="text-danger">*</span></label>
                                    <input type="file" name="gstin_file" class="form-control pri-form"  />
                                </div>
                                <?php echo getfield('gstin_file', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Declaration of Solvency<span class="text-danger">*</span></label>
                                    <input type="file" name="declarationofsolvency" class="form-control pri-form"  />
                                </div>
                                <?php echo getfield('declarationofsolvency', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Guarantee Copy<span class="text-danger">*</span></label>
                                    <input type="file" name="uploadedbankguaranteetype" class="form-control pri-form"  />
                                </div>
                                <?php echo getfield('uploadedbankguaranteetype', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Name<span class="text-danger">*</span></label>
                                    <select name="bankname" class="form-control pri-form">
										<option selected="" disabled="">-- Select --</option>
                                        <option value="sbi">State bank of india</option>
                                        <option value="pnb">Punjab Natioanl Bank</option>
                                    </select>
                                </div>
                                <?php echo getfield('bankname', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Holder Name as per Bank A/c No<span class="text-danger">*</span></label>
                                    <input type="text" name="account_holder" class="form-control pri-form" maxlength="10" />
                                </div>
                                <?php echo getfield('account_holder', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Account No<span class="text-danger">*</span></label>
                                    <input type="tel" name="account_no" class="form-control pri-form" maxlength="10" />
                                </div>
                                <?php echo getfield('account_no', $log); ?>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IFSC Code<span class="text-danger">*</span></label>
                                    <input type="text" name="ifsc" class="form-control pri-form" maxlength="11" />
                                </div>
                                <?php echo getfield('ifsc', $log); ?>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Copy of Bank Passbook<span class="text-danger">*</span></label>
                                    <input type="file" name="account_file" class="form-control pri-form" />
                                </div>
                                <?php echo getfield('account_file', $log); ?>
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
});


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
				url: "{{url('trader/reset-trader-details')}}",
				data: formdata, // serializes the form's elements.
				cache: false,
				contentType: false,
				processData: false,
				success: function(data) {
					if (data.success == true) {
						window.location.href = "{{url('/')}}/trader/approval-status/{{$id}}";
					} else {
						$(".errorstatus").show();
						$(".errorstatus").html(data.message);
					}
				}
			});

		}


	});

















/*$("#trader-register-form").submit(function(e) {
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

e.preventDefault(); // avoid to execute the actual submit of the form.



	var formdata = new FormData(this);
	$.ajax({
		type: "POST",
		url: "{{url('trader/reset-trader-details')}}",
		data: formdata, // serializes the form's elements.
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			if (data.success == true) {
				window.location.href = "{{url('/')}}/trader/approval-status/{{$id}}";
			} else {
				$(".errorstatus").show();
				$(".errorstatus").html(data.message);
			}
		}
	});

});*/
</script>
@endsection