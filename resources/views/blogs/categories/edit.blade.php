<x-app-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-10">

    <div class="w-full max-w-xl bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

        <!-- HEADER -->
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Update Category</h2>
            
        </div>

        <!-- FORM -->
        <form action="{{ route('blogs.categories.update', $category->id) }}') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- CATEGORY NAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Category Name
                </label>

                <input type="text"
                value="{{$category->name}}"
                       name="name"
                       placeholder="Enter category name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl
                              focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
{{-- current image --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Current Image
    </label>
    <img src="{{ asset('storage/'.$category->image) }}" alt="" class="w-28 h-28 object-cover rounded-2xl border border-slate-200">
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
                       value="{{$category->slug}}"
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
                                 focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">{{$category->description}}</textarea>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-xl
                           hover:bg-gray-800 transition font-semibold shadow">
                + Update Category
            </button>

        </form>

    </div>

</div>

</x-app-layout>