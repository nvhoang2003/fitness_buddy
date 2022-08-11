@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">New Product</h1>

        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('product.productFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

@endsection
