<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thrift Fashion</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('loginCustomerfonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('loginCustomercss/style.css')}}">
</head>
<body>

<div class="main">
    @yield('main')
</div>

<script src="{{asset('loginCustomerVendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('loginCustomerjs/main.js')}}"></script>
@yield('script')
</body>
</html>
