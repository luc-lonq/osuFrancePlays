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
                                <div class="w-8 h-2 my-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>                        </th>
                            <td class="px-6 py-4">
                                <div class="w-32 h-2 my-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>                        </th>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-16 h-2 my-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-8 h-2 my-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-8 h-2 my-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    @else
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
                    @foreach($players as $key=>$player)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key + 1 }}
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
    @endif
</div>
