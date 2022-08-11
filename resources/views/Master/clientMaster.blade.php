<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Boostrap 4.6.0  -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
          crossorigin="anonymous">
    <!-- Font Awesome -->>
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
          href={{asset("vendor/swiper/swiper-bundle.min.css"}}>
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
</head>
<body>
@include('partials.navClient')
@yield('main')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
            integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
            crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/5d48250cb6.js"
            crossorigin="anonymous"></script>

</body>
</html>