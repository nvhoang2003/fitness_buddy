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
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
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
                        <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Fashion &amp; Acc</strong></div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="#!">Women's T-Shirts</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Men's T-Shirts</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Dresses</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Novelty socks</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Women's sunglasses</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Men's sunglasses</a></li>
                        </ul>
                        <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold">Health &amp; Beauty</strong></div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="#!">Shavers</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">bags</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Cosmetic</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Nail Art</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Skin Masks &amp; Peels</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Korean cosmetics</a></li>
                        </ul>
                        <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold">Electronics</strong></div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal mb-5">
                            <li class="mb-2"><a class="reset-anchor" href="#!">Electronics</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">USB Flash drives</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Headphones</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Portable speakers</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Cell Phone bluetooth headsets</a></li>
                            <li class="mb-2"><a class="reset-anchor" href="#!">Keyboards</a></li>
                        </ul>
                        <h6 class="text-uppercase mb-4">Price range</h6>
                        <div class="price-range pt-4 mb-5">
                            <div id="range"></div>
                            <div class="row pt-2">
                                <div class="col-6"><strong class="small fw-bold text-uppercase">From</strong></div>
                                <div class="col-6 text-end"><strong class="small fw-bold text-uppercase">To</strong></div>
                            </div>
                        </div>
                        <h6 class="text-uppercase mb-3">Show only</h6>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_1">
                            <label class="form-check-label" for="checkbox_1">Returns Accepted</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_2">
                            <label class="form-check-label" for="checkbox_2">Returns Accepted</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_3">
                            <label class="form-check-label" for="checkbox_3">Completed Items</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_4">
                            <label class="form-check-label" for="checkbox_4">Sold Items</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_5">
                            <label class="form-check-label" for="checkbox_5">Deals &amp; Savings</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="checkbox_6">
                            <label class="form-check-label" for="checkbox_6">Authorized Seller</label>
                        </div>
                        <h6 class="text-uppercase mb-3">Buying format</h6>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_1">
                            <label class="form-check-label" for="radio_1">All Listings</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_2">
                            <label class="form-check-label" for="radio_2">Best Offer</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_3">
                            <label class="form-check-label" for="radio_3">Auction</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_4">
                            <label class="form-check-label" for="radio_4">Buy It Now</label>
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
                                                <img class="img-fluid w-100" src="{{asset('/images/product/'.$p->image)}}" alt="...">
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
    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row py-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Customer services</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#!">Online Stores</a></li>
                        <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Company</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">What We Do</a></li>
                        <li><a class="footer-link" href="#!">Available Services</a></li>
                        <li><a class="footer-link" href="#!">Latest Posts</a></li>
                        <li><a class="footer-link" href="#!">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-3">Social media</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Twitter</a></li>
                        <li><a class="footer-link" href="#!">Instagram</a></li>
                        <li><a class="footer-link" href="#!">Tumblr</a></li>
                        <li><a class="footer-link" href="#!">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4" style="border-color: #1d1d1d !important">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
                        <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
</div>
</body>
</html>
