

<?php
$log = array();

if(isset($traderold->logs))
{
$traderold = $traderold->logs;

$log = json_decode($traderold, true);
}

function getfield($name, $array)
{
if(isset($array[$name])){
    return '<textarea name="'.$name.'" style="display:block">'.$array[$name].'</textarea>';
}
else{
    return '<textarea name="'.$name.'"></textarea>';
}
}
?>

<div class="help-modal-content no-gap">
    
    <i class="priya-close" onclick="helpModalHide(this)"></i>
    <header>{{$trader->name}}</header>
@if(Auth::user()->user_type == 5)
    <form method="POST" action="{{url('/')}}/submitcomply">
        @endif

        @if(Auth::user()->user_type == 4)
    <form method="POST" action="{{url('/')}}/submitcomply">
        @endif

        @if(Auth::user()->user_type == 3)
    <form method="POST" action="{{url('/')}}/submitcomply">
        @endif
        @csrf

        <input type="hidden" name="id" value="{{$trader->id}}">

    <section>
        <div class="row gap-opt">
            <div class="col-md-6">
                <dl>
                    <dt>Father's Name</dt>
                    <dd>{{$trader->fathersname}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />

                      <?php echo getfield('fathersname', $log); ?>
                       
                    </label>
                </dl>
            </div>

            <div class="col-md-6">
                <dl>
                    <dt>Address</dt>
                    <dd>{{$trader->address}}</dd>
                        <label class="give-comply">
                            <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                            <input type="radio" />
                           
                      <?php echo getfield('address', $log); ?>
                        </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>Date of Birth</dt>
                    <dd>{{date('d F Y', strtotime($trader->dob))}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        
                      <?php echo getfield('dob', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Pincode</dt>
                    <dd>{{$trader->pincode}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('pincode', $log); ?>
                    </label>
                </dl>
            </div>



            <div class="col-md-3">
                <dl>
                    <dt>State</dt>
                    <dd>@if(isset($trader->state->state_title)) {{$trader->state->state_title}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('state_id', $log); ?>
                    </label>
                </dl>
            </div>
            <div class="col-md-3">
                <dl>
                    <dt>District</dt>
                    <dd> @if(isset($trader->district->name)) {{$trader->district->name}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('district_id', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>District</dt>
                    <dd> @if(isset($trader->mandal->name)) {{$trader->mandal->name}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('mandal_id', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>Aadhar No</dt>
                    <dd>{{$trader->aadhar_no}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('aadhar_no', $log); ?>
                    </label>
                </dl>
            </div>
            <div class="col-md-3">
                <dl>
                    <dt>Aadhar File Upload</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('aadhar_file', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>PAN No.</dt>
                    <dd>{{$trader->pan_no}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('pan_no', $log); ?>
                    </label>
                </dl>
            </div>

           
            <div class="col-md-3">
                <dl>
                    <dt>PAN File Upload</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('pan_file', $log); ?>
                    </label>
                </dl>
            </div>

           
           
           
         

           
            <div class="col-md-3">
                <dl>
                    <dt>Firm Name</dt>
                    <dd>{{$trader->firmname}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmname', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Firm Address</dt>
                    <dd>{{$trader->firmaddress}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmaddress', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>Firm Pincode</dt>
                    <dd>{{$trader->firmpincode}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmpincode', $log); ?>
                    </label>
                </dl>
            </div>



            <div class="col-md-3">
                <dl>
                    <dt>Firm State</dt>
                    <dd>@if(isset($trader->firmstate->state_title)) {{$trader->firmstate->state_title}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firm_state_id', $log); ?>
                    </label>
                </dl>
            </div>
            <div class="col-md-3">
                <dl>
                    <dt>Firm District</dt>
                    <dd> @if(isset($trader->firmdistrict->name)) {{$trader->firmdistrict->name}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmdistrict_id', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>AMC Name</dt>
                    <dd>@if(isset($trader->amc->name)) {{$trader->amc->name}} @endif</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('amc_id', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Firm Registration</dt>
                    <dd>{{$trader->firmregisteration_no}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmregisteration_no', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>Firm PAN</dt>
                    <dd>{{$trader->firmpanno}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmpanno', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Upload Firm PAN File </dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('firmpan_file', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Upload GSTIN</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('gstin_file', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Declaration of Solvency</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('declarationofsolvency', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Bank Guarantee Copy</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('uploadedbankguaranteetype', $log); ?>
                    </label>
                </dl>
            </div>

            <div class="col-md-3">
                <dl>
                    <dt>GSTIN</dt>
                    <dd>{{$trader->gstin}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('gstin', $log); ?>
                    </label>
                </dl>
            </div>
            


            <div class="col-md-3">
                <dl>
                    <dt>Bank Name</dt>
                    <dd>{{$trader->bankname}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('bankname', $log); ?>
                    </label>
                </dl>
            </div>



            <div class="col-md-3">
                <dl>
                    <dt>Holder  Name</dt>
                    <dd>{{$trader->account_holder}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('account_holder', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>Account  No</dt>
                    <dd>{{$trader->account_no}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('account_no', $log); ?>
                    </label>
                </dl>
            </div>


            <div class="col-md-3">
                <dl>
                    <dt>IFSC</dt>
                    <dd>{{$trader->ifsc}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('ifsc', $log); ?>
                    </label>
                </dl>
            </div>
            
            
            <div class="col-md-3">
                <dl>
                    <dt>Upload Copy of Bank Passbook</dt>
                  
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('account_file', $log); ?>
                    </label>
                </dl>
            </div>
            
        </div>
        <div class="mt-3 text-center">
            <button class="btn btn-warning" type="submit"><i class="priya-mail-reply"></i> Comply</button>
          
        </div>
    </section>
</div>