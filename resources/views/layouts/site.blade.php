<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Plagiarism checker') }}</title>

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<!-- Favicon and Touch Icons -->
<link href={{asset("site/assets/images/favicon.png")}} rel="shortcut icon" type="image/png">
<link href={{asset("site/assets/images/apple-touch-icon.png")}} rel="apple-touch-icon">
<link href={{asset("site/assets/images/apple-touch-icon-72x72.png")}} rel="apple-touch-icon" sizes="72x72">
<link href={{asset("site/assets/images/apple-touch-icon-114x114.png")}} rel="apple-touch-icon" sizes="114x114">
<link href={{asset("site/assets/images/apple-touch-icon-144x144.png")}} rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href={{asset("site/assets/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
<link href={{asset("site/assets/css/jquery-ui.min.css")}} rel="stylesheet" type="text/css">
<link href={{asset("site/assets/css/animate.css")}} rel="stylesheet" type="text/css">
<link href={{asset("site/assets/css/css-plugin-collections.css")}} rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href={{asset("site/assets/css/menuzord-skins/menuzord-rounded-boxed.css")}} rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href={{asset("site/assets/css/style-main.css")}} rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href={{asset("site/assets/css/preloader.css")}} rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href={{asset("site/assets/css/custom-bootstrap-margin-padding.css")}} rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href={{asset("site/assets/css/responsive.css")}} rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href={{asset("site/assets/css/style.css")}} rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href={{asset("site/assets/js/revolution-slider/css/settings.css")}} rel="stylesheet" type="text/css"/>
<link  href={{asset("site/assets/js/revolution-slider/css/layers.css")}} rel="stylesheet" type="text/css"/>
<link  href={{asset("site/assets/js/revolution-slider/css/navigation.css")}} rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href={{asset("site/assets/css/colors/theme-skin-color-set-1.css")}} rel="stylesheet" type="text/css">


</head>
<body>
        <div id="app">
                @include('site.partials.header')
                @yield('content')
                @include('site.partials.footer')
        </div>


<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src={{asset("site/assets/js/custom.js")}}></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js")}}></script>
<script type="text/javascript" src={{asset("site/assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js")}}></script>
</body>
</html>
