<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

 <!--     Fonts and icons     -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
 <!-- Nucleo Icons -->
 <link href={{asset("admin/assets/css/nucleo-icons.css")}} rel="stylesheet" />
 <link href={{asset("admin/assets/css/nucleo-svg.css")}} rel="stylesheet" />
 <!-- Font Awesome Icons -->
 <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
 <!-- Material Icons -->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
 <!-- CSS Files -->
 <link id="pagestyle" href={{asset("admin/assets/css/material-dashboard.css?v=3.0.0")}} rel="stylesheet" />


</head>
<body class="g-sidenav-show  bg-gray-200">

    @yield('content')
    @include('admin.partials.footer')

  <script src={{asset("admin/assets/js/core/popper.min.js")}}></script>
  <script src={{asset("admin/assets/js/core/bootstrap.min.js")}}></script>
  <script src={{asset("admin/assets/js/plugins/perfect-scrollbar.min.js")}}></script>
  <script src={{asset("admin/assets/js/plugins/smooth-scrollbar.min.js")}}></script>
  <script src={{asset("admin/assets/js/plugins/chartjs.min.js")}}></script>

</body>
</html>
