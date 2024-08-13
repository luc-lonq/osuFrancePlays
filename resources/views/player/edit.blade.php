<x-layout>
    <div class="mb-20">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Paramètres</h1>
        <form id="form" action="/players/update/{{ $player->id }}" method="post">
            @csrf
            <div class="mb-4">
                <h5 class="text-xl font-bold dark:text-white mb-2">Changer sa région</h5>
                <div class="flex grid grid-cols-3 gap-4">
                    <div class="w-full">
                        <select required id="region" name="region" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0"></option>
                            @foreach($regions as $region)
                                @if($region->id != $player->region_id and $region->id != $player->new_region)
                                    <option value="{{ $region->id }}" >{{ $region->name }}</option>
                                @elseif($region->id == $player->new_region)
                                    <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                                @elseif($player->new_region == null)
                                    <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</button>
        </form>
    </div>
</x-layout>
