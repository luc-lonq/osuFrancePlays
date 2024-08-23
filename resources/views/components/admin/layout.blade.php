<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="dark:!bg-gray-900">
        <div class="flex justify-center mt-10">
            <x-admin.sidebar/>
            <div class="2xl:w-3/5 xl:w-4/5 md:w-4/5 sm:w-full sm:px-4 ml-64">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
