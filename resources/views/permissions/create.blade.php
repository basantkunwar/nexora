<x-app-layout>

    <div class="py-8">
        <div class="max-w-md mx-auto">

            <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">

                <h3 class="text-lg font-semibold text-gray-700 mb-5">
                    Create New Permission
                </h3>

                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Permission Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value=""
                            placeholder="e.g. product-create"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                            required
                        >

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                
                            </p>
                        @enderror
                    </div>

                    <div class="mt-6 flex gap-3">
                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl font-medium transition">
                            Save Permission
                        </button>

                        <a href=""
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-xl font-medium transition">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>