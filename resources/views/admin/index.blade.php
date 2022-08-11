@extends('Master.adminMaster')

@section('main')
    <div class="container col-md-8">
        <h1 class="display-6">Account Info</h1>
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
                            {{$e}}
                        </span>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>

    <div class="container col-md-8">
        <h1 class="display-6">Change Password</h1>
        <form action="{{route('admin.adminChangePassword',['username' => old('username') ?? $user->username])}}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username}}">

            <div class="form-group">
                <label for="password" class="account">Old Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $e)
                        <span class="danger help-box">
                            {{$e}}
                        </span>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="new_password" class="account">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}">
                @if($errors->has('new_password'))
                    @foreach($errors->get('new_password') as $e)
                        <span class="danger help-box">
                            {{$e}}
                        </span>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="retire_password" class="account">Retire Password</label>
                <input type="password" class="form-control" id="retire_password" name="retire_password" value="{{old('retire_password')}}">
                @if($errors->has('retire_password'))
                    @foreach($errors->get('retire_password') as $e)
                        <span class="danger help-box">
                            {{$e}}
                        </span>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-dark">Change Password</button>
        </form>
    </div>
@endsection

