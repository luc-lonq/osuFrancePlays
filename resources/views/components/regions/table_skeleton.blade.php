<div class="relative overflow-x-auto shadow-md sm:rounded-lg shadow-gray-200 dark:shadow-gray-700">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <x-regions.table_head/>
        <tbody>
        @for ($i = 0; $i < rand(8,12); $i++)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </th>
                <td class="px-6 py-4">
                    <div class="w-32 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </td>
                <td class="px-6 py-4">
                    <div class="w-16 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </td>
                <td class="px-6 py-4">
                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </td>
                <td class="px-6 py-4">
                    <div class="w-8 h-2 my-1 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>
