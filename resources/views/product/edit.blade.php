@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h2 class="text-center">Please Enter New Information Of Your Product</h2>
        @include('partials.errors')

        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('product.productFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
