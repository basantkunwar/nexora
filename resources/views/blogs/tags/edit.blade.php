<x-app-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-10">

    <div class="w-full max-w-lg bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">update Tag</h2>
            <p class="text-sm text-gray-500 mt-1">
                Update a new tag into the database
            </p>
        </div>

        <!-- FORM -->
        <form action="{{route('blogs.tags.update', $tag->id)}}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- TAG NAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Tag Name
                </label>

                <input type="text"
                       name="name"
                       value="{{$tag->name}}"
                       placeholder="Enter tag name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl
                              focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- SLUG -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Slug (optional)
                </label>

                <input type="text"
                       name="slug"
                       value="{{$tag->slug}}"
                       placeholder="auto or custom slug"
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
                          placeholder="Write tag description..."
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                 focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">{{$tag->description}}</textarea>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-xl
                           hover:bg-gray-800 transition font-semibold shadow">
                + Update Tag
            </button>

        </form>

    </div>

</div>

</x-app-layout>