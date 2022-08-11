@extends('Master.adminMaster')

@section('main')
    <div class="container col-md-8">
            <h1 class="display-6">Account Info</h1>
            @include('partials.sessionMessage')
            <form action="{{route('admin.adminUpdateInfo',['username' => old('username') ?? $user->username])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username" class="account">Username: {{$user->username}}</label>
                    <input type="hidden" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username}}">
                </div>
                <div class="form-group">
                    <label for="contact" class="account">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact') ?? $user->contact}}">
                    @if($errors->has('contact'))
                        @foreach($errors->get('contact') as $e)
                            <span class="danger help-box">
                            <i class="bi bi-x"></i>
                            {{$e}}
                        </span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="account">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email') ?? $user->email}}">
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
                    <label for="password" class="account">Password for confirm</label>
                    <input type="password" class="form-control" id="password" name="password" >
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $e)
                            <span class="danger help-box">
                            <i class="bi bi-x"></i>
                            {{$e}}
                        </span>
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-dark">Save</button>
                <a type="button" href="{{route('admin.adminChangePassword', ['username' => $user->username])}}"
                   class="btn btn-info">
                    Change Password
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </form>
        </div>
@endsection

