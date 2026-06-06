<x-app-layout>

<div class="min-h-screen bg-slate-50 p-6">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Products
                </h1>
                <p class="text-slate-500 mt-1">
                    Manage all your products here
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               class="bg-indigo-600 text-white px-5 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
                + Add Product
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <!-- Head -->
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4">sn</th>
                            <th class="px-6 py-4">Image</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Stock</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Brand</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody class="divide-y divide-slate-200">

                        @foreach ($products as $product)
                            <tr class="hover:">

                            <!-- ID -->
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <!-- Image -->
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     class="w-12 h-12 rounded-lg object-cover border">
                            </td>

                            <!-- Name -->
                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $product->name }}
                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4">
                                Rs.{{ $product->price }}
                            </td>

                            <!-- Stock -->
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $product->status == 'available'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700' }}">
                                    {{ $product->status }}
                                </span>
                            </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                               ">
                                {{ $product->category?->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                               ">
                                {{ $product->brand?->name }}
                            </span>
                        </td>


                            <!-- Actions -->
                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <!-- View -->
                                    <a href=""
                                       class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                        View
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{route('products.edit', $product->id)}}"
                                       class="px-3 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('products.destroy', $product->id) }}"
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