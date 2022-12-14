<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand mb-0 h1" href="{{route('product.index')}}">Thrift Fashion</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{route('customer.index')}}">Customer
                    <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Style
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('style.index')}}">View all</a>
                    <a class="dropdown-item" href="{{route('style.create')}}">New Style</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('product.index')}}">View all</a>
                    <a class="dropdown-item" href="{{route('product.create')}}">New Product</a>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('feedback.index')}}">FeedBack
                    <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        @php
            $userSession=   Illuminate\Support\Facades\Session::has('username') ?
                            Illuminate\Support\Facades\Session::get('username') : '';
        @endphp
        <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{route('admin.confirmUpdateInfo', ['username' => $userSession])}}">
                    <i class="bi bi-person-fill"></i>
                    {{$userSession}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route("auth.signout")}}">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
