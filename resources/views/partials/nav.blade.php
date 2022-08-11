<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand mb-0 h1" href="#">Thrift Fashion</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="#">Admin
                    <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">Customer
                    <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View all</a>
                    <a class="dropdown-item" href="#">New Category</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View all</a>
                    <a class="dropdown-item" href="#">New Product</a>
                </div>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Brand
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">View all Brand</a>
                    <a class="dropdown-item" href="#">New Brand</a>
                </div>
            </li>

        </ul>
        @php
            $userSession=   Illuminate\Support\Facades\Session::has('username') ?
                            Illuminate\Support\Facades\Session::get('username') : '';
        @endphp
        <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <a class="nav-link" href="#">
                    <i class="bi bi-person-fill"></i>
                    {{$userSession}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route("auth.signout")}}">
                    <i class="bi bi-arrow-left"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
