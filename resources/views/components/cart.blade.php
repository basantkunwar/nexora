@props(['product'])
<div class="rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group bg-white">

    <!-- IMAGE -->
    <div class="relative overflow-hidden rounded-t-2xl w-full hover:w-full transition duration-500 h-52 bg-gray-100">
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
             alt="{{ $product->name }}">

        <!-- Status -->
        <span class="absolute top-3 left-3 px-2 py-1 text-xs rounded-full
            {{ $product->status === 'available' ? 'bg-green-500' : 'bg-red-500' }} text-white">
            {{ ucfirst($product->status) }}
        </span>

        <!-- Discount -->
        @if($product->discount)
        <span class="absolute top-3 right-3 px-2 py-1 text-xs bg-yellow-400 text-black rounded-full">
            {{ $product->discount }}%
        </span>
        @endif
    </div>

    <!-- CONTENT -->
    <div class="p-4 hover:shadow-xl transition duration-300">

        <!-- CATEGORY + BRAND -->
        <div class="flex justify-between text-xs text-gray-500 mb-2">
            <span>{{ $product->category->name ?? 'No Category' }}</span>
            <span>{{ $product->brand->name ?? 'No Brand' }}</span>
        </div>

        <!-- NAME -->
        <h2 class="text-lg font-semibold text-gray-800 truncate">
            {{ $product->name }}
        </h2>

        <!-- DESCRIPTION -->
        <p class="text-sm text-gray-500 mt-1 line-clamp-2">
            {{ $product->description }}
        </p>

        <!-- PRICE -->
        <div class="mt-3 flex items-center justify-between">

            <div>
                @if($product->discount)
                    <span class="text-red-500 font-bold">
                        Rs. {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }}
                    </span>
                    <span class="text-gray-400 line-through text-sm ml-1">
                        Rs. {{ $product->price }}
                    </span>
                @else
                    <span class="text-gray-800 font-bold">
                        Rs. {{ $product->price }}
                    </span>
                @endif
            </div>

            <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-600">
                Stock: {{ $product->stock }}
            </span>
        </div>

        <!-- ORDER FORM -->
        <form action="" method="POST" class="mt-4">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <!-- QUANTITY -->
            <div class="flex items-center justify-between border rounded-xl px-3 py-2">

                <button type="button" onclick="decreaseQty(this)"
                    class="text-xl fs-4 h-5 font-bold px-2">−</button>

                <input type="number"
                       name="quantity"
                       value="1"
                       min="1"
                       max="{{ $product->stock }}"
                       class="w-12 text-center outline-none">

                <button type="button" onclick="increaseQty(this)"
                    class="text-xl fs-4 h-5 font-bold px-2">+</button>

            </div>

            <!-- BUTTONS -->
            <div class="mt-3 flex gap-2">

                <button type="submit"
                    class="flex-1 bg-blue-600 text-white py-2 rounded-xl hover:bg-gray-800 transition">
                    Add to Cart
                </button>

                <a href="#"
                   class="px-3 py-2 border rounded-xl hover:bg-gray-100 transition">
                    ❤️
                </a>

            </div>
        </form>

    </div>
</div>
