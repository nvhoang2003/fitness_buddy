<div class="page-holder">
    <header class="header bg-white">
        <div class="container px-lg-3">
{{--            Navbar                                                                              --}}
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
{{--                Logo                                                                            --}}
                <a class="navbar-brand" href={{route("client.homepage")}}>
                    <span class="fw-bold text-uppercase text-dark">Thrift Fashion</span>
                </a>
{{--                nav item                                                                        --}}
                <button class="navbar-toggler navbar-toggler-end"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <!-- Hompage Link-->
                            <a class="nav-link"
                                           href={{route("client.homepage")}}
                            >Home</a>
                        </li>
                        <li class="nav-item">
                            <!--Product Link-->
                            <a class="nav-link"
                                           href={{route("client.shop")}}>Shop</a>
                        </li>
                    </ul>

{{--                add to cart, fake like page and login--}}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href={{route("client.cart")}}>
                                <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart
                            </a>
                        </li>
                        @php
                            $userSession=   Illuminate\Support\Facades\Session::has('customer_name') ?
                            Illuminate\Support\Facades\Session::get('customer_name') : null;
                        @endphp
                        <li class="nav-item">
                            @if($userSession === null)
                                <a class="nav-link" href={{route("auth.customerAsk")}}>
                                    <i class="fas fa-user me-1 text-gray fw-normal"></i>
                                    Login
                                </a>
                            @else
                                <a class="nav-link" href={{route("client.updateInfo",['username' => $userSession])}}>
                                    <i class="fas fa-user me-1 text-gray fw-normal"></i>
                                    {{$userSession}}
                                </a>
                            @endif
                        </li>
                        @if($userSession !== null)
                            <li class="nav-item">
                                <a class="nav-link " href="{{route("auth.customerSignout")}}">
                                    <i class="bi bi-box-arrow-left"></i>
                                    Logout
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>
