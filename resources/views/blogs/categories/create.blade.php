<x-app-layout>
<div class="flex justify-end">
<a href="{{route('blogs.categories.create')}}" class="rounded-lg py-3 px-6 shadow-lg font-semibold fs-4 text-black bg-blue-500 hover:bg-blue-700">
    +create categories
</a>
</div>
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-10">

    <div class="w-full max-w-xl bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

       

        <!-- FORM -->
        <form action="{{ route('blogs.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- CATEGORY NAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category Name
                </label>

                <input type="text"
                       name="name"
                       placeholder="Enter category name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl
                              focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
{{-- images --}}
<div class="">
    <label class="block text-sm font-medium text-gray-700 mb-1">
        Category Image
    </label>
    <input type="file" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-xl
                              focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">
</div>
            <!-- SLUG (OPTIONAL) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Slug (optional)
                </label>

                <input type="text"
                       name="slug"
                       placeholder="auto-generated or custom slug"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl
                              focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">

                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Write category description..."
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                 focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition"></textarea>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-xl
                           hover:bg-gray-800 transition font-semibold shadow">
                + Create Category
            </button>

        </form>

    </div>

</div>

</x-app-layout>