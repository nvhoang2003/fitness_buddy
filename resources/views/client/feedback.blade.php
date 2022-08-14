@extends('Master.clientMaster')

@section('main')

    <div class="container">
        <section class="py-5 " style="background-color: #8d909a">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Feed Back</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 " >
                                <li class="breadcrumb-item"><a class="text-dark" href="{{route('client.homepage')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="row">
                <div class="col">
                    <img src="{{asset("icons/feedback.png")}}" class="d-block w-100" alt="...">
                </div>
                <div class="col">
                    <h3>Customer name</h3>
                    <div class="input-group">

                        <textarea class="form-control" aria-label="With textarea" placeholder="Please Comment here ...."></textarea>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <hr class="md-2">
@endsection
