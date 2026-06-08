<x-app-layout>

<div class="min-h-screen bg-slate-50 py-10 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Categories
                </h1>
                <p class="text-slate-500 mt-1">
                    Manage product categories
                </p>
            </div>

            <a href="{{ route('category.create') }}"
               class="bg-blue-600 text-black px-5 py-3 rounded-xl hover:bg-blue-800 transition">
                + Add Category
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <!-- Head -->
                    <thead class="bg-blue-500 text-slate-700">
                        <tr>
                            <th class="px-6 py-4 border-b border-slate-200">sn</th>
                            <th class="px-6 py-4 border-b border-slate-200">Image</th>
                            <th class="px-6 py-4 border-b border-slate-200">Category Name</th>
                            <th class="px-6 py-4 border-b border-slate-200">Description</th>
                            <th class="px-6 py-4 border-b border-slate-200">Status</th>
                            <th class="px-6 py-4 border-b border-slate-200 text-center">Actions</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody>

                        @foreach ($categories as $category)
                        <tr class="hover:bg-slate-50 transition">

                            <!-- ID -->
                            <td class="px-6 py-4 border-b border-slate-100">
                                {{ $loop->iteration }}
                            </td>

                            <!-- Image -->
                            <td class="px-6 py-4 border-b border-slate-100">
                                <img src="{{ asset('storage/'.$category->image) }}"
                                     class="w-10 h-10 rounded-md object-cover border border-slate-200">
                            </td>

                            <!-- Name -->
                            <td class="px-6 py-4 border-b border-slate-100 font-medium text-slate-800">
                                {{ $category->name }}
                            </td>

                            <!-- Description -->
                            <td class="px-6 py-4 border-b border-slate-100 text-slate-500">
                                {{ Str::limit($category->description, 40) }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 border-b border-slate-100">
                                <span class="text-xs px-3 py-1 rounded-full border
                                   'border-green-300 text-green-600'
                                        : 'border-red-300 text-red-600' }}">
                                    {{ $category->status }}
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 border-b border-slate-100">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('category.edit', $category->id) }}"
                                       class="px-3 py-1.5 text-xs border border-slate-300 rounded-lg hover:bg-slate-100 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('category.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>