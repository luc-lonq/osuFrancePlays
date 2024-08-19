<x-layout>
    <div class="flex grid grid-cols-2 gap-4">
        <div class="max-w bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @if($sotw != null)
                <video class="w-full rounded-lg" controls>
                    <source src="{{ Storage::url($sotw['score']->video_path) }}" type="video/mp4">
                </video>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">SOTW de la semaine du {{ \Carbon\Carbon::create($sotwSession->date)->translatedFormat('d F Y') }} au {{ \Carbon\Carbon::create($sotwSession->date)->addDays(6)->translatedFormat('d F Y') }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Réalisé par {{ $sotw['player']->username }}</p>
                    <a href="/sotw" class="inline-flex items-center text-sm font-medium text-center">
                        <x-button-primary>
                            Voir le score of the week
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </x-button-primary>
                    </a>
                </div>
            @else
                <p class="p-5 mb-3 font-normal text-gray-700 dark:text-gray-400">Il n'existe pas encore de score of the week</p>
            @endif
        </div>

        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top PP de la semaine en cours</h5>
            @if($ppCurrentWeek->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-96">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white text-gray-700 uppercase bg-gradient-to-br from-purple-600 to-blue-500">
                        <tr>
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
                        @foreach($ppCurrentWeek as $pp)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pp->player_username }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ round($pp->pp) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pp->map }} [{{ $pp->diff }}]
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Aucun play supérieur à 600pp pour le moment</p>
            @endif
        </div>
    </div>
</x-layout>
