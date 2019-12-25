<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('asset/front/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('asset/front/css/responsee.css')}}">
    <link rel="stylesheet" href="{{asset('asset/front/css/icons.css')}}"> @stack('extra-css')
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="{{asset('asset/front/css/template-style.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{asset('asset/front/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/front/js/jquery-ui.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('asset/front/js/template-scripts.js')}}"></script> -->
</head>

<body class="size-1140">

    @include('layout.web.lib.header')
    <section>@yield('content')</section>

    <!-- FOOTER -->
    @include('layout.web.lib.footer')
    <script type="text/javascript" src="{{asset('asset/front/js/responsee.js')}}"></script>
    @stack('extra-js')

</body>

</html>