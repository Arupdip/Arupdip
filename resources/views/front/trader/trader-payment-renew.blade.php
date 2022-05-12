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