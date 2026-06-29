<x-app-layout>

<div class="min-h-screen bg-slate-50 py-10 px-6">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
               
                <p class="text-slate-500 mt-1">
                    Manage all product brands
                </p>
            </div>

            <a href="{{ route('brands.create') }}"
               class="bg-indigo-600 text-white px-5 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
                + Add Brand
            </a>
        </div>
    </div>
<div class="mb-2">
    <form action="{{ route('brands.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-3">
          <select name="category"
    class="border border-gray-200 rounded-md px-4 py-2 w-full">

    <option value="">brand name</option>

    @foreach ($brands as $brand)
        <option value="{{ $brand->name }}"
            {{ request('brand') == $brand->name ? 'selected' : '' }}>
            {{ $brand->name }}
        </option>
    @endforeach
        <input type="text" name="description" placeholder="Description..." class="border border-gray-200 rounded-md px-4 py-2 w-full" value="{{ request()->description }}">
        <select name="status"
    class="border border-gray-200 rounded-md px-4 py-2 w-full">

    <option value="">Select Status</option>

    <option value="available"
        {{ request('status') == 'available' ? 'selected' : '' }}>
        Available
    </option>

    <option value="not_available"
        {{ request('status') == 'outofstock' ? 'selected' : '' }}>
        outofstock
    </option>

</select>
        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition">Filter</button>

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
                       @can('action')     <th class="px-6 py-4 text-center">Actions</th>@endcan
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
                            @can('update')
                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <!-- Edit -->
                                    <a href="{{route('brands.edit', $brand->id)}}"
                                       class="px-3 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                                        Edit
                                    </a>
<a href="" class="px-3 py-2 bg-green-500 text-white"> view</a>
                                    <!-- Delete -->
       @can('delete')                             
                                    <form action="{{ route('brands.destroy', $brand->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            Delete
                                        </button>

                                    </form>
@endcan
                                </div>

                            </td>
@endcan
                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
{{ $brands->links() }}
        </div>

    </div>

</div>

</x-app-layout>