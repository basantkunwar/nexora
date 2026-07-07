<x-app-layout>

<div class="p-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Advertisement Banners
            </h1>
            <p class="text-gray-500 text-sm mt-1">
                Manage all homepage banners from here
            </p>
        </div>
@can('create')
        <a href="{{ route('advertisement.create') }}"
           class="mt-4 md:mt-0 inline-flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">

            + Add Banner
        </a>
@endcan
    </div>

    <!-- Table -->
    <div class="bg-white border rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <!-- Table Head -->
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">

                    <tr>
                        <th class="px-6 py-4">sn</th>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Position</th>
                        <th class="px-6 py-4">Link Type</th>
                        <th class="px-6 py-4">Sort</th>
                        <th class="px-6 py-4">Status</th>
                        @can('action')
                        <th class="px-6 py-4 text-right">Actions</th>
                        @endcan
                    </tr>

                </thead>

                <!-- Table Body -->
                <tbody class="divide-y">

                    @forelse($advertisements as $ad)

                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>

                            <!-- Image -->
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/'.$ad->image) }}"
                                     class="w-20 h-12 object-cover rounded-lg border">
                            </td>

                            <!-- Position -->
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    {{ $ad->position }}
                                </span>
                            </td>

                            <!-- Link Type -->
                            <td class="px-6 py-4 capitalize text-gray-700">
                                {{ $ad->link_type }}
                            </td>

                            <!-- Sort -->
                            <td class="px-6 py-4 text-gray-700">
                                {{ $ad->sort_order }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">

                                @if($ad->status == 1)
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        Active
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                        Inactive
                                    </span>
                                @endif

                            </td>
@can('edit')
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right">

                                <div class="flex justify-end gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('advertisement.edit', $ad->id) }}"
                                       class="px-3 py-2 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200">

                                        Edit
                                    </a>

@can('delete')
                                    <!-- Delete -->
                                    <form action="{{ route('advertisement.destroy', $ad->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this banner?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="px-3 py-2 text-xs bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                                            Delete
                                        </button>

                                    </form>
@endcan
                                </div>

                            </td>

                        </tr>
@endcan
                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-500">
                                No advertisements found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>