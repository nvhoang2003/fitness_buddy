@extends('Master.clientMaster')
@section('main')
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                            <div class="swiper product-slider-thumbs">
                                <div class="swiper-slide h-auto swiper-thumb-item mb-3">
                                    <a href="{{asset("images/product/".$product->image)}}">
                                        <img class="img-fluid" src="{{asset("images/product/".$product->image)}}" alt="...">
                                    </a>
                                </div>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3">
                                        <a href="{{asset("images/product/".str_replace('1.jpg','2.jpg', $product->image))}}">
                                                <img class="img-fluid" src="{{asset("images/product/".str_replace('1.jpg','2.jpg', $product->image))}}" alt="...">
                                        </a>
                                    </div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3">
                                        <a href="{{asset("images/product/".str_replace('1.jpg','3.jpg', $product->image))}}">
                                            <img class="img-fluid" src="{{asset("images/product/".str_replace('1.jpg','3.jpg', $product->image))}}" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        Carousel Bootstrap--}}
                        <div class="col-sm-10 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset("images/product/".$product->image)}}" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset("images/product/".str_replace('1.jpg','2.jpg', $product->image))}}" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset("images/product/".str_replace('1.jpg','3.jpg', $product->image))}}" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <div class="col-lg-6">

                    @php
                        $price = number_format($product->price);
                        $size = explode('-',$product->size);
                    @endphp
                    <h1>{{$product->product_name}}</h1>
                    <p class="text-muted lead">{{$price}}$</p>
{{--                    <p class="text-sm mb-4">Size:<a class="btn-outline-warning btn-sm mx-1">{{$product[0]->size}}</a><a class="btn-outline-warning btn-sm mx-1">{{$size[1]}}</a><a class="btn-outline-warning btn-sm mx-1">{{$size[2]}}</a> </p>--}}
{{--                    <p class="text-sm mb-4">Collection: <a href="{{route('viewC1.viewcollection', ['id' => $collection1->CollectionID, 'offset' =>0])}}">{{$collection1->name}}</a></p>--}}
{{--                    <p class="text-sm mb-4">Stylist: <a href="{{route('viewC1.stylist', ['id' => $stylist1->SID])}}">{{$stylist1->name}}</a></p>--}}
{{--                    <div class="row align-items-stretch mb-4">--}}
{{--                        <div class="col-sm-5 pr-sm-0">--}}
{{--                            <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>--}}
{{--                                <div class="quantity">--}}
{{--                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>--}}
{{--                                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">--}}
{{--                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>--}}
{{--                    </div><a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br>--}}
{{--                    <form method="post" action="{{route('viewC1.download')}}" >--}}
{{--                        @csrf--}}
{{--                        <input type="hidden"  name="product_code" value="{{$product->product_code}}">--}}
{{--                        <input type="hidden"  name="fabric" value="{{$product->fabric}}">--}}
{{--                        <input type="hidden"  name="price" value="{{$price}}">--}}
{{--                        <input type="hidden"  name="size" value="{{$product->size}}">--}}
{{--                        <input type="hidden"  name="collection" value="{{$collection1->name}}">--}}
{{--                        <input type="hidden"  name="stylist" value="{{$stylist1->name}}">--}}
{{--                        <input type="hidden" name="img" value="{{asset('images/product/".$product->urlimg')}}">--}}
{{--                        <div >--}}
{{--                            <button type="submit"  class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center col-4 px-0">Download file word</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>

            <!-- DETAILS TABS-->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
            </ul>
            <div class="tab-content mb-5" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <h6 class="text-uppercase">Product description </h6>
                        <p class="text-muted text-sm mb-0">We only sell this one product. Please buy if you like it!.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="img/customer-1.png" alt="" width="50"/></div>
                                    <div class="ms-3 flex-shrink-1">
                                        <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                        <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                        <ul class="list-inline mb-1 text-xs">
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                        </ul>
                                        <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="img/customer-2.png" alt="" width="50"/></div>
                                    <div class="ms-3 flex-shrink-1">
                                        <h6 class="mb-0 text-uppercase">Khas Banhr</h6>
                                        <p class="small text-muted mb-0 text-uppercase">20 May 2019</p>
                                        <ul class="list-inline mb-1 text-xs">
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                        </ul>
                                        <p class="text-sm mb-0 text-muted">Good good good.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    </thead>
    </table>
    </div>
    </div>
    </div>
    </div>

@endsection
