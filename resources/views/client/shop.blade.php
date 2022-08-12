@extends('Master.clientMaster')

@section('main')

    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Shop</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.homepage')}}">Home</a></li>
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
                    <div class="col-lg-3 order-2 order-lg-1">
                        <h5 class="text-uppercase mb-4">Categories</h5>
                        <?php
                        $style = \App\Repository\ProductRepos::getAllStyle();
                        $size = \App\Repository\ProductRepos::getAllSize();
                        $color = \App\Repository\ProductRepos::getAllColor();
                        ?>
                        <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Style</strong></div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            @foreach($style as $s)

                            <li class="mb-2">
                                <a style="text-decoration: none #010309" class="reset-anchor" href="#">{{ $s->style_name }}</a>
                            </li>

                            @endforeach
                        </ul>
                        <div class="py-2 px-4 bg-dark text-white mb-3">
                            <strong class="small text-uppercase fw-bold">Size</strong>
                        </div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            @foreach($size as $size)
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="{{$size->sizeID}}" name="size">
                                <label class="form-check-label" for="checkbox_2">{{ $size->size_name }}</label>
                            </div>
                            @endforeach

                        </ul>
                        <div class="py-2 px-4 bg-dark text-white mb-3">
                            <strong class="small text-uppercase fw-bold">Price</strong>

                        </div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="price1" name="price">
                                <label class="form-check-label" for="checkbox_2">< 20$</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="price2" name="price">
                                <label class="form-check-label" for="checkbox_2">20$ - 40$</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="price3" name="price">
                                <label class="form-check-label" for="checkbox_2">40$ - 60$</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="price4" name="price">
                                <label class="form-check-label" for="checkbox_2">60$ - 80$</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" id="price5" name="price">
                                <label class="form-check-label" for="checkbox_2"> > 80$</label>
                            </div>
                        </ul>

                        <div class="py-2 px-4 bg-dark text-white mb-3">
                            <strong class="small text-uppercase fw-bold">Color</strong>
                        </div>
                        <div class="row">
                            <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                                @foreach($color as $c)
                                    <div class="form-check mb-1 col">
                                        <input class="form-check-input" type="checkbox" id="{{$c->colorID}}" name="color{{$c->colorID}}" value="{{ $c->colorID }}">
                                        <label class="form-check-label" for="checkbox_2">{{ $c->color_name }}</label>
                                    </div>
                                @endforeach

                            </ul>

                        </div>

                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker" data-customclass="form-control form-control-sm">
                                            <option value>Sort By </option>
                                            <option value="default">Default sorting </option>
                                            <option value="popularity">Popularity </option>
                                            <option value="low-high">Price: Low to High </option>
                                            <option value="high-low">Price: High to Low </option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($product as $p)

                            <div class="col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white bg-">

                                        </div>
                                            <a class="d-block" href="{{route('client.details',['productID' => $p->productID])}}">
                                                <img  src="{{asset('/images/product/'.$p->image)}}" width="200px" height="250px"  alt="...">
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
                                    <h6> <a class="reset-anchor" href="{{route('client.details',['productID' => $p->productID])}}">Kui Ye Chen’s AirPods</a></h6>
                                    <p class="small text-muted">$250</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- PAGINATION-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center justify-content-lg-end">
                                <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>
                                <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>
                                <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>
                                <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <!-- Nouislider Config-->
    <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
                to: function ( value ) {
                    return '$' + value;
                },
                from: function ( value ) {
                    return value.replace('', '');
                }
            }
        });

    </script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite -
        //   see more here
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection
@section('script')
    <script>
        (function() {
            $("#range").slider({
                range: "min",
                max: 100,
                value: 50,
                slide: function(e, ui) {
                    $("#currentVal").html(ui.value);
                }
            });

        }).call(this);
    </script>
@endsection
