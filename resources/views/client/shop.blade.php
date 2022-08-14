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
                        ?>
                        <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Style</strong></div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            @php
                                if (isset($styleID)){
                                    $ID = $styleID;
                                } else{
                                    $ID = 0;
                                }
                            @endphp

                            @foreach($style as $s)
                            <li class="mb-2">
                                <a style="text-decoration: none" class="reset-anchor"
                                href={{route('client.style',['styleID' => $s->styleID])}}>
                                <p
                                    class="{{$s->styleID == $ID ?'text-warning' : ''}} text-uppercase"
                                >{{$s->style_name}}</p>                                </a>
                            </li>

                            @endforeach
                        </ul>

                        <div class="py-2 px-4 bg-dark text-white mb-3">
                            <strong class="small text-uppercase fw-bold">Price</strong>

                        </div>
                        @php
                            if(!isset($priceID)){
                                $priceID =0;
                            }
                        @endphp
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <a style="text-decoration: none" class="reset-anchor"
                               href={{route('client.price',[1])}}>
                                <p
                                    class="{{ $priceID == 1 ?'text-warning' : ''}} text-uppercase"
                                ><20$</p>
                            </a>
                            <a style="text-decoration: none" class="reset-anchor"
                               href={{route('client.price',[2])}}>
                                <p
                                    class="{{ $priceID == 2 ?'text-warning' : ''}} text-uppercase"
                                >20$-40$</p>
                            </a>
                            <a style="text-decoration: none" class="reset-anchor"
                               href={{route('client.price',[3])}}>
                                <p
                                    class="{{ $priceID == 3 ?'text-warning' : ''}} text-uppercase"
                                ><40$-60$</p>
                            </a>
                            <a style="text-decoration: none" class="reset-anchor"
                               href={{route('client.price',[4])}}>
                                <p
                                    class="{{ $priceID == 4 ?'text-warning' : ''}} text-uppercase"
                                >60$-80$</p>
                            </a>
                            <a style="text-decoration: none" class="reset-anchor"
                               href={{route('client.price',[5])}}>
                                <p
                                    class="{{ $priceID == 5 ?'text-warning' : ''}} text-uppercase"
                                >>80$</p>
                            </a>
                        </ul>
                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="offset-6 col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                    <li class="list-inline-item">
                                        <select data-customclass="form-control form-control-sm">
                                            <option value>Sort By </option>
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
                                            <a class="" href="{{route('client.details',['productID' => $p->productID])}}">
                                                <img  src="{{asset('images/product/'.$p->image)}}" width="260px" height="300px"  alt="...">
                                            </a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline">
                                                <li class="list-inline-item m-0 p-0">
                                                    <a class="btn btn-sm btn-dark" href="{{route("client.cart")}}">Add to cart</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor" href="{{route('client.details',['productID' => $p->productID])}}">{{$p->product_name}}</a></h6>
                                    <p class="small text-muted">${{$p->price}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- PAGINATION-->
{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination justify-content-center justify-content-lg-end">--}}
{{--                                <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>--}}
{{--                                <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>--}}
{{--                                <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>--}}
{{--                                <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>--}}
{{--                                <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
                        <div class="center">
                            {{$product->links()}}
                        </div>
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
