<x-app-layout>

    <x-slot name="header">
        <div class="text-center py-4">
            <h2 class="text-3xl font-bold text-gray-800">
                Users Management
            </h2>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8">

        <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-5 overflow-x-auto">

            <table class="w-full text-sm">

                <!-- TABLE HEAD -->
                <thead>
                    <tr class="bg-gray-50 border-b text-center">

                        <th class="py-3 px-4 font-semibold text-gray-700">
                            SN
                        </th>

                        <th class="py-3 px-4 font-semibold text-gray-700">
                            Name
                        </th>

                        <th class="py-3 px-4 font-semibold text-gray-700">
                            Email
                        </th>
@role('admin|super-admin')
                        <th class="py-3 px-4 font-semibold text-gray-700">
                            Role
                        </th>

                        <th class="py-3 px-4 font-semibold text-gray-700">
                            Actions
                        </th>
@endrole
                    </tr>
                </thead>

                <!-- TABLE BODY -->
                <tbody>

                    @foreach ($users as $user)

                        <tr class="border-b hover:bg-gray-50 transition text-center">

                            <td class="py-3 px-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="py-3 px-4 font-medium text-gray-800">
                                {{ $user->name }}
                            </td>

                            <td class="py-3 px-4 text-gray-600">
                                {{ $user->email }}
                            </td>
@role('admin|super-admin')
                            <td class="py-3 px-4 text-gray-600">
                                   @foreach($user->getRoleNames() as $role)
        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
            {{ $role }}
        </span>
    @endforeach
                                       </td>

                            <td class="py-3 px-4">

                                <div class="flex flex-wrap justify-center gap-2">

                                    <a href=""
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        Manage
                                    </a>

                                    <a href="{{ route('roles.role_assign', $user->id) }}"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        Assign Role
                                    </a>

                                    <a href=""
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        Edit
                                    </a>

                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>
@endrole
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>