@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Edit Style</h1>
        @include('partials.errors')

        <form action="{{route('style.edit',['styleID' => old('styleID') ?? $style->styleID])}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('style.styleFields')

            <button type="submit" class="btn btn-dark">Submit</button>
            <a type="button" class="btn btn-info" href="{{route('style.index')}}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </form>
    </div>
@endsection
