<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href={{asset("vendor/glightbox/css/glightbox.min.css")}}>
    <!-- Range slider-->
    <link rel="stylesheet" href={{asset("vendor/nouislider/nouislider.min.css")}}>
    <!-- Choices CSS-->
    <link rel="stylesheet" href={{asset("vendor/choices.js/public/assets/styles/choices.min.css")}}>
    <!-- Swiper slider-->
    <link rel="stylesheet" href={{asset("vendor/swiper/swiper-bundle.min.css"}}>
    <!-- Google fonts-->
    <link rel="stylesheet" href={{asset("https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap")}}>
    <link rel="stylesheet" href={{asset("https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap")}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet" href={{asset("public/css/style.default.css")}} id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{asset("img/favicon.png")}}>
</head>

<body>
@include('partials.navClient')
@yield('main')
</body>
</html>
