@extends('layouts.frontlayout')

@section('content')

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
                                    <select name="typeoffirm" required  class="form-control pri-form">
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
                                        class="form-control pri-form" aria-required="true" />
                                    <span class="text-danger" id="err_dup_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name<span class="text-danger">*</span></label>
                                    <input type="text" name="fathersname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="gender" class="" checked value="M" onchange="priGroup(this)"><i></i> Male
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio" name="gender" class="" value="F" onchange="priGroup(this)"><i></i> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control pri-form"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PIN Code<span class="text-danger">*</span></label>
                                    <input type="text" name="pincode" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state_id" id="state-dd" class="form-control pri-form">
                                        @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="district_id" id="district-dd" class="form-control pri-form">
                                        <option>-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mandal<span class="text-danger">*</span></label>
                                    <select name="mandal_id" class="form-control pri-form">
                                        @foreach($mandal as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhaar No.<span class="text-danger">*</span></label>
                                    <input type="text" name="aadhar_no"
                                        class="form-control aadharNoCls pri-form" value="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Aadhaar<span class="text-danger">*</span></label>
                                    <input type="file" name="aadhar_file" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
                                    <input type="text" name="pan_no" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="pan_file" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number<span class="text-danger">*</span></label>
                                    <input type="tel" name="mobile" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternate Mobile Number<span class="text-danger">*</span></label>
                                    <input type="tel" name="alternate_mobile" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn" type="button" onclick="nextForm(this)">Next <i class="priya-angle-right"></i></button>
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
                                    <input type="text" name="firmpincode" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="firm_state_id" id="firmstate_id" class="form-control pri-form">
                                        <option value="">--Select state--</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="firmdistrict_id" id="firmdistrict_id" class="form-control pri-form">
                                        <option>-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <select name="amc_id" class="form-control pri-form">
                                        @foreach($amc as $row)
                                        <option value="{{$row->id}}" >{{$row->name}}</option>
                                        @endforeach
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
                                    <input type="text" name="gstin" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firm Pan No<span class="text-danger">*</span></label>
                                    <input type="text" name="firmpanno" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Firm PAN<span class="text-danger">*</span></label>
                                    <input type="file" name="firmpan_file" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload GSTIN<span class="text-danger">*</span></label>
                                    <input type="file" name="gstin_file" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Declaration of Solvency<span class="text-danger">*</span></label>
                                    <input type="file" name="declarationofsolvency" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bank Guarantee Copy<span class="text-danger">*</span></label>
                                    <input type="file" name="uploadedbankguaranteetype" class="form-control pri-form" maxlength="10" />
                                </div>
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
                                    <input type="text" name="account_no" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Account No<span class="text-danger">*</span></label>
                                    <input type="text" name="c_account_no" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IFSC Code<span class="text-danger">*</span></label>
                                    <input type="text" name="ifsc" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm IFSC Code<span class="text-danger">*</span></label>
                                    <input type="text" name="c_ifsc" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload Copy of Bank Passbook<span class="text-danger">*</span></label>
                                    <input type="file" name="account_file" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="mt-2 text-center">
                            <p class="complain errorstatus" style="display:none"></p>

                            <button class="btn" type="button" onclick="prevForm(this)"><i class="priya-angle-left"></i> Prev</button>
                            {{-- <button class="btn" type="button" onclick="nextForm(this)">Next <i class="priya-angle-right"></i></button> --}}
                            <button class="btn" type="submit" >Submit <i class="priya-angle-right"></i></button>
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
                                <p>Suspendisse ac eleifend sem. Aliquam pretium ligula est, eget imperdiet justo
                                    suscipit a. Nulla aliquam orci at massa fringilla porttitor. Class aptent
                                    taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                    himenaeos. Maecenas sodales, nisl ut pharetra scelerisque, odio urna
                                    faucibus orci, in congue velit justo imperdiet libero. Nunc non mi nec enim
                                    pretium lobortis. Praesent faucibus cursus est eget viverra. Ut maximus
                                    consequat erat quis vulputate. In dictum finibus bibendum. Nulla nisi lorem,
                                    tincidunt et commodo id, auctor ut risus. Sed sed fringilla urna. Integer
                                    justo mauris, varius eget neque ut, accumsan tristique neque. Pellentesque
                                    ac porta lacus. Nam tincidunt vulputate lobortis. Vivamus at urna odio.
                                    Proin a consequat ipsum, nec vestibulum ipsum.</p>
                                <p>Donec finibus neque sed gravida rutrum. Maecenas eget commodo purus, at
                                    ullamcorper neque. Etiam ac tristique neque. Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit. Quisque pharetra eros at gravida imperdiet.
                                    Nulla venenatis nunc sit amet erat iaculis iaculis. Nulla in faucibus ipsum,
                                    vitae lobortis leo. Phasellus egestas non libero at elementum.</p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
   $(document).ready(function () {
          
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



            $("#trader-register-form").submit(function(e) {

$(".errorstatus").hide();
$(".errorstatus").html("");
e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var formdata = new FormData(this);

$.ajax({
type: "POST",
url: "{{url('save-trader-details')}}",
data: formdata, // serializes the form's elements.
cache: false,
contentType: false,
processData: false,
success: function(data)
{
if(data.success == true)
{
 window.location.href = "{{url('/')}}/trader-payment/"+data.message;
}
else
{
$(".errorstatus").show();
$(".errorstatus").html(data.message);
}
}
});

});

        });
</script>
@stop