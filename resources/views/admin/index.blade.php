@extends('Master.adminMaster')

@section('main')
    <div class="container col-md-8">
        <h1 class="display-6">Account Info</h1>
        <dd class="col-sm-10 account">
            Username: HT_Faker
            <a class="end-icon">
                <i class="bi bi-pencil-square"></i>
            </a>
        </dd>
        <dd class="col-sm-10 account">
            Username: HT_Faker
            <a class="end-icon">
                <i class="bi bi-pencil-square"></i>
            </a>
        </dd>
        <div class="form-group">
            <label for="password" class="font-weight-bold">Confirm Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password') ?? $product->password}}">
        </div>
    </div>

    <div class="container col-md-8">
        <h1 class="display-6">Change Password</h1>
        <div class="form-group">
            <label for="password" class="font-weight-bold">Old Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password') ?? $product->password}}">
        </div>

        <div class="form-group">
            <label for="new_password" class="font-weight-bold">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}">
        </div>

        <div class="form-group">
            <label for="retire_password" class="font-weight-bold">Retire Password</label>
            <input type="retire_password" class="form-control" id="retire_password" name="retire_password" value="{{old('retire_password')}}">
        </div>
    </div>
@endsection

