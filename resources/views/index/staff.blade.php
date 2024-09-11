<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-900 rounded-lg mb-20 mt-10">
        <div class="grid grid-cols-5 gap-4">
            @foreach($staff as $user)
                <figure class="flex flex-col items-center">
                    <div class="flex items-center justify-center my-auto w-full">
                        <img class="w-full my-auto rounded-lg" src="https://a.ppy.sh/{{ $user->osu_id }}" alt="">
                    </div>
                    <figcaption class="mt-2 text-center text-gray-800 dark:text-gray-200">{{ $user->username }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</x-layout>
