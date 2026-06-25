<x-app-layout>

<div class="max-w-4xl mx-auto py-8 px-4">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Featured Category Section
        </h1>
        <p class="text-gray-500 mt-2">
            Select the category that will be displayed on the homepage.
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <!-- Card Header -->
        <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50">
            <h2 class="text-xl font-semibold text-gray-800">
                Homepage Featured Section
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Manage the category and product limit displayed on the homepage.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('featured.store') }}" method="POST" class="p-8">
            @csrf

            <div class="space-y-6">

                <!-- Section Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Section Title
                    </label>

                    <input
                        type="text"
                        value="{{ $featured->title }}"
                        name="title"
                        placeholder="Section Title"
                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                    >

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Select Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                    >
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ $featured->category_id == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Product Limit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Limit
                    </label>

                    <input
                        type="number"
                        name="product_limit"
                        value="{{ $featured->product_limit }}"
                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                    >

                    @error('product_limit')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Status Toggle -->
                <div class="flex items-center justify-between p-4 rounded-2xl bg-gray-50 border border-gray-100">
                    <div>
                        <h4 class="font-semibold text-gray-800">
                            Section Status
                        </h4>
                        <p class="text-sm text-gray-500">
                            Enable or disable this homepage section.
                        </p>
                    </div>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            class="sr-only peer"
                            {{ $featured->status ? 'checked' : '' }}
                        >

                        <div class="w-14 h-7 bg-gray-300 rounded-full peer peer-checked:bg-green-500 transition"></div>

                        <div class="absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition peer-checked:translate-x-7"></div>
                    </label>
                </div>

                <!-- Save Button -->
                <div class="pt-4 flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition"
                    >
                        <i class="fas fa-save"></i>
                        Save Changes
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>

</x-app-layout>