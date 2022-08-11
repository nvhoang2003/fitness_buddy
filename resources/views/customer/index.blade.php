@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h2 id="icons" class="display-4 mb-0 col-md-8">Customer Index</h2>
        @include('Furniture_shop.partials.sessionmessage')
        <table class="table table-hover">
            <thead class="thead" style="background-color: #acb2c7">
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $c)
                <tr>
                    <td>{{$c->username}}</td>
                    <td>{{$c->fullname}}</td>
                    <td>{{$c->gender}}</td>
                    <td>{{$c->phone_number}}</td>
                    <td>{{$c->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

