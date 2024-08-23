<x-admin.layout>
    <div class="mb-20">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Ajouter une semaine au score of the week</h1>
        <form id="form" action="/admin/sotw/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <h5 class="text-xl font-bold dark:text-white mb-2">Date</h5>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input required datepicker id="default-datepicker" name="date" type="text" datepicker-format="dd-mm-yyyy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            </div>
            <div class="mb-4">
                <h5 class="text-xl font-bold dark:text-white mb-2">Score of the week</h5>
                <div class="flex grid grid-cols-3 gap-4">
                    <div class="w-full">
                        <label for="player_id_sotw" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joueur</label>
                        <select required id="player_id_sotw" name="player_id_sotw" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0"></option>
                            @foreach($players as $player)
                                <option value="{{ $player->id }}">{{ $player->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="screen_sotw">Screen</label>
                        <input required id="screen_sotw" name="screen_sotw" class="pr-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="screen_sotw">Clip</label>
                        <input required id="clip_sotw" name="clip_sotw" class="pr-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h5 class="text-xl font-bold dark:text-white mb-2">Mentions Honorables</h5>
                <div class="flex grid grid-cols-2 gap-4 mb-4" id="mh_div">
                    <div class="w-full mh_player_div" id="mh_player_div">
                        <label for="player_id_mh_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joueur</label>
                        <select required id="player_id_mh_1" name="player_id_mh_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0"></option>
                            @foreach($players as $player)
                                <option value="{{ $player->id }}">{{ $player->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mh_screen_div" id="mh_screen_div">
                        <label for="screen_mh_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Screen</label>
                        <input required id="screen_mh_1" name="screen_mh_1" class="pr-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                    </div>
                </div>
            </div>
            <div class="flex gap-4 mb-4">
                <x-button-primary onclick="addMh()">Ajouter une mention honorable</x-button-primary>
                <x-button-secondary onclick="removeMh()">Retirer une mention honorable</x-button-secondary>
            </div>
            <x-button-primary submit>Ajouter</x-button-primary>
        </form>
    </div>
</x-admin.layout>

<x-admin.script-mh/>

