<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <x-navbar/>
        <div>
            {{ $slot }}
        </div>
    </body>
</html>
