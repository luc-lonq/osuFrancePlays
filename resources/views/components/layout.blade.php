<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <x-navbar/>
        <div class="flex justify-center mt-3">
            <div class="2xl:w-3/5 xl:w-4/5 md:w-4/5 sm:w-full sm:px-4">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
