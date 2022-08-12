<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Boostrap 5.0.2  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href={{asset("vendor/glightbox/css/glightbox.min.css")}}>
    <!-- Range slider-->
    <link rel="stylesheet" href={{asset("vendor/nouislider/nouislider.min.css")}}>
    <!-- Choices CSS-->
    <link rel="stylesheet"
          href={{asset("vendor/choices.js/public/assets/styles/choices.min.css")}}>
    <!-- Swiper slider-->
    <link rel="stylesheet"
          href={{asset("vendor/swiper/swiper-bundle.min.css")}}>
    <!-- Google fonts-->
    <link rel="stylesheet"
          href={{asset("https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap")}}>
    <link rel="stylesheet"
          href={{asset("https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap")}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet"
          href={{asset("public/css/style.default.css")}}
          id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{asset("img/favicon.png")}}>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>

@include('partials.navClient')
@yield('main')
@include('partials.client_footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5d48250cb6.js"
            crossorigin="anonymous"></script>


    <script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("vendor/glightbox/js/glightbox.min.js")}}></script>
    <script src={{asset("vendor/nouislider/nouislider.min.js")}}></script>
    <script src={{asset("vendor/swiper/swiper-bundle.min.js")}}></script>
    <script src={{asset("vendor/choices.js/public/assets/scripts/choices.min.js")}}></script>
    <script src={{asset("js/front.js")}}></script>


</body>
</html>

