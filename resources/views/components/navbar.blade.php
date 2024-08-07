<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://pbs.twimg.com/profile_images/1272606472086618124/JIbye59U_400x400.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">osu! France Plays</span>
        </a>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-navlink href="/" :active="request()->is('/')">Accueil</x-navlink>
                <x-navlink href="/regions" :active="request()->is('regions' . '*')">Classements régionaux</x-navlink>
                <x-navlink href="/sotw" :active="request()->is('sotw' . '*')" aria-disabled="true">Score of the week</x-navlink>
            </ul>
        </div>
    </div>
</nav>
