<x-layout>
    <div class="flex justify-center mt-6">
        <x-regions.navbar :regions="$regions"/>
        <x-regions.ranking :players="$players" :lastHistory="$lastHistory"/>
    </div>
</x-layout>
