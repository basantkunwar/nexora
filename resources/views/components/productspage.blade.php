<div class="px-4 sm:px-6 lg:px-10 py-8">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- FILTER SIDEBAR -->
       <aside class="lg:col-span-3">

    <div class="sticky top-24 self-start
                bg-white rounded-xl border
                shadow-sm p-4">

        <h2 class="font-bold text-lg mb-4">
            Filters
        </h2>

        <!-- Categories -->
        <div class="mb-5">
            <h3 class="font-medium text-sm mb-2">
                Categories
            </h3>

            <div class="h-24 overflow-y-auto border rounded-lg p-2 space-y-1">

                @foreach($categories as $category)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox"
                               name="categories[]"
                               value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach

            </div>
        </div>

        <!-- Brands -->
        <div class="mb-5">
            <h3 class="font-medium text-sm mb-2">
                Brands
            </h3>

            <div class="h-24 overflow-y-auto border rounded-lg p-2 space-y-1">

                @foreach($brands as $brand)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox"
                               name="brands[]"
                               value="{{ $brand->id }}">
                        {{ $brand->name }}
                    </label>
                @endforeach

            </div>
        </div>

        <!-- Price -->
        <div class="space-y-2">
            <input type="number"
                   placeholder="Min Price"
                   class="w-full rounded-lg border p-2 text-sm">

            <input type="number"
                   placeholder="Max Price"
                   class="w-full rounded-lg border p-2 text-sm">
        </div>

        <button class="w-full mt-4 bg-black text-white py-2 rounded-lg">
            Apply Filter
        </button>

    </div>

</aside>

        <!-- PRODUCTS -->
        <section class="lg:col-span-9">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">
                    Products
                </h2>

                <span class="text-gray-500">
                    {{ $products->count() }} Products
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

                @foreach($products as $product)
                    <x-cart :product="$product" />
                @endforeach

            </div>

        </section>

    </div>

</div>