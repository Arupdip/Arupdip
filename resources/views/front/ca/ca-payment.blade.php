@extends('layouts.frontlayout')

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
                    <li class="priya-cubes">Collect CA Details</li>
                    <li class="active priya-hourglass-2">Process Payment</li>
                    <li class="priya-file-text-o">Department Approval</li>
                    <li class="priya-bell-o">Notify CA</li>
                    <li class="priya-check">Resolve</li>
                </ul>
                <form name="" class=" clearfix" action="" novalidate="novalidate">
                    <div class="form-section">
                        <h6>Terms & Conditions</h6>
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
                                    <input type="checkbox" class="" value="1"
                                        onchange="if($(this).is(':checked')){$('#payfeebtn').show()}else{$('#payfeebtn').hide()}"><i></i>
                                    I agree with the Terms & Conditions mentioned above
                                </label>
                            </div>
                        </div>
                        <div class="payment-options collapse">
                            <a href="{{url("/")}}/ca-regpay-success/{{$id}}" class="payment-option"><img
                                    src="../images/sbi-logo.png" alt=""></a>
                            <a href="{{url("/")}}/ca-regpay-success/{{$id}}" class="payment-option"><img
                                    src="../images/PayU.jpg" alt=""></a>
                        </div>
                        <div class="mt-2 text-center">
                            <!-- <button class="btn" type="button" onclick="prevForm(this)"><i class="priya-angle-left"></i> Prev</button> -->
                            <button id="payfeebtn" class="btn collapse" type="button"
                                onclick="$('.payment-options').slideDown(300)">Pay Fees</button>
                            <!-- <button class="btn" type="button" onclick="nextForm(this, 2)">Next <i class="priya-angle-right"></i></button> -->
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
