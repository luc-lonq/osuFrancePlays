@props(['submit' => false])
<button {{ $submit ? 'type=submit' : 'type=button'}}
    class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-blue-300 dark:focus:ring-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
    {{ $attributes }}>
    {{ $slot }}
</button>
