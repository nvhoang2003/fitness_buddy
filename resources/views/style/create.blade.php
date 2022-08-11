@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Update Style</h1>
        @include('partials.ErrorsAll')
        @include('partials.sessionmessage')
        <table class="table table-hover">
            <thead class="text-dark" style="background-color: #acb2c7">
            <tr>
                <th scope="col">Style Name</th>
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($style as $s)
                <tr>
                    <th scope="row">{{$s->style_name}}</th>
                    <td>{{$s->image}}</td>
                    <td>{{$s->description}}</td>
                    <td><a type="button" class="btn btn-primary btn-sm"
                           href="{{ route('style.show', ['styleID' => $s->styleID]) }}"
                        >Details</a>
                    </td>
                    <td><a type="button" class="btn btn-success btn-sm"
                           href="{{ route('style.edit', ['styleID' => $s->styleID]) }}"
                        >Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
