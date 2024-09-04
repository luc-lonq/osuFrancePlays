<x-admin.layout>
    <div class="flex justify-between">
        <h1 class="text-4xl font-semibold dark:text-white mb-4">Utilisateurs</h1>
    </div>
    <div class="flex grid grid-cols-2 gap-4">
        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Utilisateurs</h5>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[42rem] shadow-gray-200 dark:shadow-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-white text-gray-700 uppercase bg-gradient-to-br from-purple-600 to-blue-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=>$user)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $user->username }}
                            </th>
                            <th scope="row" class="px-4 py-2 text-right font-medium text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <form id="form" action="/admin/users/update/{{ $user->id }}" method="post">
                                    @csrf
                                    <button submit>
                                        Ajouter aux admins
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="max-w p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admins</h5>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[42rem] shadow-gray-200 dark:shadow-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-white text-gray-700 uppercase bg-gradient-to-br from-purple-600 to-blue-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $key=>$admin)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $admin->username }}
                            </th>
                            <th scope="row" class="px-4 py-2 text-right font-medium text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <form id="form" action="/admin/user/update/{{ $admin->id }}" method="post">
                                    @csrf
                                    <button submit>
                                        Retirer des admins
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
