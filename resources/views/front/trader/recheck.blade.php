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
                                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6" name="pincode" class="form-control pri-form f1" />
                                   
                                 </div>
                                 <?php echo getfield('pincode', $log); ?>
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
                                    <label>Mandal<span class="text-danger">*</span></label>
                                    <select name="mandal_id" class="form-control pri-form f1">
										<option value="" >-- Select --</option>
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
                                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" max="6" name="firmpincode" class="form-control pri-form" />
                                </div>
                                <?php echo getfield('firmpincode', $log); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="firm_state_id" id="firmstate_id" class="form-control pri-form">
                                        <option  value="">--Select state--</option>
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
                                        <option>-- Select --</option>
                                    </select>
                                </div>
                                <?php echo getfield('firmdistrict_id', $log); ?>
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
                                        <option>-- Select --</option>
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
});


$("#trader-register-form").submit(function(e) {

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

});
</script>
@endsection