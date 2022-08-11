@extends('Master.adminMaster')

@section('main')
    <div class="container col-md-8">
        <h1 class="display-6">Account Info</h1>
        <form action="{{route('admin.updateInfo',['username' => old('username') ?? $user->username])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username" class="account">Username: {{$user->username}}</label>
                <input type="hidden" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username}}">
            </div>
            <div class="form-group">
                <label for="contact" class="account">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact') ?? $user->contact}}">
            </div>
            <div class="form-group">
                <label for="email" class="account">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email') ?? $user->email}}">
            </div>
            <div class="form-group">
                <label for="password" class="account">Password for confirm</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>

    <div class="container col-md-8">
        <h1 class="display-6">Change Password</h1>
        <form action="{{route('admin.updateInfo',['username' => old('username') ?? $user->username])}}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username}}">

            <div class="form-group">
                <label for="password" class="account">Old Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="new_password" class="account">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}">
            </div>

            <div class="form-group">
                <label for="retire_password" class="account">Retire Password</label>
                <input type="password" class="form-control" id="retire_password" name="retire_password" value="{{old('retire_password')}}">
            </div>
            <button type="submit" class="btn btn-dark">Change Password</button>
        </form>
    </div>
@endsection

