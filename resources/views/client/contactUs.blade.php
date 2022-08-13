@extends('Master.clientMaster')

@section('main')
    <div class="container">
        <section class="py-5 bg-light" style="height: 200px; background: url('/icons/contactUs.jpg')">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0" style="color: #f9f7f4">Contact Us</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 ">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.homepage')}}">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.cart')}}">Cart</a></li>
                              </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section style="padding-top: 3em; padding-bottom: 3em">
            <div class="container overflow-hidden">
                <div class="row g-3">
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #224577">
                            <span>
                                <i class="fa-brands fa-facebook-f" style="size: 100px"></i>
                            </span>
                                &nbsp; Facebook
                            </div>
                        </a>

                    </div>
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #d01b35">
                            <span>
                                <i class="fa-solid fa-envelope" style="size: 100px"></i>
                            </span>
                                &nbsp; thrift.fashion@gmail.com
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #8a4908">
                            <span>
                                <i class="fa-brands fa-instagram" style="size: 100px"></i>
                            </span>
                                &nbsp; Instagram
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #9343c0">
                            <span>
                                <i class="fa-brands fa-facebook-messenger" style="size: 100px"></i>
                            </span>
                                &nbsp; Messenger
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #13011e">
                            <span>
                                <i class="fa-brands fa-tiktok" style="size: 100px"></i>
                            </span>
                                &nbsp; TikTok
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" style="text-decoration: none">
                            <div class="p-4 " style="background-color: #1b3b26">
                            <span>
                                <i class="fa-solid fa-phone" style="size: 100px"></i>
                            </span>
                                &nbsp;  +84123456789
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="" style="text-decoration: none">
                            <div class="p-4 " style="background-color: rgba(194,113,113,0.8)">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                                &nbsp; Address
                            </div>
                        </a>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
