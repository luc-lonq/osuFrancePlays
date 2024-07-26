<x-layout>
    <x-regions.navbar :regions="$regions"/>
    <div class="text-medium dark:text-gray-100 dark:bg-gray-800 rounded-lg w-1/2">
        @if(empty($players))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white bg-blue-700 uppercase dark:bg-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Rang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rang national
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rang global
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < rand(8,12); $i++)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                </th>
                                <td class="px-6 py-4">
                                    <div class="w-32 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-16 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex justify-between">
                <h2 class="text-4xl dark:text-white mb-3">Classement du {{ \Carbon\Carbon::create($date)->translatedFormat('d F Y') }}</h2>
                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" data-dropdown-placement="bottom" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Date
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="dropdownUsers" class="z-10 hidden bg-white rounded-lg shadow w-30 dark:bg-gray-700">
                    <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUsersButton">
                        <li>
                            <a href="/regions/{{ $regionId }}" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Maintenant
                            </a>
                        </li>
                        @foreach($historyDates as $historyDate)
                            <li>
                                <a href="/regions/{{ $regionId }}/history/{{ $historyDate }}" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ \Carbon\Carbon::create($historyDate)->translatedFormat('d F Y') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto max-h-[42rem]">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white bg-blue-700 uppercase dark:bg-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Rang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rang national
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rang global
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $key=>$player)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                     <div class="flex items-center">
                                         {{ $player['region_rank'] }}
                                         @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                             @if(json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank > 0)
                                                 <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                                 </svg>
                                                 <p class="text-green-500">
                                                    {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank }}
                                                 </p>
                                             @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank < 0)
                                                 <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                                 </svg>
                                                 <p class="text-red-500">
                                                     {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank }}
                                                 </p>
                                             @endif
                                         @endif
                                     </div>
                                </th>
                                <td class="px-6 py-3">
                                    {{ $player['username'] }}
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex items-center">
                                        {{ $player['pp'] }}pp
                                        @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                            @if($player->pp - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] > 0)
                                                <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                                </svg>
                                                <p class="text-green-500">
                                                    {{ $player->pp - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] }}
                                                </p>
                                            @elseif($player->pp - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] < 0)
                                                <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                                </svg>
                                                <p class="text-red-500">
                                                    {{ $player->pp - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] }}
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex items-center">
                                        {{ $player['country_rank'] }}
                                        @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                            @if(json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank > 0)
                                                <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                                </svg>
                                                <p class="text-green-500">
                                                    {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank }}
                                                </p>
                                            @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank < 0)
                                                <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                                </svg>
                                                <p class="text-red-500">
                                                    {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank }}
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex items-center">
                                        {{ $player['rank'] }}
                                        @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                            @if (json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank > 0)
                                                <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                                </svg>
                                                <p class="text-green-500">
                                                    {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank }}
                                                </p>
                                            @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank < 0)
                                                <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                                </svg>
                                                <p class="text-red-500">
                                                    {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank }}
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
