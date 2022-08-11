@extends('Master.adminMaster')

@section('main')
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
                        <i class="bi bi-x"></i>
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
                        <i class="bi bi-x"></i>
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
                        <i class="bi bi-x"></i>
                        {{$e}}
                    </span>
                    @endforeach
                @endif
            </div>
            <a type="button" href="{{route('admin.confirmUpdateInfo', ['username' => $user->username])}}" class="btn btn-info">
                <i class="bi bi-box-arrow-left"></i>
                Return
            </a>
            <button type="submit" class="btn btn-dark">Change Password</button>
        </form>
    </div>
@endsection

