<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="title" content="@yield('title') - {{ env('APP_NAME') }}"/>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="面面">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('title') - {{ env('APP_NAME') }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:image" itemprop="image"  content="{{ asset('/images/splatoon2/splatoon_icon.png') }}">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="website" />
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ __('common.meta_keywords') }}"/>
    <link rel="shortcut icon" href="{{ asset('images/splatoon2/splatoon2_roller_pink.cur') }}" type="image/x-icon"/>

    <!-- <title>@yield('title') - {{ __('common.kitco_asia_gift') }}</title> -->
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    
    {{--jQuery--}}
    <!-- <script type="text/javascript" src="{{ mix('js/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script> -->

    {{--bootstrap--}}
    <link href="{{ mix('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">

    {{--bxslider--}}
    <link href="{{ mix('css/jquery.bxslider.css') }}" rel="stylesheet" crossorigin="anonymous">


    {{--Google Recaptcha--}}
    <!-- <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.recaptcha_v3_site_key') }}"></script> -->

    {{--FontAwesome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    {{--custom css/js --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</head>
<body>


    @include('includes.header')

    <div class="content container">
        @yield('content')
    </div>
    @include('includes.footer')

</body>

</html>
