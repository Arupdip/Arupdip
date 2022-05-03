

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
    <form method="POST" action="{{url('/')}}/submitcomplyca">
        @endif

        @if(Auth::user()->user_type == 4)
    <form method="POST" action="{{url('/')}}/submitcomplyca">
        @endif

        @if(Auth::user()->user_type == 3)
    <form method="POST" action="{{url('/')}}/submitcomplyca">
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
					<a href="{{url('/')}}/public/uploads/{{$trader->aadhar_file}}" class="priya-download" download="aadhaar"></a>
					<a href="{{url('/')}}/public/uploads/{{$trader->aadhar_file}}" class="priya-eye" target="_blank"></a>
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
                    <a href="{{url('/')}}/public/uploads/{{$trader->pan_file}}" class="priya-download" download="Pan"></a>
                    <a href="{{url('/')}}/public/uploads/{{$trader->pan_file}}" class="priya-eye" target="_blank"></a>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('pan_file', $log); ?>
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
                    <dt>Market Name</dt>
                    <dd>{{$trader->marketname}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('marketname', $log); ?>
                    </label>
                </dl>
            </div>



            <div class="col-md-3">
                <dl>
                    <dt> Power Of Attorney</dt>
                    <dd>{{$trader->power_attorney}}</dd>
                    <label class="give-comply">
                        <i class="priya-mail-reply btn btn-warning btn-sm"></i>
                        <input type="radio" />
                        <?php echo getfield('power_attorney', $log); ?>
                    </label>
                </dl>
            </div>


            


            
        </div>
        <div class="mt-3 text-center">
            <button class="btn btn-warning" type="submit"><i class="priya-mail-reply"></i> Comply</button>
          
        </div>
    </section>
</div>