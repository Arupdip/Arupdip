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
                                            <input type="radio" name="isfamilymemberholdca" class="commodity_wether_cls" value="1" onchange="priGroup(this)"><i></i> Yes
                                        </label>
                                        <label class="pri-radio ml-4">
                                            <input type="radio" CHECKED name="isfamilymemberholdca" class="commodity_wether_cls" value="0" onchange="priGroup(this)"><i></i> No
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
                                            <input type="radio" CHECKED  name="isotherfirm" class="commodity_wether_cls" value="0" onchange="priGroup(this)"><i></i> No
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
                                    <label>Aadhar No.<span class="text-danger">*</span></label>
                                    <input type="text" required id="aadhar_no" name="aadhar_no"
                                        class="form-control aadharNoCls pri-form" maxlength="16" value="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name<span class="text-danger">*</span></label>
                                    <input type="text" id="name" required name="name"
                                        class="form-control pri-form" aria-required="true" />
                                    <span class="text-danger" id="err_dup_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Age<span class="text-danger">*</span></label>
                                    <input type="number" required name="age" maxlength="2" class="form-control pri-form" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father's Name<span class="text-danger">*</span></label>
                                    <input type="text" required name="fathersname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" required name="dob" class="form-control pri-form" />
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
                                    <textarea name="address" required class="form-control pri-form"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number<span class="text-danger">*</span></label>
                                    <input type="tel" required name="mobile" class="form-control pri-form" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN Number<span class="text-danger">*</span></label>
                                    <input type="text" required name="pan_no" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email ID<span class="text-danger">*</span></label>
                                    <input type="email" required name="email" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Market Name <span class="text-danger">*</span></label>
                                    <input type="text" required name="marketname" class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select name="state_id" required id="state-dd" class="form-control pri-form">
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
                                    <select name="district_id" required  id="district-dd" class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GSTIN<span class="text-danger">*</span></label>
                                    <input type="text" name="gstin" required class="form-control pri-form" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>License Type<span class="text-danger">*</span></label>
                                    <select name="liscencetype_id" required class="form-control pri-form">
                                        <option value="">-- Select --</option>
                                         @foreach($liscencetype as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AMC Name<span class="text-danger">*</span></label>
                                    <select name="amc_id" required class="form-control pri-form">
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
                                    <input type="text" required name="power_attorney" class="form-control pri-form" />
                                </div>
                            </div>
                            

                        </div>
                        <div class="mt-2 text-center">
                            <p class="complain errorstatus" style="display:none"></p>
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
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });




    $("#ca-register-form").submit(function(e) {

        $(".errorstatus").hide();
        $(".errorstatus").html("");
e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var formdata = new FormData(this);

$.ajax({
    type: "POST",
    url: "{{url('save-ca-details')}}",
    data: formdata, // serializes the form's elements.
    cache: false,
    contentType: false,
    processData: false,
    success: function(data)
    {
     if(data.success == true)
     {
         window.location.href = "{{url('/')}}/ca-payment/"+data.message;
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
