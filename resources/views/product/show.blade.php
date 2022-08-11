@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Product Details</h1>
        @include('product.productDetails')
        <a type="button" href="{{route('product.index')}}" class="btn btn-info">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
@endsection
