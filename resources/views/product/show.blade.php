@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Product Details</h1>
        @include('Furniture_shop.products.productDetails')
        <a type="button" href="{{route('product.confirmInfo.blade.php')}}" class="btn btn-info">Back to Index</a>
    </div>
@endsection
