<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Score of the week</h1>
        <a href="/admin/sotw/create">
            <x-button-primary>
                Ajouter
                <svg class="w-5 h-5 ms-2 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                </svg>
            </x-button-primary>
        </a>
    </div>
    <div>
        {{ $sessions->links() }}
    </div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Semaine
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Joueur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de MH
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sotws as $sotw)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{ Storage::url($sotw['score']->image_path) }}" class="w-64 md:w-64 max-w-full max-h-full">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::create($sotw['session']->date)->translatedFormat('d F Y') }} au {{ \Carbon\Carbon::create($sotw['session']->date)->addDays(6)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $sotw['player']->username }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ count(json_decode($sotw['session']->mh)) }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="mb-2">
                                <a href="/admin/sotw/edit/{{ $sotw['session']->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <x-button-primary submit>Modifier</x-button-primary>
                                </a>
                            </div>
                            <form method="POST" action="/admin/sotw/delete/{{ $sotw['session']->id }}">
                                @csrf
                                @method('delete')
                                <x-button-secondary submit>Supprimer</x-button-secondary>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>
