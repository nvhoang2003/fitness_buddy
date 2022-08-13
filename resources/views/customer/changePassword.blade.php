@extends('Master.clientMaster')

@section('main')
    <div class="container col-md-8">
        <h1 class="display-6">Change Password</h1>
        <form action="{{route('client.changePassword',['username' => old('username') ?? $user->username])}}" method="post">
            @csrf
            @include('auth.formChangePassword')
            <a type="button" href="{{route('client.updateInfo', ['username' => $user->username])}}" class="btn btn-info">
                <i class="fa-solid fa-arrow-left"></i>
                Return
            </a>
            <button type="submit" class="btn btn-dark">Change Password</button>
        </form>
    </div>
@endsection

