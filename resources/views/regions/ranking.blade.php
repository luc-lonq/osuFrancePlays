<x-layout>
    <h1 class="text-4xl font-semibold dark:text-white mb-4">Classements régionaux</h1>
    <div class="flex justify-center ">
        <x-regions.navbar :regions="$regions"/>
        <div class="text-medium dark:text-gray-100 dark:bg-gray-900 rounded-lg w-full">
            @if(empty($players))
                <x-regions.table_skeleton/>
            @else
                <div class="flex justify-between">
                    <h1 class="text-3xl dark:text-white mb-3">{{ $region->name }} le {{ \Carbon\Carbon::now()->startOfWeek()->translatedFormat('d F Y') }}</h1>
                    <x-regions.date_dropdown :region="$region" :historyDates="$historyDates"/>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto max-h-[42rem] shadow-gray-200 dark:shadow-gray-700">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <x-regions.table_head/>
                        <tbody>
                            @foreach($players as $key=>$player)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         <div class="flex items-center">
                                             {{ $player->region_rank }}
                                             @if($lastHistory)
                                                 @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                                     @if(json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank > 0)
                                                         <x-regions.arrow_svg direction="up"/>
                                                         <p class="text-green-500">
                                                            {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank }}
                                                         </p>
                                                     @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank < 0)
                                                         <x-regions.arrow_svg direction="down"/>
                                                         <p class="text-red-500">
                                                             {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['region_rank'] - $player->region_rank }}
                                                         </p>
                                                     @endif
                                                 @endif
                                             @endif
                                         </div>
                                    </th>
                                    <td class="px-6 py-3">
                                        <a href="/players/{{ $player->id }}">{{ $player->username }}</a>
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center">
                                            {{ round($player->pp) }}pp
                                            @if($lastHistory)
                                                @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                                    @if(round($player->pp) - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] > 0)
                                                        <x-regions.arrow_svg direction="up"/>
                                                        <p class="text-green-500">
                                                            {{ round($player->pp) - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] }}
                                                        </p>
                                                    @elseif(round($player->pp) - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] < 0)
                                                        <x-regions.arrow_svg direction="down"/>
                                                        <p class="text-red-500">
                                                            {{ round($player->pp) - json_decode($lastHistory->ranking, true)[$player->osu_id]['pp'] }}
                                                        </p>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center">
                                            {{ $player->country_rank }}
                                            @if($lastHistory)
                                                @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                                    @if(json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank > 0)
                                                        <x-regions.arrow_svg direction="up"/>
                                                        <p class="text-green-500">
                                                            {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank }}
                                                        </p>
                                                    @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank < 0)
                                                        <x-regions.arrow_svg direction="down"/>
                                                        <p class="text-red-500">
                                                            {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['country_rank'] - $player->country_rank }}
                                                        </p>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center">
                                            {{ $player->rank }}
                                            @if($lastHistory)
                                                @if(array_key_exists($player->osu_id, json_decode($lastHistory->ranking, true)))
                                                    @if (json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank > 0)
                                                        <x-regions.arrow_svg direction="up"/>
                                                        <p class="text-green-500">
                                                            {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank }}
                                                        </p>
                                                    @elseif(json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank < 0)
                                                        <x-regions.arrow_svg direction="down"/>
                                                        <p class="text-red-500">
                                                            {{ json_decode($lastHistory->ranking, true)[$player->osu_id]['rank'] - $player->rank }}
                                                        </p>
                                                    @endif
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
    </div>
</x-layout>
