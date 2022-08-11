@extends('masters.viewc1master')
@section('main')
    @include('partials.modal')
    <div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light"  style="background: url({{asset("")}})">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Shop</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('viewC1.index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                @include('viewC1.sidebar')
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-sm text-muted mb-0">Showing 1–12 of 120 results</p>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                                <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li>
                                <li class="list-inline-item">
                                    <select class="selectpicker" data-customclass="form-control form-control-sm">
                                        <option value>Sort By </option>
                                        <option value="low-high">Price: Low to High </option>
                                        <option value="high-low">Price: High to Low </option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">

                        <!-- PRODUCT-->

                        @foreach($product as $p)
                            @php
                                $price = number_format($p->price);
                            @endphp

                            <div class="col-lg-4 col-sm-6">
                                <form class="of-hidden">
                                    @csrf
                                    <input type="hidden" id="id1" value="{{$p->product_code}}">
                                    <input type="hidden" id="id2" value="{{$price}}">
                                    <input type="hidden" id="id3" value="{{$p->fabric}}">
                                    <input type="hidden" id="id4" value="{{$p->size}}">
                                    <input type="hidden" id="id5" value="{{$p->urlimg}}">
                                </form>
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white bg-"></div><a class="d-block" href="{{route('viewC1.detail', ['id' => $p->CID])}}"><img class="" src="{{asset("images/product/".$p->urlimg)}}" width="200px" height="250px" alt="..."></a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline" style="padding-top: 1rem">
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li>
                                                <li class="list-inline-item mr-0">
                                                    <a class="btn btn-sm btn-outline-dark"  data-target="#sosanh" data-toggle="modal" >
                                                        <i class="fas fa-expand"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor" href="{{route('viewC1.detail', ['id' => $p->CID])}}">{{$p->product_code}}</a></h6>
                                    <p class="small text-muted">{{$price}}$</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            <li class="page-item mx-1"><a class="page-link" href="" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item mx-1 "><a class="page-link" href="{{route('viewC1.shop',['offset'=>0])}}">1</a></li>
                            <li class="page-item mx-1"><a class="page-link" href="{{route('viewC1.shop',['offset'=>12])}}">2</a></li>
                            <li class="page-item mx-1"><a class="page-link" href="{{route('viewC1.shop',['offset'=>24])}}">3</a></li>
                            <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                        {{--                                {{$product->link()}}--}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection


@section('script')
    <script>
        $('#sosanh').modal()
    </script>

@endsection
