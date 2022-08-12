@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">Style Details</h1>
        @include('style.styleDetails')
        <a type="button" class="btn btn-info" href="{{route('style.index')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
@endsection
