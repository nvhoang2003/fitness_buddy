@php
    $offset = 1;
@endphp
<div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{route('viewC1.index')}}"><img  class="img-fluid" src="{{asset("images/logo/logo1.png")}}" alt="Logo" style="width:80px"></a>
                <button class="navbar-toggler navbar-toggler-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="{{route('viewC1.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="{{route('viewC1.shop',['offset'=>0])}}">Shop</a>
                        </li>
                        <li class="nav-item dropdown"><a type="button" class="nav-link dropdown-toggle" id="pagesDropdown"
                                                         href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Collection</a>
{{--                            <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">--}}
{{--                                <a class="dropdown-item border-0 transition-link" href="{{route('viewC1.shop',['offset'=>0])}}">View All Collection</a>--}}
{{--                                <a class="btn dropdown-toggle dropdown-item dropdown-menu-right"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Collection--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">--}}
{{--                                    @foreach($product as $c)--}}
{{--                                        <a class="dropdown-item" href="{{route('viewC1.viewcollection', ['id' => $c->CollectionID,'offset'=>0])}}">{{$c->name}}</a>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

{{--                            </div>--}}


                        </li>
                        <li class="nav-item dropdown"><a type="button" class="nav-link dropdown-toggle" id="pagesDropdown"
                                                         href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stylist</a>
                            <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item border-0 transition-link" href="{{route('viewC1.shop',['offset'=>0])}}">View All</a>
                                <a class="btn dropdown-toggle dropdown-item dropdown-menu-right"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Stylist
                                </a>
                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                    @foreach($style as $s)
                                        <a class="dropdown-item" href="{{route('viewC1.style', ['id' => $s->styleID])}}">{{$s->style_name}}</a>
                                    @endforeach
                                </div>
                            </div>

                        </li>

                    </ul>
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <li class="nav-item "><a class="nav-link" href=""> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small class="text-gray fw-normal">(2)</small></a></li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="material-icons">person</i>--}}
{{--                                <p class="d-lg-none d-md-block">--}}
{{--                                    {{ __('Account') }}--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">--}}
{{--                                <a href="" class="dropdown-item"> <i class="material-icons">person</i>{{\Illuminate\Support\Facades\Session::has('username')?--}}
{{--                           \Illuminate\Support\Facades\Session::get('username') : ''}}</a>--}}
{{--                                <a class="dropdown-item" href="{{route('viewC1.signout')}}">{{ __('Log out') }}</a>--}}
{{--                                <a class="dropdown-item" href="{{route('viewC1.signupcus')}}">{{ __('Sign Up') }}</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}

{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <form class="navbar-form" method="get" action="{{route('viewC1.search')}}">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control"  name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </header>
</div>
