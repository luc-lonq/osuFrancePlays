<div class="w-1/4">
    <ul class="flex-column space-y space-y-2 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-2 md:mb-0">
        @foreach($regions as $region)
            <li>
                <a href="/regions/{{ $region['id'] }}"
                   class="inline-flex items-center px-4 py-3 {{ request()->is('regions/' . $region['id'] . '/' . '*', 'regions/' . $region['id']) ? 'text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600' : 'rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                    {{ $region['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
