<div class="px-4 sm:px-6 lg:px-10 py-8">
    <div class="flex justify-end mb-4">
    <button onclick="openFilterMenu()"
            class="bg-black text-white px-4 py-2 rounded">
        Filter
    </button>
</div>
<!-- Overlay -->
<!-- Overlay -->
<div id="overlay"
     class="fixed inset-0 bg-black/40 hidden z-40"
     onclick="closeFilterMenu()"></div>

<!-- Side Filter -->
<div id="filterMenu"
     class="fixed top-0 right-0  w-80 bg-white shadow-lg z-50
            transform translate-x-full transition-transform duration-300">

    <!-- Header -->
    <div class="p-4 border-b flex justify-between items-center">
        <h2 class="text-lg font-semibold">Filters</h2>
        <button onclick="closeFilterMenu()">✕</button>
    </div>

    <!-- Content -->
    <form action="{{route('products.search')}}"
          method="GET"
          class="p-4 flex flex-col gap-6">

        <!-- CATEGORY (SCROLL BOX) -->
        <div>
            <h3 class="font-semibold mb-2">Categories</h3>

            <div class="max-h-24 overflow-y-auto border rounded p-2 space-y-2">
                @foreach($categories as $category)
                    <label class="flex items-center gap-2">
                        <input type="checkbox"
                               name="categories[]"
                               value="{{ $category->id }}"
                               class="accent-green-600">
                        <span class="text-sm">{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- BRAND (SCROLL BOX) -->
        <div>
            <h3 class="font-semibold mb-2">Brands</h3>

            <div class="class max-h-24 overflow-y-auto border rounded p-2 space-y-2">
                @foreach($brands as $brand)
                    <label class="flex items-center gap-2">
                        <input type="checkbox"
                               name="brands[]"
                               value="{{ $brand->id }}"
                               class="accent-green-600">
                        <span class="text-sm">{{ $brand->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- PRICE -->
        <div>
            <h3 class="font-semibold mb-2">Price</h3>

            <input type="number"
                   name="min_price"
                   placeholder="Min Price"
                   class="border p-2 rounded w-full mb-2">

            <input type="number"
                   name="max_price"
                   placeholder="Max Price"
                   class="border p-2 rounded w-full">
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="bg-green-600 text-white py-2 rounded w-full">
            Apply Filter
        </button>

    </form>
</div>
    <!-- Products -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <x-cart :product="$product" />
        @endforeach
    </div>

</div>