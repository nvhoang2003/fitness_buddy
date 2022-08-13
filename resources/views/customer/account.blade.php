@extends('Master.clientMaster')

@section('main')
    <div class="container col-md-8" style="padding: 30px 10px;">
        <h1 class="display-6">Account Info</h1>
        @include('partials.sessionMessage')
        <form action="{{route('client.updateInfo',['username' => old('username') ?? $user->username])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username" class="account">Username: {{$user->username}}</label>
                <input type="hidden" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username}}">
            </div>

            <div class="form-group">
                <label for="phonenumber">Your Telephone</label>
                <input type="tel" class="form-control" name="phonenumber" id="phonenumber" placeholder="Your Phonenumber" value="{{old('phonenumber' ?? $user->phonenumber)}}" />
                @if($errors->has('phonenumber'))
                    @foreach($errors->get('phonenumber') as $e)
                        <span class="danger help-box">
                            <i class="bi bi-x"></i>
                            {{$e}}
                        </span>
                    @endforeach
                @endif
                <i class="bi bi-gender-ambiguous"></i>
            </div>

            @php
                $gender = old('gender') ?? null;
            @endphp
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="genderM" value="Male"
                        {{ ($gender == 'Male') ? 'checked' : '' }}>

                    <label class="form-check-label" for="genderM">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="genderF" value="Female"
                        {{ ($gender == 'Female') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="genderF">
                        Female
                    </label>
                </div>
                @if($errors->has('gender'))
                    @foreach($errors->get('gender') as $e)
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
            <a type="button" href="{{route('client.changePassword', ['username' => $user->username])}}"
               class="btn btn-info">
                Change Password
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </form>
    </div>
@endsection

