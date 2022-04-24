@extends('ad.layouts.app')

@section('content')

<style>
    .no-gap .row.gap-opt dl{padding: 6px 10px; font-size: 14px; border-color: #eee;}
    dl dd{margin-bottom: 0; }
    dl a[download] {
        position: absolute;
        right: 10px;
        top: 6px;
    }

    .error{
        color:red;
        }
</style>

<div class="container-fluid bdy">
    <div class="row">
    <div class="col-sm-12">
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header">{{$cadata->name}} 
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered theme-tbl">
                            <thead>
                                <tr>
                                    <th>Approved By</th>
                                    <th>Date Time</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($calog as $tl)
                                <tr>
                                    <td>@isset($tl->user) {{$tl->user->name}} ({{$tl->user->usertype->name}}) @endisset </td>
                                    <td>{{date('d F Y h:i A')}}</td>
                                    <td>{{$tl->comment}}</td>
                                </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </card>
            <card class="card no-gap mt-3">
                <h5 class="card-header">Applicant Details</h5>
                <div class="card-body">
                    <div class="row gap-opt">
                        <div class="col-md-4">
                            <dl>
                                <dt>Full Name</dt>
                                <dd>{{$cadata->name}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Father's Name</dt>
                                <dd>{{$cadata->fathersname}}</dd>
                            </dl>
                        </div>
                       
                        <div class="col-md-4">
                            <dl>
                                <dt>Date of Birth</dt>
                                <dd>{{$cadata->dob}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Age</dt>
                                <dd>{{$cadata->age}}</dd>
                                <!-- <label class="give-comply">
                                    <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                                    <input type="radio" />
                                    <textarea name=""></textarea>
                                </label> -->
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Is Minor</dt>
                                <dd>@if($cadata->is_minor == 1){{$cadata->is_minor}} @else No @endif</dd>
                                <!-- <label class="give-comply">
                                    <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                                    <input type="radio" />
                                    <textarea name=""></textarea>
                                </label> -->
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Address</dt>
                                <dd>{{$cadata->address}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>AMC Name</dt>
                                <dd>{{$cadata->amc->name}}</dd>
                            </dl>
                        </div>
                       
                        <div class="col-md-4">
                            <dl>
                                <dt>State</dt>
                                <dd> @isset($cadata->state->state_title){{$cadata->state->state_title}} @endisset</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>District</dt>
                                <dd> @isset($cadata->district->name) {{$cadata->district->name}} @endisset </dd>
                            </dl>
                        </div>
                       
                        <div class="col-md-4">
                            <dl>
                                <dt>Aadhaar No.</dt>
                                <dd>{{$cadata->aadhar_no}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$cadata->aadhar_file}}" class="priya-download" download="aadhar"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>PAN No.</dt>
                                <dd>{{$cadata->pan_no}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$cadata->pan_file}}" class="priya-download" download="pan"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Mobile No.</dt>
                                <dd>{{$cadata->mobile}}</dd>
                            </dl>
                        </div>
                        
                        <div class="col-md-4">
                            <dl>
                                <dt>Email</dt>
                                <dd>{{$cadata->email}}</dd>
                            </dl>
                        </div>


                        <div class="col-md-4">
                            <dl>
                                <dt>GSTIN</dt>
                                <dd>{{$cadata->gstin}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Name in Power Of Attorney</dt>
                                <dd>{{$cadata->power_attorney}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Market Name</dt>
                                <dd>{{$cadata->marketname}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Family Hold Ca</dt>
                                <dd>@if($cadata->isfamilymemberholdca == 1) Yes @else No @endif</dd>
                                @if($cadata->isfamilymemberholdca == 1) <a href="{{url('/')}}/public/uploads/{{$cadata->familymemberholdcafile}}" class="priya-download" download="pan"></a> @endif
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Other Firm</dt>
                                <dd>@if($cadata->isotherfirm == 1) Yes @else No @endif</dd>
                                @if($cadata->isotherfirm == 1) <a href="{{url('/')}}/public/uploads/{{$cadata->upladedotherfirmfile}}" class="priya-download" download="pan"></a> @endif
                            </dl>
                        </div>
                       

                    </div>
                </div>
            </card>
          
          
            <div class="mt-3 text-center">
                @if($cadata->is_ad_approval == 0)   <button class="btn btn-warning" type="button" onclick="helpModal('#comply-pop')"><i class="priya-mail-reply"></i> Comply</button>
              <button class="btn btn-success" type="button" onclick="helpModal('#approve-pop')">Approve <i class="priya-mail-forward"></i></button> @endif
            </div>
        </div>
      </div>
    </div>
</div>

 <div id="comply-pop" class="help-modal" style="display: none;">
    <div class="help-modal-content no-gap">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header class=""> <i class="priya-mail-reply"></i> Comply</header>
        <section>
            <div class="form-group">
                <label>Required Copies<span class="text-danger">*</span></label>
                <div>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Aadhaar</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Personal PAN Card</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Firm PAN Card</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> GSTIN</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Declaration of Solvency</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Bank Guarantee</label>
                    <label class="pri-check m-2"><input type="checkbox" name="req"><i></i> Bank Passbook</label>
                </div>
            </div>
            <textarea name="" class="form-control pri-form" placeholder="Enter your comply text"></textarea>
            <div class="mt-3 text-center">
                <button class="btn btn-warning" type="button">Submit</button>
            </div>
        </section>
    </div>
</div>
 <div id="approve-pop" class="help-modal" style="display: none;">
    <div class="help-modal-content no-gap">
        <i class="priya-close" onclick="helpModalHide(this)"></i>
        <header>Approve <i class="priya-mail-forward"></i></header>
        <section>
            <form name="approvesubmitform" id="approvesubmitform" method="POST" action="{{url('ad/caapprovesubmit')}}">
                @csrf
                <input type="hidden" name="application_id" value="{{$cadata->id}}">
                <label class="pri-check"><input type="checkbox" onchange ="changeverify()" class="verify"><i></i> Verified and found records as per Act & Rules, hence Approved</label>
               <br/><span class="error error-v" style="display:none">Please tick checkbox.</span> <textarea name="comment"  class="form-control pri-form comment" placeholder="Enter your comment"></textarea>
               <span class="error error-t" style="display:none">This field is required.</span> 
                <div class="mt-3 text-center">
                <button class="btn btn-success"  onclick="formsubmit(this)" type="button">Submit</button>
            </div>
        </form>
        </section>
    </div>
</div>


<script>
	

        function formsubmit(clrt)
        {
            var s= true;
            if($(".verify:checked").length==1)
        {
            $(".error-v").hide();
        }
        else{
            $(".error-v").show();
            s= false;
          
        }
        if($(".comment").val()=='')
        {
            $(".error-t").show();
            s= false;
        }
        else{
            $(".error-t").hide();
        }

        if(s == true)
        $("#approvesubmitform").submit();
        else
        return s;

        }

</script>








@endsection