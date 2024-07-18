<div class="rounded-lg w-1/2">
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
                @foreach($players as $player)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $player['region_rank'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $player['username'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $player['pp'] }}pp
                        </td>
                        <td class="px-6 py-4">
                            {{ $player['country_rank'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $player['rank'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
