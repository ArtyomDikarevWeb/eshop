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
            <div class="wrapper">
                @include('admin.partials.sidebar')
                <div class="w-full">
                    @yield('content')
                </div>   
            </div>
        </main>
        @include('admin.partials.footer')
    </body>
</html>
