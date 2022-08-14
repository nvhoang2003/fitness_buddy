@extends('Master.adminMaster')

@section('main')
    @foreach($feedback as $f)
    <div class="card bg-light m-5 p-3 container">
        <p class="bg-info">{{$f->date_feedback}}</p>
        <p>{{$f->feedback}}</p>
    </div>
    @endforeach
@endsection
