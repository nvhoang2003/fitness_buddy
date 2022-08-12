@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Style Details</h1>
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
        <a type="button" href="{{route('style.index')}}" class="btn btn-info">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
@endsection
