<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-800 rounded-lg mb-20">
        <div class="flex mb-10">
            <img class="h-64 w-64 w-auto rounded-2xl" src="https://a.ppy.sh/{{ $player->osu_id }}" alt="image description">
            <div class="ml-10">
                <h1 class="text-4xl font-semibold dark:text-white mb-4">{{ $player->username }}</h1>
                <p class="text-xl text-gray-900 dark:text-white">PP : {{ $player->pp }}pp</p>
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
            <h1 class="text-3xl font-semibold dark:text-white mb-2">Scores of the week</h1>
            <div class="grid grid-cols-2 gap-4 mb-6">
                @foreach($sotws as $sotw)
                    <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($sotw->image_path) }}" alt="">
                    <video class="w-full rounded-lg" controls>
                        <source src="{{ Storage::url($sotw->video_path) }}" type="video/mp4">
                    </video>
                @endforeach
            </div>
        @endif
        @if(!empty($mhs))
            <h1 class="text-3xl font-semibold dark:text-white mb-2">Mentions honorables</h1>
            <div class="grid grid-cols-3 gap-4">
                @foreach($mhs as $mh)
                    <div class="z-0 hover:z-50">
                        <img class="h-auto max-w-full rounded-lg hover:scale-150 transform transition duration-300" src="{{ Storage::url($mh->image_path) }}" alt="">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
