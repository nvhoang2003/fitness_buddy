@extends('Master.loginCustomerMaster')

@section('main')
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('images/signin-customer-image.jpg')}}" alt="sign up image"></figure>
                <a href="{{route('auth.customerFormSignup')}}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form action="{{route('auth.customerSignin')}}" method="POST" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Your Name" value="{{old('usernamediv"/>
                        @if($errors->has('username'))
                            @foreach($errors->get('username') as $e)
                                <div class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $e)
                                <div class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
