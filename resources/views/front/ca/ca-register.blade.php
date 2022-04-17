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
                <form name="" id="ca-register-form" class="clearfix" enctype="multipart/form-data" method="post" action="{{url('save-ca-details')}}" novalidate="novalidate">
                    @csrf
                    <div class="form-section">
                        <h6>Trader Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Does any of your family members hold Commission Agent License<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="r2" class="commodity_wether_cls" value="1" onchange="priGroup(this)"><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio" name="r2" class="commodity_wether_cls" value="0" onchange="priGroup(this)"><i></i> No
                                        </label>
                                    </div>
                                    <div class="pri-collapsed">
                                        <label>Attach File<span class="text-danger">*</span></label>
                                        <input type="file" name="familycaliscence" class="form-control pri-form" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Do you have any other firm/Business or Are you a partner of any firm/business<span class="text-danger">*</span></label>
                                    <div>
                                        <label class="pri-radio">
                                            <input type="radio" name="r3" class="commodity_wether_cls" value="1" onchange="priGroup(this)"><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio" name="r3" class="commodity_wether_cls" value="0" onchange="priGroup(this)"><i></i> No
                                        </label>
                                    </div>
                                    <div class="pri-collapsed">
                                        <label>Attach File<span class="text-danger">*</span></label>
                                        <input type="file" name="" class="form-control pri-form" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhar No.<span class="text-danger">*</span></label>
                                    <input type="text" id="adhar_no" name="adhar_no"
                                        class="form-control aadharNoCls pri-form" value="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name<span class="text-danger">*</span></label>
                                    <input type="text" id="name_of_applicant" name="name_of_applicant"
                                        class="form-control pri-form" aria-required="true" />
                                    <span class="text-danger" id="err_dup_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Age<span class="text-danger">*</span></label>
                                    <input type="text" name="age" class="form-control pri-form" >
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
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="dateofbirth" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Is Minor<span class="text-danger">*</span></label>
                                    <input type="text" name="isminor" class="form-control pri-form" readonly />
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
                                    <label>Mobile Number<span class="text-danger">*</span></label>
                                    <input type="tel" name="mobno" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
                                    <input type="text" name="panno" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email ID<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Market Name <span class="text-danger">*</span></label>
                                    <input type="text" name="marketname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state" id="state-dd" class="form-control pri-form">
                                        @foreach($states as $state)
                                        <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District<span class="text-danger">*</span></label>
                                    <select name="district" id="district-dd" class="form-control pri-form">
                                        <option>-- Select --</option>
                                    </select>
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
                                    <label>License Type<span class="text-danger">*</span></label>
                                    <select name="liscencetype" class="form-control pri-form">
                                        <option>-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <select name="amcname" class="form-control pri-form">
                                        <option>-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name in Power Of Attorney<span class="text-danger">*</span></label>
                                    <input type="text" name="nameinpowerattorney" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" class="form-control pri-form" />
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn" type="submit">Submit</button>
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
                                .districtid + '">' + value.district_title + '</option>');
                        });
                    }
                });
            });

// To auto select state and sistrict

        $("#ca-register-form").validate({
        rules: {
            name_of_applicant: "required",                    
            password: {
                required: true,
                minlength: 6
            },
            adhar_no: "required",
            age: "required",
            fathersname: "required",
            dateofbirth: "required",
            address: "required",
            mobno: "required",
            panno: "required",
            email: "required",
            marketname: "required",
            state: "required",
            district: "required",
            gstin: "required",
            liscencetype: "required",
            amcname: "required",
            nameinpowerattorney: "required",
            password: "required",
            confirm_password: "required"

         
        },
        messages: {
            name: "Please enter your Name",                   
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
          city: "Please enter your city",
          gender: "This field is required"
        },
         errorPlacement: function(error, element) 
{
    if ( element.is(":radio") ) 
    {
        error.appendTo( element.parents('.form-group') );
    }
    else 
    { // This is the default behavior 
        error.insertAfter( element );
    }
 },
        submitHandler: function(form) {
            form.submit();
        }
        
    });






        });
</script>
@stop
