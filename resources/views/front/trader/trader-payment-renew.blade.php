@extends('layouts.frontlayout')

@section('content')

<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
            <h4 class="m-0 px-4 pt-3">Renew Trader Registration
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
                    <li class="active priya-truck" onclick="gotoForm(this)">Trader Details</li>
                    <li class="active priya-industry" onclick="gotoForm(this)">Firm Details</li>
                    <!-- <li class="priya-user" onclick="gotoForm(this)">User Details</li> -->
                    <li class=" active priya-inr" onclick="gotoForm(this)">Process Payment</li>
                </ul>
                <form name="" class="clearfix" enctype="multipart/form-data" method="post" action="{{url('save-trader-details')}}" novalidate="novalidate">
                    @csrf
                   
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
                    <div class="form-section">
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
                         <div class="payment-options collapse">
                            <a href="{{url("/")}}/trader/trader-regpay-success-renew/{{$id}}" class="payment-option" ><img src="../../images/sbi-logo.png" alt=""></a>
                            <a href="{{url("/")}}/trader/trader-regpay-success-renew/{{$id}}" class="payment-option" ><img src="../../images/PayU.jpg" alt=""></a>
                        </div> 
                    
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


        });
</script>
@stop