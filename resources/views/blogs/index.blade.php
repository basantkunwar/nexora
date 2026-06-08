<x-app-layout>

<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Tools</h1>
        <p class="text-gray-500 mt-1">Manage your blog system easily</p>
    </div>

    <!-- MAIN ACTION CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- ADD CATEGORY -->
        <a href="{{route('blogs.categories.index')}}"
           class="group bg-white border border-gray-200 h-50 rounded-xl p-6 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 group-hover:text-black">
                    view Category
                </h2>
                <span class="text-2xl">📁</span>
            </div>

            <p class="text-gray-500 mt-3">
                Create and manage blog categories.
            </p>
        </a>

        <!-- ADD BLOG -->
        <a href="{{ route('blogs.show') }}"
           class="group bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 group-hover:text-black">
                    view Blog
                </h2>
                <span class="text-2xl">✍️</span>
            </div>

            <p class="text-gray-500 mt-3">
                Write and publish new blog posts.
            </p>
        </a>

        <!-- ADD TAGS -->
        <a href="{{route('blogs.tags.index')}}"
           class="group bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 group-hover:text-black">
                    view Tags
                </h2>
                <span class="text-2xl">🏷️</span>
            </div>

            <p class="text-gray-500 mt-3">
                Organize blogs using tags.
            </p>
        </a>

    </div>

    <!-- STATIC SECTION -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
            <h3 class="font-semibold text-gray-700">total posts</h3>
            <p class="text-2xl font-bold mt-2">{{$blogs->count()}}</p>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
            <h3 class="font-semibold text-gray-700">total categories</h3>
            <p class="text-2xl font-bold mt-2">{{$blogs->pluck('category')->count()}}</p>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
            <h3 class="font-semibold text-gray-700">total tags </h3>
            <p class="text-2xl font-bold mt-2">{{$blogs->pluck('tag')->count()}}</p>
        </div>

    </div>

</div>

</x-app-layout>