@extends('Master.clientMaster')
@section('main')

    <div class="container">

        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Product</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.homepage')}}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.shop')}}">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
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
                            <!-- PRODUCT DETAILS-->
                        <div class="col-lg-11">
                            <h1>{{$product->product_name}}</h1>
                            <p class="text-muted lead">${{$price}}</p>
                            <p class="text-sm mb-4" style="font-size: 20px">{{$product->description}}</p>
                            <div class="row align-items-stretch mb-4">
                                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href={{route("client.cart")}}>Add to cart</a></div>
                            </div><a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br>
                            <ul class="list-unstyled small d-inline-block">
                                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SIZE:</strong><span class="ms-2 text-muted">{{$product->size}}</span></li>
                                {{--                            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Style:</strong><a class="reset-anchor ms-2" href="#!" style="text-transform: uppercase; text-decoration: none">{{$product->style}}</a></li>--}}
                                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Color:</strong><a class="reset-anchor ms-2" href="#!" style="text-transform: uppercase; text-decoration: none">{{$product->color}}</a></li>
                                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Status:</strong><a class="reset-anchor ms-2" href="#!" style="text-transform: uppercase; text-decoration: none">{{$product->product_status}}</a></li>
                                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Date added:</strong><a class="reset-anchor ms-2" style="text-transform: uppercase; text-decoration: none">{{$product->launch_date}}</a></li>
                            </ul>
                        </div>
                    </div>
                        </div>  <!-- RELATED PRODUCTS-->
                        <hr class="md-8">
                        <h2 class="h5 text-uppercase mb-4">Related products</h2>

                        <div class="row">
                            <div class="MultiCarousel" data-items="1,2,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                <div class="MultiCarousel-inner">
                                    {{--                          @foreach($productWithStyle as $p)--}}
                                    {{--                              <a href="{{route('client.details',['productID' => $p->productID])}}">--}}
                                    {{--                                  <div class="item">--}}
                                    {{--                                      <div class="pad25">--}}
                                    {{--                                          <img class="card-img-top" src="/image/{{$p->image}}" alt="Card image cap">--}}
                                    {{--                                          <div class="card-body">--}}
                                    {{--                                              <h5 class="card-title">{{$p->product_name}}</h5>--}}
                                    {{--                                              <p class="card-text">$ {{$p->price}}</p>--}}
                                    {{--                                          </div>--}}
                                    {{--                                      </div>--}}
                                    {{--                                  </div>--}}
                                    {{--                              </a>--}}
                                    {{--                          @endforeach--}}
                                </div>
                                {{--                      <button class="btn btn-primary leftLst"><</button>--}}
                                <div class="row">
                                    @foreach($product1 as $p1)
                                        <div class="col-3">
                                            <div class="product text-center">
                                                <div class="mb-3 position-relative">
                                                    <div class="badge text-white bg-">
                                                    </div>
                                                    <a class="" href="{{route('client.details',['productID' => $p1->productID])}}">
                                                        <img  src="{{asset('images/product/'.$p1->image)}}" width="200px" height="250px"  alt="...">
                                                    </a>
                                                    <div class="product-overlay">
                                                        <ul class="mb-0 list-inline">
                                                            <li class="list-inline-item m-0 p-0">
                                                                <a class="btn btn-sm btn-outline-dark" href="#!">
                                                                    <i class="far fa-heart"></i></a>
                                                            </li>
                                                            <li class="list-inline-item m-0 p-0">
                                                                <a class="btn btn-sm btn-dark" href="">Add to cart</a>
                                                            </li>
                                                            <li class="list-inline-item mr-0">
                                                                <a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal">
                                                                    <i class="fas fa-expand"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h6> <a class="reset-anchor" href="{{route('client.details',['productID' => $p1->productID])}}">{{$p1->product_name}}</a></h6>
                                                <p class="small text-muted">${{$p1->price}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";
            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });
            ResCarouselSize();
            $(window).resize(function () {
                ResCarouselSize();
            });
            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);
                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });
                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");
                });
            }
            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values;
                values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e === 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");
                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e === 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");
                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }
            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }
        });
    </script>
@endsection
