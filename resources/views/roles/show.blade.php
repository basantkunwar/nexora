<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
<div class="flex justify-end mb-4">
<a href="{{route('roles.index')}}" class="rounded-lg py-3 px-6 shadow-lg font-semibold fs-4 text-black bg-blue-500 hover:bg-blue-700">
    +create roles
</a>
</div>

            {{-- Table Card --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Available Roles
                    </h3>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">sn</th>
                                <th class="px-6 py-3 text-left">Role Name</th>
                                <th class="px-6 py-3 text-left">Permissions</th>
                                <th class="px-6 py-3 text-left">Created</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @forelse($roles as $role)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ ucfirst($role->name) }}
                                    </td>

                                    {{-- Permissions --}}
                                    <td class="px-6 py-4">
                                        @if($role->permissions->count())
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($role->permissions as $permission)
                                                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">
                                                        {{ $permission->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-xs text-gray-400">No permissions</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $role->created_at->format('d M Y') }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">

                                            <a href=""
                                               class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-lg">
                                                Edit
                                            </a>

                                            <a href="{{route('roles.assign_permissions', $role->id)}}"
                                               class="bg-indigo-500 hover:bg-indigo-600 text-white text-xs px-3 py-1 rounded-lg">
                                                Assign Permissions
                                            </a>

                                            <form action="" method="POST"
                                                  onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-lg">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                        No roles found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>