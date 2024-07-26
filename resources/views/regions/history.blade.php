<x-layout>
    <x-regions.navbar :regions="$regions"/>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-800 rounded-lg w-1/2">
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
                                    {{ $player->username }}
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
</x-layout>
