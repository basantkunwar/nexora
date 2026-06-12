<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Add New Role
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4">
            <div class="mb-2 flex justify-end">
                <a href="{{route('roles.show')}}" class="text-blue-600 rounded-lg shadow font-weight hover:underline">
                    &larr; view roles
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Create Role
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        Add a new role to manage user permissions.
                    </p>
                </div>

                <form action="{{route('roles.create')}}" method="POST">
                    @csrf

                    <!-- Role Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Role Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value=""
                            placeholder="Enter role name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-200"
                        >

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-3">
                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-medium shadow-md transition duration-200"
                        >
                            Save Role
                        </button>

                        <a
                            href=""
                            class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-200"
                        >
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>