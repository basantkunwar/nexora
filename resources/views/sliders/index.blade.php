<x-app-layout>

    <div class="flex justify-end">
        <a href="{{route('sliders.create')}}">
            <button class="rounded-lg py-3 px-6 shadow-lg font-semibold fs-4 text-black bg-blue-500 hover:bg-blue-700">
                +create sliders
            </button>
        </a>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-xl overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left">sn</th>
                                <th class="px-4 py-3 text-left">Preview</th>
                                <th class="px-4 py-3 text-left">Title</th>
                                <th class="px-4 py-3 text-left">button text</th>
                                <th class="px-4 py-3 text-left">Text color</th>
                                <th class="px-4 py-3 text-left">alignment</th>
                                <th class="px-4 py-3 text-left">Position</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Start</th>
                                <th class="px-4 py-3 text-left">End</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($sliders as $slider)

                                <div class="border-b hover:bg-gray-50">

                                    <td class="px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <img
                                            src="{{ asset('storage/'.$slider->desktop_image) }}"
                                            class="w-24 h-14 object-cover rounded-lg border"
                                            alt="">
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="font-medium">
                                            {{ $slider->title ?? 'No Title' }}
                                        </div>

                                        @if($slider->button_link)
                                            <div class="text-xs text-gray-500 truncate max-w-xs">
                                                {{ $slider->button_link }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $slider->button_text }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $slider->text_color }}
                                    </td>
                                <td class="px-4 py-3">
                                    {{ $slider->text_alignment }}
                                </td>

                                    <td class="px-4 py-3">
                                        {{ $slider->position }}
                                    </td>
                                    

                                    <td class="px-4 py-3">
                                        @if($slider->status)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                                {{ $slider->status }}
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                   <td class="px-4 py-3">
    {{ $slider->start_at ? \Carbon\Carbon::parse($slider->start_at)->format('d M Y') : '-' }}
</td>

<td class="px-4 py-3">
    {{ $slider->end_at ? \Carbon\Carbon::parse($slider->end_at)->format('d M Y') : '-' }}
</td>

                                    <td class="px-4 py-3">

                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('sliders.edit', $slider) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('sliders.destroy', $slider) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this slider?')">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="text-center py-8 text-gray-500">
                                        No sliders found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-4">
                    {{ $sliders->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>