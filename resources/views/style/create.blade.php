@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">New Style</h1>

        <form action="{{route('style.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('style.styleFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

@endsection
