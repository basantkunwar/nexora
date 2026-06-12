<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
       

        <a href="{{ route('blogs.categories.create') }}"
           class="px-5 py-2.5 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition">
            Add Category
        </a>
    </div>
    <div class="mb-2">
        <form action="" class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <input type="text" name="search" placeholder="Search..." class="border border-gray-200 rounded-md px-4 py-2 w-full" value="{{ request()->search }}" >
            <input type="text" name="description" placeholder="Description..." class="border border-gray-200 rounded-md px-4 py-2 w-full" value="{{ request()->description }}">
            <input type=" text" name="slug" placeholder="Slug..." class="border border-gray-200 rounded-md px-4 py-2 w-full" value="{{ request()->slug }}">
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition">Filter</button>
        </form>
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
                            Category Name
                        </th>


                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Description
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            image
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            slug
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700 border-r border-slate-200">
                            Created At
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr class="border-b border-slate-200 hover:bg-slate-50 transition">

                        <td class="px-6 py-4 border-r border-slate-200">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 border-r border-slate-200 font-medium text-slate-800">
                            {{ $category->name }}
                        </td>

                        <td class="px-6 py-4 border-r border-slate-200 text-sm text-slate-500">
                            {{ $category->description }}
                        </td>
                       
                        <td class="px-5 py-4 border-r border-slate-200">
                            <img src="{{ asset('storage/'.$category->image) }}"
                                 class="w-14 h-14 rounded-lg object-cover border border-slate-200">
                        </td>
                        <td class="px-6 py-4 border-r border-slate-200 text-sm text-slate-500">
                            {{ $category->slug }}
                        </td>
                        <td class="px-6 py-4 border-r border-slate-200 text-sm text-slate-500">
                            {{ $category->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('blogs.categories.edit', $category->id) }}"
                                   class="px-3 py-2 border border-slate-300 rounded-lg hover:bg-slate-100">
                                    Edit
                                </a>

                                <form action="{{ route('blogs.categories.destroy', $category->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this category?')"
                                        class="px-3 py-2 border border-slate-300 rounded-lg hover:bg-slate-100">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="text-center py-12 text-slate-500">
                            No categories found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>