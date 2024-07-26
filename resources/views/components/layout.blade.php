<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <x-navbar/>
        <div>
            <div class="flex justify-center mt-6">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
