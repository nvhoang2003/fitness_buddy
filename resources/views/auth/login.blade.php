@extends('Master.authMaster')

@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">Login</div>
                    <div class="card-body">
                        @include('partials.errors')
                        @include('auth.sessionMessage')
                        <form action="{{route('auth.signin')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <span class="col-md-4 col-form-label text-md-right">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" value="{{old('username')}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="col-md-4 col-form-label text-md-right">
                                    <i class="fa-solid fa-lock-keyhole"></i>
                                </span>

                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

