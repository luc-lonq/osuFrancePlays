<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://pbs.twimg.com/profile_images/1272606472086618124/JIbye59U_400x400.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">osu! France Plays</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <img class="w-8 h-8 rounded-full" src="https://a.ppy.sh/{{ Auth::user()->osu_id }}" alt="user photo">
                </button>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                        <a href="/players/{{ Auth::user()->player_id }}" class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->username }}</a>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if(Auth::user()->admin)
                            <li>
                                <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Panel admin</a>
                            </li>
                        @endif
                        <li>
                            <a href="/players/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Paramètres</a>
                        </li>
                        <li>
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <a href="https://osu.ppy.sh/oauth/authorize?client_id=33380&redirect_uri={{ env('OSU_REDIRECT_URI') }}&response_type=code&scope=public+identify">
                    <x-button-primary>
                        Se connecter avec osu!
                    </x-button-primary>
                </a>
            @endguest
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-navlink href="/" :active="request()->is('/')">Accueil</x-navlink>
                <x-navlink href="/regions" :active="request()->is('regions' . '*')">Classements régionaux</x-navlink>
                <x-navlink href="/sotw" :active="request()->is('sotw' . '*')" aria-disabled="true">Score of the week</x-navlink>
            </ul>
        </div>
    </div>
</nav>
