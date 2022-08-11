@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Style Details</h1>
        <br>
        <dl class="row">
            <dt class="col-sm-3">Style name</dt>
            <dd class="col-sm-9">{{ $style->style_name }}</dd>

            <dt class="col-sm-3">Image</dt>
            <dd class="col-sm-9">{{ $style->image }} </dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $style->description }}</dd>
        </dl>
        <br>

        <a type="button" href="{{route('style.index')}}" class="btn btn-info">Back to Index</a>
    </div>
@endsection
