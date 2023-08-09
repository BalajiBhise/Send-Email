<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('/public/assets')}}/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets')}}/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{url('/public/assets')}}/images/img-01.png" alt="IMG">
                </div>
                @if(isset($_GET['flag']) && $_GET['flag'] == 1)
                <form class="login100-form validate-form" action="{{url('/verifylogin')}}" method="post"> {{ csrf_field()}}
                    <span class="login100-form-title">
                        Verify OTP 
                    </span>
                    <input type="hidden" value="{{$_COOKIE['email']}}" name="emailid">
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="OTP" placeholder="Enter OTP">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Verify OTP
                        </button>
                    </div>
                </form>
                @else
                <form class="login100-form validate-form" action="{{ url('/sendotp')  }}" method="post"> {{ csrf_field()}}
                    <span class="login100-form-title">
                        Email OTP Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
    <!--===============================================================================================-->
    <script src="{{url('/public/assets')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{url('/public/assets')}}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{url('/public/assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{url('/public/assets')}}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{url('/public/assets')}}/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{url('/public/assets')}}/js/main.js"></script>
</body>
</html>