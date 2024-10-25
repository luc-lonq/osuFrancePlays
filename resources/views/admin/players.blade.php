<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Joueurs</h1>
        <a href="/admin/players/create">
            <x-button-primary>
                Ajouter
                <svg class="w-5 h-5 ms-2 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                </svg>
            </x-button-primary>
        </a>
    </div>
    <div>
        {{ $players->links() }}
    </div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg mb-20 shadow-gray-200 dark:shadow-gray-700">
        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-white uppercase bg-gradient-to-br from-purple-600 to-blue-500">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Pseudo
                </th>
                <th scope="col" class="px-6 py-3">
                    Région
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $player->username }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($regions as $region)
                            @if($player->new_region)
                                @if($region->id == $player->new_region)
                                    {{ $region->name }}
                                @endif
                            @else
                                @if($region->id == $player->region_id)
                                    {{ $region->name }}
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/player/{{ $player->id }}">
                            Modifier
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>
