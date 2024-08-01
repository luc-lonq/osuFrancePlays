<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-800 rounded-lg mb-20">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Score of the week</h1>
        <div class="flex justify-between">
            <h1 class="text-3xl text-gray-800 dark:text-gray-200 mb-4">Semaine du {{ \Carbon\Carbon::create($sotwSession->date)->translatedFormat('d F Y') }} au {{ \Carbon\Carbon::create($sotwSession->date)->addDays(6)->translatedFormat('d F Y') }}</h1>
            <button id="dropdownDateButton" data-dropdown-toggle="dropdownDate" data-dropdown-placement="bottom" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Date
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownDate" class="z-10 hidden bg-white rounded-lg shadow w-30 dark:bg-gray-700">
                <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDateButton">
                    <li>
                        <a href="/sotw/" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Semaine dernière
                        </a>
                    </li>
                    @foreach($sotws as $so)
                        <li>
                            <a href="/sotw/{{ \Carbon\Carbon::create($so->date) }}" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ \Carbon\Carbon::create($so->date)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::create($so->date)->addDays(6)->translatedFormat('d F Y') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <figure>
                    <img class="h-auto max-w-full rounded-lg" src="{{ $sotw['score']->image_path }}" alt="">
                    <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">{{ $sotw['player']->username}}</figcaption>
                </figure>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($mhs as $mh)
                    <div class="z-0 hover:z-50">
                        <figure>
                            <img class="h-auto max-w-full rounded-lg hover:scale-150 transform transition duration-300" src="{{ $mh['score']->image_path }}" alt="">
                            <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">{{ $mh['player']->username}}</figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
