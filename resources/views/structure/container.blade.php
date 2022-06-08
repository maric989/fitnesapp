<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Aura</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
        @yield('head-css')
        @yield('head-js')
    </head>
    <body>
        @yield('main-container')
        @yield('footer-js')
    </body>
</html>
