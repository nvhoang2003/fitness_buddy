@extends('Master.loginCustomerMaster')

@section('main')
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form action="{{route('auth.customerSignup')}}" method="POST" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Your Name"/>
                        @if($errors->has('username'))
                            @foreach($errors->get('username') as $e)
                                <span class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="text" name="email" id="email" placeholder="Your Email"/>
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $e)
                                <span class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $e)
                                <span class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="re_password"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        @if($errors->has('re_password'))
                            @foreach($errors->get('re_password') as $e)
                                <span class="danger help-box">
                                    <i class="bi bi-x"></i>
                                    {{$e}}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('images/signup-customer-image.jpg') }}" alt="sign up image"></figure>
                <a href="{{route('auth.customerAsk')}}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
@endsection
