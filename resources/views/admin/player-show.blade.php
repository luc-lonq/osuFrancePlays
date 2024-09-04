<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Joueurs</h1>
    </div>
    <div class="mt-4 relative overflow-x-auto">
        <div class="flex mb-10">
            <img class="h-64 w-64 w-auto rounded-2xl" src="https://a.ppy.sh/{{ $player->osu_id }}" alt="image description">
            <div class="ml-10">
                <h1 class="text-4xl font-semibold dark:text-white mb-4">{{ $player->username }}</h1>
                <h5 class="text-xl font-bold dark:text-white mb-2">Modifier la région</h5>
                <form id="form" action="/admin/player/update/{{ $player->id }}" method="post">
                    @csrf
                    <div class="w-full">
                        <select required id="region" name="region" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0"></option>
                            @if($player->new_region)
                                @foreach($regions as $region)
                                    @if($region->id == $player->new_region)
                                        <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                                    @else
                                        <option value="{{ $region->id }}" >{{ $region->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach($regions as $region)
                                    @if($region->id == $player->region_id)
                                        <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                                    @else
                                        <option value="{{ $region->id }}" >{{ $region->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <x-button-primary submit>Modifier</x-button-primary>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
