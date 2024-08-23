<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-900 rounded-lg mb-20">
        <div class="flex mb-10">
            <img class="h-64 w-64 w-auto rounded-2xl" src="https://a.ppy.sh/{{ $player->osu_id }}" alt="image description">
            <div class="ml-10">
                <h1 class="text-4xl font-semibold dark:text-white mb-4">{{ $player->username }}</h1>
                <p class="text-xl text-gray-900 dark:text-white">PP : {{ round($player->pp) }}pp</p>
                <p class="text-xl text-gray-900 dark:text-white">Rang global : {{ $player->rank }}</p>
                <p class="text-xl text-gray-900 dark:text-white">Rang national : {{ $player->country_rank }}</p>
                @if($region)
                    <p class="text-xl text-gray-900 dark:text-white">Rang régional : {{ $player->region_rank }} ({{ $region->name }})</p>
                @else
                    <p class="text-xl text-gray-900 dark:text-white">Rang régional : -</p>
                @endif
                <p class="text-xl text-gray-900 dark:text-white">Scores of the week : {{ count($sotws) }}</p>
                <p class="text-xl text-gray-900 dark:text-white">Mentions honorables: {{ count($mhs) }}</p>
            </div>
        </div>
        @if(!empty($sotws))
            @if(count($sotws) == 1)
                <h1 class="text-3xl font-semibold dark:text-white mb-2">Son score of the week</h1>
            @else
                <h1 class="text-3xl font-semibold dark:text-white mb-2">Son dernier score of the week</h1>
            @endif
            <div class="grid grid-cols-2 gap-4 mb-6">
                <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($sotws[0]->image_path) }}" alt="">
                <video class="w-full rounded-lg" controls preload="metadata">
                    <source src="{{ Storage::url($sotws[0]->video_path) }}" type="video/mp4">
                </video>
            </div>
        @endif

        @if(count($sotws) > 1)
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                        <span>Voir ses autres scores of the week</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            @for($i = 1; $i < count($sotws); $i++)
                                <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($sotws[$i]->image_path) }}" alt="">
                                <video class="w-full rounded-lg" controls preload="metadata">
                                    <source src="{{ Storage::url($sotws[$i]->video_path) }}" type="video/mp4">
                                </video>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($mhs))
            @if(count($mhs) == 1)
                <h1 class="text-3xl font-semibold dark:text-white mb-2">Sa mention honorable</h1>
            @elseif(count($mhs) <= 6)
                <h1 class="text-3xl font-semibold dark:text-white mb-2">Ses mentions honorables</h1>
                <div class="grid grid-cols-3 gap-4">
                @foreach($mhs as $mh)
                    <img class="h-auto max-w-full rounded-lg transform transition duration-300" src="{{ Storage::url($mh->image_path) }}" alt="">
                @endforeach
                </div>
            @else
                <h1 class="text-3xl font-semibold dark:text-white mb-2">Ses dernières mentions honorables</h1>
                <div class="grid grid-cols-3 gap-4">
                    @for($i = 0; $i < 6; $i++)
                        <img class="h-auto max-w-full rounded-lg transform transition duration-300" src="{{ Storage::url($mhs[$i]->image_path) }}" alt="">
                    @endfor
                </div>
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                            <span>Voir ses autres mentions honorables</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                @for($i = 6; $i < count($mhs); $i++)
                                    <img class="h-auto max-w-full rounded-lg transform transition duration-300" src="{{ Storage::url($mhs[$i]->image_path) }}" alt="">
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</x-layout>
