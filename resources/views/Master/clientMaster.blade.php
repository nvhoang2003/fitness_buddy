<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Boostrap  -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Font Awesome -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href={{asset("/vendor/glightbox/css/glightbox.min.css")}}>
    <!-- Range slider-->
    <link rel="stylesheet" href={{asset("/vendor/nouislider/nouislider.min.css")}}>
    <!-- Choices CSS-->
    <link rel="stylesheet"
          href={{asset("/vendor/choices.js/public/assets/styles/choices.min.css")}}>
    <!-- Swiper slider-->
    <link rel="stylesheet"
          href={{asset("/vendor/swiper/swiper-bundle.min.css")}}>
    <!-- Google fonts-->
    <link rel="stylesheet"
          href={{asset("https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap")}}>
    <link rel="stylesheet"
          href={{asset("https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap")}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet"
          href={{asset("/css/style.default.css")}}
          id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{asset("/css/custom.css")}}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{asset("/img/favicon.png")}}>
</head>
<body>

@include('partials.navClient')
@yield('main')

@yield('script')

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


    <script src={{asset("/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("/vendor/glightbox/js/glightbox.min.js")}}></script>
    <script src={{asset("/vendor/nouislider/nouislider.min.js")}}></script>
    <script src={{asset("/vendor/swiper/swiper-bundle.min.js")}}></script>
    <script src={{asset("/vendor/choices.js/public/assets/scripts/choices.min.js")}}></script>
    <script src={{asset("/js/front.js")}}></script>


</body>
</html>

