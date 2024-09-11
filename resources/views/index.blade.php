<x-layout>
    <div class="grid grid-cols-2 gap-4">
        <div class="max-w bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            @if($sotw != null)
                <video class="w-full rounded-t-lg" controls preload="metadata">
                    <source src="{{ Storage::url($sotw['score']->video_path) }}" type="video/mp4">
                </video>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">SOTW de la semaine du {{ \Carbon\Carbon::create($sotwSession->date)->translatedFormat('d F Y') }} au {{ \Carbon\Carbon::create($sotwSession->date)->addDays(6)->translatedFormat('d F Y') }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Réalisé par {{ $sotw['player']->username }}</p>
                    <a href="/sotw" class="inline-flex items-center text-sm font-medium text-center">
                        <x-button-primary>
                            Voir le score of the week
                        </x-button-primary>
                    </a>
                </div>
            @else
                <p class="p-5 mb-3 font-normal text-gray-700 dark:text-gray-400">Il n'existe pas encore de score of the week</p>
            @endif
        </div>

        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top PP Plays de cette semaine</h5>
                <svg data-popover-target="popover-plays" class="my-1 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                </svg>

                <div data-popover id="popover-plays" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div class="px-3 py-2">
                        <p>Uniquement les plays supérieur à 600pp issue des joueurs du top 100 français se fait traquer pour ces statistiques</p>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
            @if($ppCurrentWeek->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-96 shadow-gray-200 dark:shadow-gray-700">
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
                        @foreach($ppCurrentWeek as $key=>$pp)
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
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Aucun play supérieur à 600pp pour le moment</p>
            @endif
        </div>

        <div class="full-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Joueurs ayant gagnés des PP cette semaine</h5>
                <svg data-popover-target="popover-pp" class="my-1 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                </svg>

                <div data-popover id="popover-pp" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div class="px-3 py-2">
                        <p>Uniquement le top 100 français se fait traquer pour ces statistiques</p>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
            @if($playersPp->first() != null)
                @if(round($playersPp->first()->current_pp) > round($playersPp->first()->pp))
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-96 shadow-gray-200 dark:shadow-gray-700">
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
                                    Avant
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Après
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playersPp as $key=>$player)
                                @if(round($player->current_pp) > round($player->pp))
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">
                                            {{ $key + 1 }}
                                        </td>
                                        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $player->username }}
                                        </th>
                                        <td class="px-4 py-2">
                                            + {{ round($player->current_pp) - round($player->pp) }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ round($player->pp) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ round($player->current_pp) }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Personne n'a gagné de pp pour le moment</p>
                @endif
            @else
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Personne n'a gagné de pp pour le moment</p>
            @endif
        </div>

        <div class="max-w bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Vote du Top 20 des joueurs osu! français de 2024</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Bientôt</p>
            </div>
        </div>
    </div>
</x-layout>
