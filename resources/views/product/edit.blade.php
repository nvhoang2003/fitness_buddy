@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h2 class="text-center">Please Enter New Information Of Your Product</h2>

        <form action="{{route('product.update',['productID'=>$product->productID])}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('product.productFields')
            <a type="button" href="{{route('product.index')}}" class="btn btn-info">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <button type="submit" class="btn btn-dark">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </form>
    </div>
@endsection
