@props(['submit' => false])
<button {{ $submit ? 'type=submit' : 'type=button'}}
        class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
    {{ $attributes }}>
    {{ $slot }}
</button>
