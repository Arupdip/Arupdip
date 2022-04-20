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
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Age</div>
                                            <div class="dd">{{$row->age}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Is Minor</div>
                                            <div class="dd">No</div>
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
                                <li @if($row->is_amc_approval == 1) class="approved" @endif >AMC Approval <a href="compliance-recheck.php" class="badge badge-warning">Recheck</a></li>
                                <li  @if($row->is_ad_approval == 1) class="approved" @endif >Head Office AD Approval</li>
                                <li @if($row->is_commisioner_approval == 1) class="approved" @endif>Commissioner Approval</li>
                                <li><a href="#">Final Payment</a></li>
                                <li>AMC Capture Digital Signature</li>
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