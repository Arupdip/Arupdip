<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <title>OLMS</title>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('slick/slick.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .login-container{background: linear-gradient(45deg, #6455d3, #585189);min-height: calc(100vh - 56px);}
        .login-container .illustrations { color: #fff; }
        .main-footer{background: #000 linear-gradient(45deg, #6455d3ef, #585189ef); border: none; color: #fff; box-shadow: 0px -1px 5px #6455d3;}
        logo {
            display: inline-block;
            font-size: 60px;
            border: 5px solid;
            padding: 5px 10px;
            border-radius: 0 30px;
            user-select: none;
        }
        logo img {
            width: 90px;
            height: 90px;
        }
        .flip-card{height: 350px;}
        .login-container .login-box{background:none; border: 1px solid #fff8;}
        .input-group, input#captcha{background-color: #fff;}
    </style>
</head>
<!-- <body style="background: url(./images/bazaar.jpg) no-repeat center; background-size:cover;"> -->

<body>
    <!-- <header class="main-header" style="box-shadow: 0px 1px 3px #0003; position: relative;">
        <div class="container-fluid text-center">
            <div class="logo d-inline-block">OLMS</div>
        </div>
    </header> -->
    <div class="login-container">
        <div class="illustrations">
            <div class="text-center pb-5"><logo><img src="../images/logo.png" alt="" /> OLMS</logo></div>
            <h1>Online License Management System</h1>
			<p>Online License management system (OLMS) acts as an information gateway to citizens & governs Farmer Welfare. Sales and Purchase framers commodities only happen thru license Traders and Commission Agents. Department aims to develop a web based system to maintain and automated the issue of license and renewal process. Traders and Commission Agents directly access to the web application for the license. This application mainly caters following key features:</p>
            <ul>
				<li>Issuing licenses for commission agents and trades</li>
				<li>Renewal  of licenses for commission agents and trades</li>
            </ul>
            <!--<div class="text-center">
                <a href="register.html" class="btn btn-lg"><i class="priya-sign-in rl-1"></i> Sign Up as New User</a>
            </div>-->
        </div>
        <div class="flip-card" id="forgotpassword">

            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <div class="login-box">
                        <!-- <div class="header">
                            <img src="../images/logo.png"
                                class="logo" alt="" />
                            <div class="title">OLMS</div>
                        </div> -->
                        <h3 style="color: #fff; border-bottom: 1px solid;padding-bottom: 10px; margin-bottom: 20px;"><i class="priya-sign-in"></i> Sign In</h3>

                        <form id="loginfrm" name="loginfrm" action="{{url('admin/post-login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-phone"></i></span>
                                    <input type="text" id="mobileno"  name="email"
                                        class="form-control mobile" placeholder="User id/Mobile number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-lock"></i></span>
                                    <input type="password" id="loginpwd" name="password" class="form-control"
                                        placeholder="Password" autocomplete="off">
                                    <div class="input-group-addon"><i class="priya-eye" aria-hidden="true"
                                            onmousedown="showPassword(this)" onmouseout="hidePassword(this)"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="flex-auto">
                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                            name="captcha">
                                    </div>
                                    <div class="flex-auto text-right">
                                        <div class="captcha d-flex">
											<span id="captchar"><img src="{{asset('images/captcha_bg.jpg')}}"></span>
											<button type="button" onclick="createCaptcha()" class="btn btn-r-curved" class="reload" id="reload">
												&#x21bb;
											</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
							<button type="button"  onclick="validateCaptcha()" class="btn btn-login btn-sm mt-2">Login</button>
                        </form>
                        <div class="text-center small mt-3 bold">
                            <a href="#forgotpassword" class="link">Forgot Password</a>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <div class="flip-card-back">
                    <div class="login-box">
                        <h3 style="color: #fff; border-bottom: 1px solid;padding-bottom: 10px; margin-bottom: 20px;"><i class="priya-key"></i> Forgot Password</h3>
                        <form action="../forgotpwd" id="forgotfrm" name="forgotfrm"
                            onsubmit="return forgotfrmFunc();" method="post">
                            <input type="hidden" name="_token" value="E5YUxnb7Pm7Ohva9J8DFha9VCkNBpKCSyRTfQrpP">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-user"></i></span>
                                    <input type="text" id="forgot_login_id" name="forgot_login_id" class="form-control"
                                        placeholder="Enter Mobile / Email" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login btn-sm mt-2">Send OTP</button>
                        </form>

                        <div class="text-center small mt-3 bold">
                            <a href="#" class="link">Back To Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="main-footer text-center py-3">
        &copy;<script>document.write(new Date().getFullYear())</script> Department
    </footer>

<script type="text/javascript">
    $('#captchar').height(38)
	createCaptcha();
	var code;
	function createCaptcha()
	{
    	document.getElementById('captchar').innerHTML = "";
		var charsArray ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%&";
		var lengthOtp = 6;
		var captcha = [];

		for (var i = 0; i < lengthOtp; i++) {
			//below code will not allow Repetition of Characters
			var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
			if (captcha.indexOf(charsArray[index]) == -1)
				captcha.push(charsArray[index]);
			else
				i--;
		}

		var canv = document.createElement("canvas");
		canv.id = "captcha";
		canv.width = 100;
		canv.height = 38;

		var ctx = canv.getContext("2d");
		var background = new Image();
		background.src = "{{asset('images/captcha_bg.jpg')}}";

		background.onload = function() {
			ctx.drawImage(background,0,0,100,100);
			ctx.font = "20px cursive";
			ctx.strokeText(captcha.join(""), 8, 25, background.width*2, background.height * 2);
		}


		//ctx.strokeText(captcha.join(""), 8, 25);

		//storing captcha so that can validate you can save it somewhere else according to your specific requirements
		code = captcha.join("");
		document.getElementById("captchar").appendChild(canv); // adds the canvas to the body element
	}

	function validateCaptcha()
	{
		event.preventDefault();
		debugger
		var val = $('#captcha').val();
		if (val == '') {
			$('#captcha').focus();
			return
		}
		if (val == code) {
			$('#loginfrm').submit();
		} else {
			alert("Invalid Captcha. try Again");
			createCaptcha();
		}
	}

        // $(document).on('keyup', '.mobile', function (event) {
        //     var regex = /^[6-9]/;
        //     if (!regex.test(this.value)) {
        //         this.value = '';
        //         return false;
        //     }

        // });
        // function loginSubmitFunc() {
        //     var mobileno = $("#mobileno").val();
        //     var loginpwd = $("#loginpwd").val();
        //     var captcha = $("#captcha").val();
        //     var blankTest = /\S/;
        //     if (!blankTest.test(mobileno)) {
        //         $("#mobileno").focus();
        //         $("#mobileno").parents('.input-group').addClass('form_validate_error');
        //         return false;
        //     } else {
        //         $("#mobileno").parents('.input-group').removeClass('form_validate_error');
        //     }
        //     if (!blankTest.test(loginpwd)) {
        //         $("#loginpwd").focus();
        //         $("#loginpwd").parents('.input-group').addClass('form_validate_error');
        //         return false;
        //     } else {
        //         $("#loginpwd").parents('.input-group').removeClass('form_validate_error');
        //         //$("#loginsubmitfrm").submit();

        //     }
        //     if (!blankTest.test(captcha)) {
        //         $("#captcha").focus();
        //         $("#captcha").parents('.input-group').addClass('form_validate_error');
        //         return false;
        //     } else {
        //         $("#captcha").parents('.input-group').removeClass('form_validate_error');
        //         //$("#loginsubmitfrm").submit();

        //     }
        // }
        function forgotfrmFunc() {
            var forgot_login_id = $("#forgot_login_id").val();
            var blankTest = /\S/;
            if (!blankTest.test(forgot_login_id)) {
                $("#forgot_login_id").focus();
                $("#forgot_login_id").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#forgot_login_id").parents('.input-group').removeClass('form_validate_error');
            }
        }
        function forgotOtpSubmitFunc() {
            var forgot_verify_otp = $("#forgot_verify_otp").val();
            var blankTest = /\S/;
            if (!blankTest.test(forgot_verify_otp)) {
                $("#forgot_verify_otp").focus();
                $("#forgot_verify_otp").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#forgot_verify_otp").parents('.input-group').removeClass('form_validate_error');
            }
        }
        function setNewPwdSubmitFunc() {
            var new_pwd = $("#new_pwd").val();
            var confirm_pwd = $("#confirm_pwd").val();
            var blankTest = /\S/;
            if (!blankTest.test(new_pwd)) {
                $("#new_pwd").focus();
                $("#new_pwd").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#new_pwd").parents('.input-group').removeClass('form_validate_error');
            }
            if (!blankTest.test(confirm_pwd)) {
                $("#confirm_pwd").focus();
                $("#confirm_pwd").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#confirm_pwd").parents('.input-group').removeClass('form_validate_error');
            }
            if (confirm_pwd != new_pwd) {
                $("#confirm_pwd").focus();
                $("#confirm_pwd").parents('.input-group').addClass('form_validate_error');
                $("#errorconfirmpwdmsg").html('<font style="color:#f00">Password Mismatch!!</font>');
                return false;
            } else {
                $("#confirm_pwd").parents('.input-group').removeClass('form_validate_error');
                $("#errorconfirmpwdmsg").html('');
            }
        }
        // $('#reload').click(function () {
        //     $.ajax({
        //         type: 'GET',
        //         url: './reload-captcha',
        //         success: function (data) {
        //             $(".captcha span").html(data.captcha);
        //         }
        //     });
        // });

    </script>
</body>

</html>