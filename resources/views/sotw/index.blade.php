<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-800 rounded-lg mb-20">
        <div class="flex justify-between">
            <h1 class="text-4xl font-semibold dark:text-white mb-4">Score of the week</h1>
            <a href="/sotw/stats">
                <x-button-primary>
                    Statistiques
                    <svg class="w-5 h-5 ms-2 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                    </svg>
                </x-button-primary>
            </a>
        </div>
        @if(isset($sotwSession))
            <div class="flex justify-between">
                <h1 class="text-3xl text-gray-800 dark:text-gray-200 mb-4">Semaine du {{ \Carbon\Carbon::create($sotwSession->date)->translatedFormat('d F Y') }} au {{ \Carbon\Carbon::create($sotwSession->date)->addDays(6)->translatedFormat('d F Y') }}</h1>
                <x-sotw.date_dropdown :sotws="$sotws"/>
            </div>
            <div class="grid gap-4">
                <div class="grid grid-cols-2 gap-4 z-50">
                    <figure>
                        <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($sotw['score']->image_path) }}" alt="">
                        <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">{{ $sotw['player']->username}}</figcaption>
                    </figure>
                    <figure>
                        <video class="w-full rounded-lg" controls>
                            <source src="{{ Storage::url($sotw['score']->video_path) }}" type="video/mp4">
                        </video>
                        <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">Clip</figcaption>
                    </figure>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($mhs as $mh)
                        <div class="z-0 hover:z-20">
                            <figure>
                                <img class="h-auto max-w-full rounded-lg hover:scale-150 transform transition duration-300" src="{{ Storage::url($mh['score']->image_path) }}" alt="">
                                <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">{{ $mh['player']->username}}</figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="tracking-tight text-gray-500 md:text-lg dark:text-gray-400">Il n'existe pas encore de Score of the Week</p>
        @endif
    </div>
</x-layout>
