<x-app-layout>
<div class="min-h-screen bg-slate-50 p-6">

    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">
                Add Category
            </h1>
            <p class="text-slate-500 mt-1">
                Create a new product category for your store.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">

            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                <h2 class="text-xl font-semibold text-white">
                    Category Information
                </h2>
                <p class="text-indigo-100 text-sm mt-1">
                    Fill in the details below
                </p>
            </div>

            <!-- Card Body -->
            <div class="p-8">

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <!-- Category Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Category Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter category name..."
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition">

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Category Image
                        </label>

                        <input type="file"
                               name="image"
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition">
                    </div>

                    <!-- Category Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Write category description..."
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition resize-none">{{ old('description') }}</textarea>
                    </div>

                    <!-- Status -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status
                        </label>

                        <select name="status"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition">
                            <option value="available">available</option>
                            <option value="outofstock">outofstock</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3">
                        <button type="reset"
                                class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                            Reset
                        </button>

                        <button type="submit"
                                class="px-8 py-3 rounded-xl bg-indigo-600 text-white font-medium shadow-lg hover:bg-indigo-700 transition">
                            Save Category
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>
</x-app-layout>