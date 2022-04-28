@extends('front.trader.layouts.app')

@section('content')
<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
            <h4 class="m-0 px-4 pt-3">Online License Management System (Trader)
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
                    <li class="priya-cubes">Collect Trader Details</li>
                    <li class="priya-hourglass-2">Process Payment</li>
                    <li class="active priya-file-text-o">Department Approval</li>
                    <li class="priya-bell-o">Notify Trader</li>
                    <li class="priya-check">Resolve</li>
                </ul>
                <div class="row">
                    @foreach($data as $row)
                    <div class="col-md-9">
                        <form name="" class="clearfix" action="" novalidate="novalidate">
                            <fieldset class="">
                                <!-- <legend>Department Approval Status</legend> -->
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Full Name</div>
                                            <div class="dd">{{$row->name}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Father's Name</div>
                                            <div class="dd">{{$row->fathersname}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Gender</div>
                                            <div class="dd">{{$row->gender}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Date of Birth</div>
                                            <div class="dd">{{$row->dob}}</div>
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Address</div>
                                            <div class="dd">{{$row->address}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Pin Code</div>
                                            <div class="dd">{{$row->pincode}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">State</div>
                                            <div class="dd">@if(isset($row->state)){{$row->state->state_title}} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">District</div>
                                            <div class="dd">@if(isset($row->district)){{$row->district->name}} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Mandal</div>
                                            <div class="dd">@if(isset($row->mandal)){{$row->mandal->name}} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Aadhar No</div>
                                            <div class="dd">{{$row->aadhar_no}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">PAN Number</div>
                                            <div class="dd">{{$row->pan_no}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Mobile Number</div>
                                            <div class="dd">{{$row->mobile}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Alternate Mobile Number</div>
                                            <div class="dd">{{$row->alternate_mobile}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Email ID</div>
                                            <div class="dd">{{$row->email}}</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm Name</div>
                                            <div class="dd">{{$row->firmname}}</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm Address</div>
                                            <div class="dd">{{$row->firmaddress}}</div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm Pincode</div>
                                            <div class="dd">{{$row->firmpincode}}</div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm Pincode</div>
                                            <div class="dd">{{$row->firmpincode}}</div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm State</div>
                                            <div class="dd">@if(isset($row->firmstate->state_title)) {{$row->firmstate->state_title}} @endif</div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm District</div>
                                            <div class="dd">@if(isset($row->firmdistrict->name)) {{$row->firmdistrict->name}} @endif</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">AMC Name</div>
                                            <div class="dd">@if(isset($row->amc->name)) {{$row->amc->name}} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm Registration</div>
                                            <div class="dd">{{$row->firmregisteration_no}}</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm PAN</div>
                                            <div class="dd">{{$row->firmpanno}}</div>
                                        </div>
                                    </div>




                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Firm GSTIN</div>
                                            <div class="dd">{{$row->gstin}}</div>
                                        </div>
                                    </div>




                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Bank Name</div>
                                            <div class="dd">{{$row->bankname}}</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Holder  Name</div>
                                            <div class="dd">{{$row->account_holder}}</div>
                                        </div>
                                    </div>



                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Account  No</div>
                                            <div class="dd">{{$row->account_no}}</div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Bank IFSC</div>
                                            <div class="dd">{{$row->ifsc}}</div>
                                        </div>
                                    </div>


                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="status-sec">
                            <h5>Approval Status</h5>
                            <ul>
                                <li @if($row->is_submit == 1) class="approved" @endif>Details Submitted</li>
                                <li @if($row->is_reg_pay == 1) class="approved" @endif>Registration Fee Paid</li>
                                <li @if($row->is_amc_approval == 1 && $row->is_amc_comply == 0) class="approved" @endif >AMC Approval @if($row->is_amc_comply == 1) <a href="{{url('/')}}/trader/recheck/{{$row->application_id}}" class="badge badge-warning">Recheck</a> @endif</li>
                                <li  @if($row->is_ad_approval == 1 && $row->is_ad_comply == 0) class="approved" @endif >Head Office AD Approval</li>
                                <li @if($row->is_commisioner_approval == 1 && $row->is_commisioner_comply == 0) class="approved" @endif>Commissioner Approval</li>
                                @if($row->is_final_pay == 0)
                                <li>Final Payment @if($row->is_commisioner_approval == 1) <a href="{{url('trader-final-payment/'.$row->application_id)}}" class="badge badge-warning">Pay now</a> @endif </li>
                                @endif
                                @if($row->is_final_pay == 1)
                                <li  class="approved">Final Payment <a href="" class="badge badge-success">Success</a></li>
                                @endif
                                <li @if($row->is_sign_upload == 1) class="approved" @endif >AMC Capture Digital Signature</li>
                                <li>Trader License Generated</li>
                            </ul>
                        </div>
                    </div>

                    @endforeach
                </div>
                
            </div>

        </div>
    </div>
</div>
@endsection