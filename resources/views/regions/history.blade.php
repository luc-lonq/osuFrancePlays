<x-layout>
    <h1 class="text-4xl font-semibold dark:text-white mb-4">Classements régionaux</h1>
    <div class="flex justify-center ">
        <x-regions.navbar :regions="$regions"/>
        <div class="text-medium dark:text-gray-100 dark:bg-gray-900 rounded-lg w-full">
            <div class="flex justify-between">
                <h1 class="text-3xl dark:text-white mb-4">{{ $region->name }} le {{ \Carbon\Carbon::create($date)->translatedFormat('d F Y') }}</h1>
                <x-regions.date_dropdown :region="$region" :historyDates="$historyDates"/>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-auto max-h-[42rem]">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <x-regions.table_head/>
                    <tbody>
                    @foreach(json_decode($history->ranking, true) as $key=>$row)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    {{ $row['region_rank'] }}
                                </div>
                            </th>
                            <td class="px-6 py-3">
                                @foreach($players as $player)
                                    @if($player->osu_id == $key)
                                        <a href="/players/{{ $player->id }}">{{ $player->username }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-3">
                                {{ $row['pp'] }}pp
                            </td>
                            <td class="px-6 py-3">
                                {{ $row['country_rank'] }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $row['rank'] }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
