<x-app-layout>

<div class="min-h-screen bg-slate-50 py-10 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Brands
                </h1>
                <p class="text-slate-500 mt-1">
                    Manage all product brands
                </p>
            </div>

            <a href="{{ route('brands.create') }}"
               class="bg-indigo-600 text-white px-5 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
                + Add Brand
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <!-- Head -->
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4">sn</th>
                            <th class="px-6 py-4">Logo</th>
                            <th class="px-6 py-4">Brand Name</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="divide-y divide-slate-200">

                        @foreach ($brands as $brand)
                        <tr class="hover:bg-slate-50 transition">

                            <!-- ID -->
                            <td class="px-6 py-4">
                                {{ $brand->id }}
                            </td>

                            <!-- Logo -->
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/'.$brand->image) }}"
                                     class="w-12 h-12 rounded-full object-cover border border-slate-300">
                            </td>

                            <!-- Name -->
                            <td class="px-6 py-4 font-semibold text-slate-800">
                                {{ $brand->name }}
                            </td>

                            <!-- Description -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ Str::limit($brand->description, 40) }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $brand->status == 'active'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700' }}">
                                    {{ $brand->status }}
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <!-- Edit -->
                                    <a href=""
                                       class="px-3 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                                        Edit
                                    </a>
<a href="" class="px-3 py-2 bg-green-500 text-white"> view</a>
                                    <!-- Delete -->
                                    <form action=""
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
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