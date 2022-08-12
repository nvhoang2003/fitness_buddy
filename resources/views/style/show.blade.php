@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Style Details</h1>
        @include('style.styleDetails')
        <a type="button" class="btn btn-info" href="{{route('style.index')}}">
            <i class="bi bi-backspace"> Back to Index</i>
        </a>
    </div>
@endsection
