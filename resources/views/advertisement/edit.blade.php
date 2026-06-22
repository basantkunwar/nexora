<x-app-layout>
<div class="grid grid-cols-1 gap-8 p-8">

    <!-- ================= Banner Card ================= -->
    <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">
<form action="{{ route('advertisement.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
                       @csrf
@method('PUT')
        <!-- Card Header -->
        <div class="px-8 py-6 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 16l4-4a2 2 0 012.828 0l2.344 2.344a2 2 0 002.828 0L20 10m-2-6H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2z"/>

                    </svg>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        Banner Image
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Upload the advertisement banner that will appear on your website.
                    </p>
                </div>

            </div>
        </div>

        <!-- Card Body -->
        <div class="p-8">

            <div class="grid lg:grid-cols-2 gap-8">

                <!-- Preview -->
                <div>

                    <label class="text-sm font-semibold text-gray-700">
                        Preview
                    </label>

                    <div
                        class="mt-3 h-64 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-100 overflow-hidden flex items-center justify-center">

                        <img
                            id="previewImage"
                            src="{{ asset('storage/'.$ad->image) }}"
                            class="w-full h-full object-cover">

                    </div>

                </div>

                <!-- Upload -->
                <div>

                    <label class="text-sm font-semibold text-gray-700">
                        Upload Banner
                        <span class="text-red-500">*</span>
                    </label>

                    <div
                        class="mt-3 border-2 border-dashed border-blue-300 rounded-2xl p-8 bg-blue-50">

                        <div class="text-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-14 h-14 mx-auto text-blue-600 mb-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

                            </svg>

                            <h3 class="font-semibold text-gray-800 text-lg">
                                Choose Banner Image
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                PNG, JPG or WEBP
                            </p>

                            <p class="text-sm text-gray-500 mb-6">
                                Recommended Size:
                                <span class="font-semibold">
                                    1600 × 500 px
                                </span>
                            </p>

                            <input
                                id="imageInput"
                                type="file"
                                name="image"
                                accept="image/*"
                                class="block w-full text-sm text-gray-700
                                file:mr-4
                                file:py-3
                                file:px-6
                                file:rounded-xl
                                file:border-0
                                file:bg-blue-600
                                file:text-white
                                hover:file:bg-blue-700
                                file:cursor-pointer">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= Link & Display Settings ================= -->

    <div class="bg-white border border-gray-200 rounded-3xl shadow-sm">

        <div class="px-8 py-6 border-b">

            <h2 class="text-xl font-bold text-gray-800">
                Advertisement Settings
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Configure where this banner redirects and where it appears.
            </p>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

            <!-- Link Type -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Link Type
                </label>

                <select
                    name="link_type"
                    value="{{ $ad->link_type }}"
                    id="link_type"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <option value="none">No Link</option>
                    <option value="product" {{ $ad->link_type=='product' ? 'selected' : ''}}>Product</option>
                    <option value="category" {{ $ad->link_type=='category' ? 'selected' : ''}}>Category</option>
                    <option value="brand" {{ $ad->link_type=='brand' ? 'selected' : ''}}>Brand</option>

                </select>

                <p class="text-xs text-gray-400 mt-2">
                    Select what should open when users click this banner.
                </p>

            </div>

            <!-- Item -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Select Item
                </label>

                <select
                    id="link_id"
                    name="link_id"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <option value="">
                        Select Item
                    </option>

                </select>

                <p class="text-xs text-gray-400 mt-2">
                    Items are loaded automatically after selecting the link type.
                </p>

            </div>

            <!-- Position -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Position
                </label>

                <select
                    name="position"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <option value="top_banner"{{ $ad->position=='top_banner' ? 'selected' : ''}} >
                        Top Banner
                    </option>

                    <option value="bellowtop_banner" {{ $ad->position=='bellowtop_banner' ? 'selected' : ''}}>
                        Below Top Banner
                    </option>

                    <option value="middle_banner" {{ $ad->position=='middle_banner' ? 'selected' : ''}}>
                        Middle Banner
                    </option>

                    <option value="bellowmiddle_banner" {{ $ad->position=='bellowmiddle_banner' ? 'selected' : ''}}>
                        Below Middle Banner
                    </option>

                    <option value="bottom_banner" {{ $ad->position=='bottom_banner' ? 'selected' : ''}}>
                        Bottom Banner
                    </option>

                </select>

            </div>

                          <!-- Display Order -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order
                </label>

                <div class="relative">

                    <input
                        type="number"
                        value="{{ $ad->sort_order }}"
                        name="sort_order"
                        value="1"
                        min="1"
                        class="w-full rounded-xl border-gray-300 shadow-sm
                               focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500
                               pl-12 py-3">

                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7h8M8 12h8M8 17h8M4 7h.01M4 12h.01M4 17h.01"/>

                        </svg>

                    </div>

                </div>

                <p class="text-xs text-gray-400 mt-2">
                    Lower numbers appear first.
                </p>

            </div>

            <!-- Status -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border-gray-300 shadow-sm
                           focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 py-3">

                    <option value="1" {{ $ad->status=='1' ? 'selected' : ''}}>
                        🟢 Active
                    </option>

                    <option value="0" {{ $ad->status=='0' ? 'selected' : ''}}>
                        🔴 Inactive
                    </option>

                </select>

                <p class="text-xs text-gray-400 mt-2">
                    Only active banners will be displayed on the website.
                </p>

            </div>

        </div>

    </div>

    <!-- Footer Card -->
    <div
        class="bg-gradient-to-r from-slate-900 via-blue-900 to-slate-900
               rounded-3xl shadow-xl overflow-hidden mt-8">

        <div
            class="px-8 py-6 flex flex-col lg:flex-row
                   items-center justify-between gap-6">

            <div>

                <h3 class="text-xl font-bold text-white">
                    Ready to Publish?
                </h3>

                <p class="text-blue-100 mt-1">
                    Review your advertisement settings and save it to make it available on your website.
                </p>

            </div>

            <button
                type="submit"
                class="inline-flex items-center gap-3
                       bg-white text-blue-700
                       font-semibold
                       px-8 py-4
                       rounded-xl
                       shadow-lg
                       hover:bg-blue-50
                       hover:scale-105
                       transition duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>

                </svg>

                update Advertisement

            </button>

        </div>

    </div>

</form>

</div>

</div>

{{-- AJAX --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Image Preview
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {
            previewImage.src = URL.createObjectURL(file);
        }

    });

    // AJAX Item Loading
    const linkType = document.getElementById('link_type');
    const linkId = document.getElementById('link_id');

    linkType.addEventListener('change', function () {

        let type = this.value;

        linkId.innerHTML = '<option>Loading...</option>';

        fetch(`{{ url('/advertisement/items') }}/${type}`)
            .then(response => response.json())
            .then(data => {

                linkId.innerHTML = '<option value="">Select Item</option>';

                data.forEach(item => {

                    linkId.innerHTML += `
                        <option value="${item.id}">
                            ${item.name}
                        </option>
                    `;

                });

            })
            .catch(error => {

                console.error(error);

                linkId.innerHTML = '<option>Error loading data</option>';

            });

    });

});
</script>

</x-app-layout>