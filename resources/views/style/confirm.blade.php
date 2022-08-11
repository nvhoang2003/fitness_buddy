@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-5">Are you sure want to delete?</h1>

        @include('style.styleDetails')

        <form action="{{route('style.destroy', ['style_id' => $style->style_id])}}" method="post">
            @csrf
            <input type="hidden" name="category_id" value="{{$style->style_id}}">
            @if($product === [])
                <button type="submit" class="btn btn-danger"> Delete </button>
            @else
                <button type="button" class="btn btn-dark">Product of this Category already exist !</button>
            @endif

            <a href="{{route('style.index')}}" class="btn btn-info"> Cancel </a>
        </form>
    </div>

@endsection
