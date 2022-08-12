<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendorr/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url({{asset('images/bg-01.jpg')}});">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="{{route('auth.signin')}}" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                @include('auth.sessionMessage')

                @csrf
                <div class="wrap-input100">
                    <input class="input100" type="text" name="username" placeholder="Username" value="{{old('username')}}">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                @if($errors->has('username'))
                    @foreach($errors->get('username') as $e)
                        <span class="danger help-box" style="color: #6EDCD9;">
                            <i class="bi bi-x"></i>
                            {{$e}}
                        </span>
                    @endforeach
                @endif

                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                @if($errors->has('password'))
                    @foreach($errors->get('password') as $e)
                        <span class="help-box" style="color: #6EDCD9;">
                            <i class="bi bi-x"></i>
                            {{$e}}
                        </span>
                    @endforeach
                @endif

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('/vendorr/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendorr/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendorr/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('/vendorr/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendorr/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendorr/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('/vendorr/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendorr/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/js/main.js')}}"></script>

</body>
</html>
