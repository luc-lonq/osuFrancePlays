<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Top Scores</h1>
    </div>
    <div class="flex grid grid-cols-2 gap-4">
        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top PP de la semaine dernière</h5>
            </div>
            @if($scoresWeek->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[42rem] shadow-gray-200 dark:shadow-gray-700">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white uppercase bg-gradient-to-br from-purple-600 to-blue-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Joueur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Map
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($scoresWeek as $key=>$pp)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="col" class="px-4 py-2">
                                    {{ $key+1 }}
                                </th>
                                <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pp->player_username }}
                                </th>
                                <td class="px-4 py-2">
                                    {{ round($pp->pp) }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $pp->map }} [{{ $pp->diff }}]
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Aucun play supérieur à 600pp la semaine dernière</p>
            @endif
        </div>
        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top PP du mois dernier</h5>
            </div>
            @if($scoresMonth->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[42rem] shadow-gray-200 dark:shadow-gray-700">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white uppercase bg-gradient-to-br from-purple-600 to-blue-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Joueur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Map
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($scoresMonth as $key=>$pp)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="col" class="px-4 py-2">
                                    {{ $key+1 }}
                                </th>
                                <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pp->player_username }}
                                </th>
                                <td class="px-4 py-2">
                                    {{ round($pp->pp) }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $pp->map }} [{{ $pp->diff }}]
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Aucun play supérieur à 600pp le mois dernier</p>
            @endif
        </div>
    </div>
</x-admin.layout>
