<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}
    <script src="https://kit.fontawesome.com/50e4937a61.js" crossorigin="anonymous"></script>
    
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
    @include('partial.header_stu')

    @yield('content')

</body>
</html>