<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Joueurs</h1>
    </div>
    <div>
        {{ $players->links() }}
    </div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg mb-20">
        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
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
                    <td class="px-6 py-4">
                        {{ $player->country_rank }}
                    </td>
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
