<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{config('app.name', 'Mirror Me Fashion')}}</title>
        <!--<title>Mirror Me Fashion</title> -->

        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> 

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Chango&family=Hachi+Maru+Pop&family=Homemade+Apple&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ app()->isLocal() ? asset('public/home/css/app.css') : asset('public/home/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ app()->isLocal() ? asset('public/home/css/main.css') : asset('public/home/css/main.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ app()->isLocal() ? asset('public/home/css/features.css') : asset('public/home/css/features.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ app()->isLocal() ? asset('public/home/css/chat.css') : asset('public/home/css/chat.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ app()->isLocal() ? asset('public/home/css/responsive.css') : asset('public/home/css/responsive.css') }}" />

         <!-- CSS Files -->
        <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="css/rSlider.min.css">

        <!-- JS Files -->        
        
        <script src="jquery.min.js"></script>
        <script src="rangeslider.min.js"></script>
        <script src="js/rSlider.min.js"></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>



    <style>
    .la, .lab, .lad, .lal, .lar, .las {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
}
    </style>
    </head>
