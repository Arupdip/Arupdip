@extends('front.ca.layouts.app')

@section('content')
<div class="container-fluid bdy">
    <div class="card my-5">
        <div class="card-head">
			<h4 class="m-0 px-4 pt-3">Online License Management System (Commission Agent)
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
					<li class="active priya-hourglass-2">Process Payment</li>
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
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Do you have a trader license</div>
                                            <div class="dd"> @if($row->traderlicense == 1) Yes @else No @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Commission Agent License of your family members</div>
                                            <div class="dd">
                                                @if($row->isfamilymemberholdca == 1) Yes @else No @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Do you have any other firm/Business or Are you a partner of any firm/business</div>
                                            <div class="dd"> @if($row->familymemberholdcafile == 1) Yes @else No @endif</div>
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
                                            <div class="dt">Date of Birth</div>
                                            <div class="dd">{{$row->dob}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Is Minor</div>
                                            <div class="dd"> @if($row->is_minor == 1) Yes @else No @endif</div>
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
                                            <div class="dt">Mobile Number</div>
                                            <div class="dd">{{$row->mobile}}</div>
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
                                            <div class="dt">Email ID</div>
                                            <div class="dd">{{$row->email}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Market Name</div>
                                            <div class="dd">{{$row->marketname}}</div>
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
                                            <div class="dt">GSTIN</div>
                                            <div class="dd">{{$row->gstin}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">License Type</div>
                                            <div class="dd">CA</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">AMC Name</div>
                                            <div class="dd">@if(isset($row->amc)){{$row->amc->name}} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Name of Power Of Attorney</div>
                                            <div class="dd">{{$row->power_attorney}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Name of Taluk</div>
                                            <div class="dd">{{$row->taluk}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Name of Town</div>
                                            <div class="dd">{{$row->town}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Ward Block no</div>
                                            <div class="dd">{{$row->wardblockno}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Revenue or town survey no</div>
                                            <div class="dd">{{$row->toensurveyno}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Name of the Block</div>
                                            <div class="dd">{{$row->nameofblock}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Plot No</div>
                                            <div class="dd">{{$row->plotno}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Description of Primises</div>
                                            <div class="dd">{{$row->descriptionofpremises}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Boundary North</div>
                                            <div class="dd">{{$row->boundarynorth}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Boundary East</div>
                                            <div class="dd">{{$row->boundaryeast}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Boundary South</div>
                                            <div class="dd">{{$row->boundarysouth}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="dl">
                                            <div class="dt">Boundary West</div>
                                            <div class="dd">{{$row->boundarywest}}</div>
                                        </div>
                                    </div>
                                </div>

                                 <card class="card no-gap mt-3">
                <h5 class="card-header">Partner Details</h5>
                <div class="card-body">
                   <div class="table-responsive">
                        <table class="table table-stripped table-bordered theme-tbl">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Aadhar/Pan No</th>
                                    <th>Share</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($row->partners as $p)
                                 <?php $i++;?>
<tr>
    <td>{{$i}}</td>
    <td>{{$p->name}}</td>
     <td>{{$p->document}}</td>
      <td>{{$p->share}}</td>
</tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </card>

                            </fieldset>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="status-sec">
                            <h5>Approval Status</h5>

                           
                            <ul>
                                <ul>
                                    <li @if($row->is_submit == 1) class="approved" @endif>Details Submitted</li>
                                    <li @if($row->is_reg_pay == 1) class="approved" @endif>Registration Fee Paid</li>
                                    <li @if($row->status == 1 || $row->status == 5 || $row->status == 6 || $row->status == 8 || $row->status  == 9) class="approved" @endif >AMC Approval @if($row->status == 2) <a href="{{url('/')}}/ca/recheck/{{$row->application_id}}" class="badge badge-warning">Recheck</a> @endif</li>
                                    <li  @if($row->status == 6 || $row->status == 8 || $row->status  == 9) class="approved" @endif >Head Office AD Approval</li>
                                    <li @if($row->status  == 9) class="approved" @endif>Commissioner Approval</li>
                             
                                @if($row->is_final_pay == 0)
                                <li>Final Payment @if($row->is_commisioner_approval == 1) <a href="{{url('/')}}/ca/final-payment/{{$row->application_id}}" class="badge badge-warning">Pay Now</a> @endif</li>
                                @endif
                                @if($row->is_final_pay == 1)
                                <li  class="approved">Final Payment <a href="" class="badge badge-success">Success</a></li>
                                @endif
                                <li @if($row->is_sign_upload == 1) class="approved" @endif >AMC Capture Digital Signature</li>
                                <li @if($row->is_pdf_generate == 1) class="approved" @endif>CA License Generated</li>
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