@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Are You Sure Want To Delete This Product?</h1>
        @include('product.productDetails')


        <form action="{{route('product.destroy', ['productID' =>$product->productID])}}" method="post">
            @csrf
            <div class="ml-5">
                <input type="hidden" name="productID" value="{{ $product->productID}}">
                <a type="button" href="{{route('product.index')}}" class="btn btn-info">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
