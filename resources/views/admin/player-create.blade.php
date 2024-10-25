<x-admin.layout>
    <div class="mb-20">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Ajouter un joueur d'Outre-mer</h1>
        <form id="form" action="/admin/players/store" method="post">
            @csrf
            <div class="mb-4">
                <h5 class="text-xl font-bold dark:text-white mb-2">Id du joueur</h5>
                <div class="w-1/4">
                    <input type="text" id="id_player" name="id_player" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <x-button-primary submit>Ajouter</x-button-primary>
        </form>
    </div>
</x-admin.layout>

<x-admin.script-mh/>

