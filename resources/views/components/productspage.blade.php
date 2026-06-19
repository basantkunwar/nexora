<div class="px-4 sm:px-6 lg:px-10 py-8">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- ===========================
             FILTER SIDEBAR
        ============================ -->
        <aside class="lg:col-span-3">

            <div class="sticky top-24 bg-white rounded-2xl shadow-lg border p-6">

                <!-- Filter Header -->
                <div class="flex items-center justify-between mb-5">

                    <h2 class="text-xl font-bold">
                        Filters
                    </h2>

                    <a href="{{ redirect()->getUrlGenerator()->current() }}"
                        class="text-sm text-red-500 hover:text-red-600">
                        Clear
                    </a>

                </div>

                <!-- ===========================
                     FILTER FORM
                ============================ -->
                <form action="{{ route('products.search') }}"
                    method="GET"
                    class="space-y-6">

                    <!-- ===========================
                         CATEGORY FILTER
                    ============================ -->
                    <div>

                        <h3 class="font-semibold mb-3 text-gray-700">
                            Categories
                        </h3>

                        <div class="max-h-52 overflow-y-auto border rounded-xl p-3 space-y-2">

                            @foreach ($categories as $category)

                                <label class="flex items-center gap-2 cursor-pointer">

                                    <input
                                        type="checkbox"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                        class="rounded text-green-600"

                                        {{ in_array($category->id, request()->categories ?? []) ? 'checked' : '' }}>

                                    <span class="text-sm text-gray-700">
                                        {{ $category->name }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    <!-- ===========================
                         BRAND FILTER
                    ============================ -->
                    <div>

                        <h3 class="font-semibold mb-3 text-gray-700">
                            Brands
                        </h3>

                        <div class="max-h-52 overflow-y-auto border rounded-xl p-3 space-y-2">

                            @foreach ($brands as $brand)

                                <label class="flex items-center gap-2 cursor-pointer">

                                    <input
                                        type="checkbox"
                                        name="brands[]"
                                        value="{{ $brand->id }}"
                                        class="rounded text-green-600"

                                        {{ in_array($brand->id, request()->brands ?? []) ? 'checked' : '' }}>

                                    <span class="text-sm text-gray-700">
                                        {{ $brand->name }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    <!-- ===========================
                         PRICE FILTER
                    ============================ -->
                    <div>

                        <h3 class="font-semibold mb-3 text-gray-700">
                            Price Range
                        </h3>

                        <div class="space-y-3">

                            <input
                                type="number"
                                name="min_price"
                                placeholder="Minimum Price"
                                value="{{ request('min_price') }}"
                                class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none">

                            <input
                                type="number"
                                name="max_price"
                                placeholder="Maximum Price"
                                value="{{ request('max_price') }}"
                                class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none">

                        </div>

                    </div>

                    <!-- ===========================
                         APPLY FILTER BUTTON
                    ============================ -->
                    <button
                        type="submit"
                        class="w-full bg-black text-white py-3 rounded-xl hover:bg-gray-800 transition">

                        Apply Filters

                    </button>

                </form>

            </div>

        </aside>

        <!-- ===========================
             PRODUCTS SECTION
        ============================ -->
        <section class="lg:col-span-9">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">

                <h2 class="text-2xl font-bold">
                    Products
                </h2>

                <span class="text-gray-500">
                    {{ $products->count() }} Products
                </span>

            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

                @forelse ($products as $product)

                    <x-cart :product="$product" />

                @empty

                    <div class="col-span-full text-center py-16">

                        <h3 class="text-xl font-semibold text-gray-600">
                            No Products Found
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Try changing your filters.
                        </p>

                    </div>

                @endforelse

            </div>

            {{-- <!-- Pagination -->
            <div class="mt-8">
                {{ $products->withQueryString()->links() }}
            </div> --}}

        </section>

    </div>

</div>