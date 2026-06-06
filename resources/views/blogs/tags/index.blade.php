<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">

        <div>
            <h2 class="text-2xl font-semibold text-slate-800">Tags</h2>
            <p class="text-sm text-slate-500 mt-1">Manage blog tags easily</p>
        </div>

        <a href="{{ route('blogs.tags.create') }}"
           class="px-4 py-2 bg-slate-800 text-white text-sm rounded-lg hover:bg-slate-700 transition">
            + Add Tag
        </a>

    </div>

    <!-- Table -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full border-collapse">

                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            sn
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Tag Name
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Tag Slug
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Description

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Created At
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($tags as $tag)

                    <tr class="border-b border-slate-200 hover:bg-slate-50 transition">

                        <td class="px-6 py-4 border-r border-slate-200 text-slate-700">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 border-r border-slate-200 font-medium text-slate-800">
                            {{ $tag->name }}
                        </td>
                        <td class="px-6 py-4 border-r border-slate-200 font-medium text-slate-800">
                            {{ $tag->slug }}
                        </td>
                        <td class="px-6 py-4 border-r border-slate-200 font-medium text-slate-800">
                            {{ $tag->description }}
                        </td>

                        <td class="px-6 py-4 border-r border-slate-200 text-sm text-slate-500">
                            {{ $tag->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <!-- EDIT -->
                                <a href=""
                                   class="px-3 py-2 text-sm border border-slate-300 rounded-lg hover:bg-slate-100 transition">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form action=""
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this tag?')"
                                        class="px-3 py-2 text-sm border border-slate-300 rounded-lg hover:bg-slate-100 transition">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="text-center py-12 text-slate-500">
                            No tags found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>