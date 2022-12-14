@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">Edit Style</h1>

        <form action="{{route('style.edit',['styleID' => old('styleID') ?? $style->styleID])}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('style.styleFields')

            <a type="button" class="btn btn-info" href="{{route('style.index')}}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <button type="submit" class="btn btn-dark">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </form>
    </div>
@endsection
