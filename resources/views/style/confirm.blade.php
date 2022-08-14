@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">Are you sure want to delete this  style?</h1>
        <dl class="row">
            <div class="col-sm-7">
                <dd class="col-sm-9">
                    <img class="image" src="/images/style/{{ $style->image }}">
                </dd>
            </div>
            <div class="col-sm-5">

                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $style->style_name }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $style->description }}</dd>
            </div>
        </dl>


        <form action="{{route('style.destroy', ['styleID' => $style->styleID])}}" method="post">
            @csrf
            <input type="hidden" name="styleID" value="{{$style->styleID}}">
            @if($product === [])
                <button type="submit" class="btn btn-danger">  <i class="fa-solid fa-trash-can"></i> </button>
            @else
                <button type="button" class="btn btn-dark">Product of this Category already exist !</button>
            @endif

            <a href="{{route('style.index')}}" class="btn btn-info"> <i class="fa-solid fa-arrow-left"></i> </a>
        </form>
    </div>

@endsection

