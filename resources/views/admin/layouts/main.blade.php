<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css'])
    </head>
    <body>
        @include('admin.partials.header')
        <main>
            @include('admin.partials.sidebar')
            @yield('content')
        </main>
        @include('admin.partials.footer')
    </body>
</html>
