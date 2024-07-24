<div class="text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-1/2">
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
                                     @if (array_key_exists($lastUpdate->players_last_update, json_decode($player->history, true)))
                                         @if (json_decode($player->history, true)[$lastUpdate->players_last_update]['region_rank'] - $player->region_rank > 0)
                                             <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                             </svg>
                                             <p class="text-green-500">
                                                {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['region_rank'] - $player->region_rank }}
                                             </p>
                                         @elseif(json_decode($player->history, true)[$lastUpdate->players_last_update]['region_rank'] - $player->region_rank < 0)
                                             <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                             </svg>
                                             <p class="text-red-500">
                                                 {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['region_rank'] - $player->region_rank }}
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
                                    @if (array_key_exists($lastUpdate->players_last_update, json_decode($player->history, true)))
                                        @if ($player->pp - json_decode($player->history, true)[$lastUpdate->players_last_update]['pp'] > 0)
                                            <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                            </svg>
                                            <p class="text-green-500">
                                                {{ $player->pp - json_decode($player->history, true)[$lastUpdate->players_last_update]['pp'] }}
                                            </p>
                                        @elseif($player->pp - json_decode($player->history, true)[$lastUpdate->players_last_update]['pp'] < 0)
                                            <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                            </svg>
                                            <p class="text-red-500">
                                                {{ $player->pp - json_decode($player->history, true)[$lastUpdate->players_last_update]['pp'] }}
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex items-center">
                                    {{ $player['country_rank'] }}
                                    @if (array_key_exists($lastUpdate->players_last_update, json_decode($player->history, true)))
                                        @if (json_decode($player->history, true)[$lastUpdate->players_last_update]['country_rank'] - $player->country_rank > 0)
                                            <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                            </svg>
                                            <p class="text-green-500">
                                                {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['country_rank'] - $player->country_rank }}
                                            </p>
                                        @elseif(json_decode($player->history, true)[$lastUpdate->players_last_update]['country_rank'] - $player->country_rank < 0)
                                            <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                            </svg>
                                            <p class="text-red-500">
                                                {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['country_rank'] - $player->country_rank }}
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex items-center">
                                    {{ $player['rank'] }}
                                    @if (array_key_exists($lastUpdate->players_last_update, json_decode($player->history, true)))
                                        @if (json_decode($player->history, true)[$lastUpdate->players_last_update]['rank'] - $player->rank > 0)
                                            <svg class="w-5 h-5 ml-3 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                            </svg>
                                            <p class="text-green-500">
                                                {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['rank'] - $player->rank }}
                                            </p>
                                        @elseif(json_decode($player->history, true)[$lastUpdate->players_last_update]['rank'] - $player->rank < 0)
                                            <svg class="w-5 h-5 ml-3 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                            </svg>
                                            <p class="text-red-500">
                                                {{ json_decode($player->history, true)[$lastUpdate->players_last_update]['rank'] - $player->rank }}
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
