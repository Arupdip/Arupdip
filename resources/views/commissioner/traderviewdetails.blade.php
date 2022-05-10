@extends('amc.layouts.app')

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
                <h5 class="card-header">{{$traderview->name}} 
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
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($Traderlog as $tl)
                                <tr>
                                    <td>@isset($tl->user) {{$tl->user->name}} ({{$tl->user->usertype->name}}) @endisset </td>
                                    <td>{{date('d F Y h:i A',  strtotime($tl->created_at))}}</td>
                                    <td>@if($tl->type ==0 || $tl->type == 4)  {{$tl->comment}}
                                        
                                        @else <a href="#" onClick="editcomply({{$tl->id}})" class="btn btn-icon btn-info" title="View Details"><i class="priya-edit"></i></a> 
                                        @endif</td>

                                    <td>@if($tl->type ==0) Approval @elseif($tl->type == 4) Recheck Submit @else Comply @endif </td>
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
                                <dd>{{$traderview->name}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Father's Name</dt>
                                <dd>{{$traderview->fathersname}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Gender</dt>
                                <dd>{{$traderview->gender}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Date of Birth</dt>
                                <dd>{{$traderview->dob}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Age</dt>
                                <dd>{{$traderview->age}}</dd>
                                <!-- <label class="give-comply">
                                    <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                                    <input type="radio" />
                                    <textarea name=""></textarea>
                                </label> -->
                            </dl>
                        </div>
                        {{-- <div class="col-md-4">
                            <dl>
                                <dt>Is Minor</dt>
                                <dd>No</dd>
                                <!-- <label class="give-comply">
                                    <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                                    <input type="radio" />
                                    <textarea name=""></textarea>
                                </label> -->
                            </dl>
                        </div> --}}
                        <div class="col-md-4">
                            <dl>
                                <dt>Address</dt>
                                <dd>{{$traderview->address}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Pin Code</dt>
                                <dd>{{$traderview->pincode}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>State</dt>
                                <dd> @isset($traderview->state->state_title){{$traderview->state->state_title}} @endisset</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>District</dt>
                                <dd> @isset($traderview->district->name) {{$traderview->district->name}} @endisset </dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Mandal</dt>
                                <dd> @isset($traderview->mandal->name) {{$traderview->mandal->name}} @endisset</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Aadhaar No.</dt>
                                <dd>{{$traderview->aadhar_no}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->aadhar_file}}" class="priya-download" download="aadhar"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>PAN No.</dt>
                                <dd>{{$traderview->pan_no}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->pan_file}}" class="priya-download" download="pan"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Mobile No.</dt>
                                <dd>{{$traderview->mobile}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Alternate Mobile No.</dt>
                                <dd>{{$traderview->alternate_mobile}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Email</dt>
                                <dd>{{$traderview->email}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </card>
            <card class="card no-gap mt-3">
                <h5 class="card-header">Applicant Firm Details</h5>
                <div class="card-body">
                    <div class="row gap-opt">
                        <div class="col-md-4">
                            <dl>
                                <dt>Type of Firm</dt>
                                <dd>{{$traderview->typeoffirm}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Firm Name</dt>
                                <dd>{{$traderview->firmname}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Address</dt>
                                <dd>{{$traderview->firmaddress}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>PIN Code</dt>
                                <dd>{{$traderview->firmpincode}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>State</dt>
                                <dd> @isset($traderview->firmstate->state_title) {{$traderview->firmstate->state_title}} @endisset </dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>District</dt>
                                <dd>@isset($traderview->firmdistrict->name) {{$traderview->firmdistrict->name}} @endisset</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>AMC Name</dt>
                                <dd> @isset($traderview->amc->name) {{$traderview->amc->name}} @endisset </dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Firm Registration No.</dt>
                                <dd>{{$traderview->firmregisteration_no}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>GSTIN</dt>
                                <dd>{{$traderview->gstin}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->gstin_file}}" class="priya-download" download="pan"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Firm Pan No</dt>
                                <dd>{{$traderview->firmpanno}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->firmpan_file}}" class="priya-download" download="pan"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Declaration of Solvency</dt>
                                <dd>{{$traderview->declarationofsolvency}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->declarationofsolvency}}" class="priya-download" download="Solvency"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Bank Guarantee Copy</dt>
                                <dd>{{$traderview->uploadedbankguaranteetype}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->uploadedbankguaranteetype}}" class="priya-download" download="Solvency"></a>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Bank Name</dt>
                                <dd>{{$traderview->bankname}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Account Holder Name</dt>
                                <dd>{{$traderview->account_holder}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Bank Account No.</dt>
                                <dd>{{$traderview->account_no}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>IFSC Code</dt>
                                <dd>{{$traderview->ifsc}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt>Bank Passbook</dt>
                                <dd>{{$traderview->account_file}}</dd>
                                <a href="{{url('/')}}/public/uploads/{{$traderview->account_file}}" class="priya-download" download="Solvency"></a>
                            </dl>
                        </div>
                    </div>
                </div>
            </card>

              @if($traderview->is_sign_upload == 1) 

<card class="card no-gap mt-3">
                <h5 class="card-header">Upload Attested Licence <a href="{{url('/')}}/pdfdownload/{{$traderview->application_id}}">Download License</a></h5>
                <div class="card-body">
                     <form name="" id="sign-upload-form" class="clearfix" enctype="multipart/form-data" method="post" action="{{url('commissioner/trader-upload-attested')}}" >
                                        @csrf
                                        <input type="hidden" value="{{$traderview->id}}" name="id">
                                        <img src="" class="img" alt="" accept="image/*" style="max-height: 70px; object-fit:contain">
                                        <input type="file" name="upload_signature" id="upload_signature" class="sign " onchange="javascript: document.getElementById('upload_signature').src = window.URL.createObjectURL(this.files[0])">

                                        <button class="btn btn-primary" type="submit">Upload</button>
                                      </form>
                </div>
            </card>


              @endif


            <div class="mt-3 text-center">
                @if($traderview->status == 6 || $traderview->status == 8) 
              <button class="btn btn-success" type="button" onclick="helpModal('#approve-pop')">Approve <i class="priya-mail-forward"></i></button>
              
              @endif
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
            <form name="approvesubmitform" id="approvesubmitform" method="POST" action="{{url('commissioner/traderapprovesubmit')}}">
                @csrf
                <input type="hidden" name="application_id" value="{{$traderview->id}}">
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





<div id="view-trader-details" class="help-modal"  style="display: none;">
    
</div>


<script>

function editcomply(id)
{
    
    $.ajax({
        type: "get",
        url: "{{url('/')}}/viewtradercomply/"+id,
        success: function(data)
        {
            $("#view-trader-details").html(data);
            helpModal('#view-trader-details')
          // show response from the php script.
        }
    });
}

</script>




@endsection