<button id="dropdownDateButton" data-dropdown-toggle="dropdownDate" data-dropdown-placement="bottom" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
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
        @foreach($sotws as $sotw)
            <li>
                <a href="/sotw/{{ $sotw->date }}" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ \Carbon\Carbon::create($sotw->date)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::create($sotw->date)->addDays(6)->translatedFormat('d F Y') }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
