<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} @yield('sub-title')</title>

        @stack('custom-css')
    </head>

    <body>
        @yield('content')

        @stack('script')
    </body>
</html>
