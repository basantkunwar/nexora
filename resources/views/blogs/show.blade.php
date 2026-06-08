<x-app-layout>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Blogs</h1>
            <p class="text-slate-500 mt-1">Manage all blog posts</p>
        </div>

        <a href="{{ route('blogs.create') }}"
           class="px-5 py-2.5 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition">
            Add Blog
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full border-collapse">

                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            sn
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Image
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Title
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Description
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Category
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Tag
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Status
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            YouTube
                        </th>

                        <th class="px-5 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Created
                        </th>

                        <th class="px-5 py-4 text-center text-sm font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($blogs as $blog)

                    <tr class="border-b border-slate-200 hover:bg-slate-50 transition">

                        <td class="px-5 py-4 border-r border-slate-200">
                            {{ $loop->iteration }}
                        </td>

                                    <td class="px-5 py-4 border-r border-slate-200">
                                        <img src="{{ asset('storage/'.$blog->image) }}"
                                            class="w-14 h-14 rounded-lg object-cover border border-slate-200">
                                    </td>

                        <td class="px-5 py-4 border-r border-slate-200 font-medium text-slate-800">
                            {{ $blog->title }}
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200 max-w-xs truncate">
                            {{ $blog->description }}
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200">
                            {{ $blog->blogcategory->name ?? '-' }}
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200">
                            {{ $blog->blogtags->name ?? '-' }}
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200">
                            <span class="px-3 py-1 text-xs rounded-full border border-slate-300">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200">
                            @if($blog->links)
                                <a href="{{ $blog->links }}"
                                   target="_blank"
                                   class="text-slate-700 underline">
                                    View
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td class="px-5 py-4 border-r border-slate-200 text-sm text-slate-500">
                            {{ $blog->created_at->format('d M Y') }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                   class="px-3 py-2 border border-slate-300 rounded-lg hover:bg-slate-100">
                                    Edit
                                </a>

                                <form action="{{ route('blogs.destroy', $blog->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this blog?')"
                                        class="px-3 py-2 border border-slate-300 rounded-lg hover:bg-slate-100">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="10" class="py-12 text-center text-slate-500">
                            No blogs found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>