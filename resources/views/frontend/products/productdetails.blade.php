@extends('layouts.frontend')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- PRODUCT TOP SECTION -->
    <div class="grid lg:grid-cols-12 gap-8">

        <!-- IMAGE GALLERY -->
        <div class="lg:col-span-5">

            <div class="bg-white rounded-3xl shadow-lg p-4 border">
                <img src="{{ asset('storage/'.$product->image) }}"
                    class="w-full h-[500px] object-contain rounded-2xl hover:scale-105 transition duration-500"
                    alt="{{ $product->name }}">
            </div>

            <!-- Thumbnails -->
            <div class="grid grid-cols-4 gap-3 mt-4">
                <div class="border rounded-xl p-2 bg-white cursor-pointer">
                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-20 object-cover rounded-lg">
                </div>
                <div class="border rounded-xl p-2 bg-white cursor-pointer">
                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-20 object-cover rounded-lg">
                </div>
                <div class="border rounded-xl p-2 bg-white cursor-pointer">
                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-20 object-cover rounded-lg">
                </div>
                <div class="border rounded-xl p-2 bg-white cursor-pointer">
                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-20 object-cover rounded-lg">
                </div>
            </div>

        </div>

        <!-- PRODUCT INFO -->
        <div class="lg:col-span-4">

            <div class="space-y-5">

                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                        {{ $product->category->name ?? 'Category' }}
                    </span>

                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
                        {{ $product->brand->name ?? 'Brand' }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $product->name }}
                </h1>

                <div class="flex items-center gap-2">
                    <div class="text-yellow-400 text-lg">
                        ★★★★★
                    </div>
                    <span class="text-gray-500">
                        (120 Reviews)
                    </span>
                </div>

                <p class="text-gray-600 leading-relaxed">
                    {{ $product->description }}
                </p>

                <div class="flex items-center gap-3">
                    <span class="text-green-600 font-semibold">
                        ● In Stock ({{ $product->stock }})
                    </span>
                </div>

                <div class="border-t pt-5">

                    <h3 class="font-semibold mb-3">
                        Key Features
                    </h3>

                    <ul class="space-y-2 text-gray-600">
                        <li>✓ Genuine Product</li>
                        <li>✓ Fast Delivery Available</li>
                        <li>✓ Warranty Support</li>
                        <li>✓ Secure Payment</li>
                    </ul>

                </div>

            </div>

        </div>

        <!-- BUY BOX -->
        <div class="lg:col-span-3">

            <div class="sticky top-24 bg-white border rounded-3xl shadow-xl p-6">

                @if($product->discount)

                    <div class="mb-3">
                        <span class="text-4xl font-bold text-red-600">
                            Rs.
                            {{ number_format($product->price - ($product->price * $product->discount / 100),2) }}
                        </span>

                        <div class="mt-2">
                            <span class="line-through text-gray-400">
                                Rs. {{ $product->price }}
                            </span>

                            <span class="ml-2 bg-red-100 text-red-600 px-2 py-1 rounded-lg text-sm">
                                {{ $product->discount }}% OFF
                            </span>
                        </div>
                    </div>

                @else

                    <span class="text-4xl font-bold text-gray-900">
                        Rs. {{ number_format($product->price,2) }}
                    </span>

                @endif

                <p class="text-green-600 mt-3">
                    ✓ Available for Delivery
                </p>

                <form action="" method="POST" class="mt-6">
                    @csrf

                    <div class="border rounded-xl flex items-center justify-between px-4 py-3">

                        <button type="button"
                            onclick="decreaseQty(this)"
                            class="font-bold text-xl">
                            -
                        </button>

                        <input type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="w-16 text-center outline-none">

                        <button type="button"
                            onclick="increaseQty(this)"
                            class="font-bold text-xl">
                            +
                        </button>

                    </div>

                    <button
                        class="w-full mt-4 bg-yellow-400 hover:bg-yellow-500 text-black py-3 rounded-xl font-semibold transition">
                        Add to Cart
                    </button>

                    <button
                        class="w-full mt-3 bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-semibold transition">
                        Buy Now
                    </button>

                    <button
                        class="w-full mt-3 border py-3 rounded-xl hover:bg-gray-50 transition">
                        ❤️ Add to Wishlist
                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- DESCRIPTION SECTION -->
    <div class="mt-12 bg-white rounded-3xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6">
            Product Description
        </h2>

        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($product->description)) !!}
        </div>

    </div>

    <!-- SPECIFICATIONS -->
    <div class="mt-8 bg-white rounded-3xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6">
            Specifications
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div class="flex justify-between border-b pb-3">
                <span>Brand</span>
                <span>{{ $product->brand->name ?? '-' }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span>Category</span>
                <span>{{ $product->category->name ?? '-' }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span>Status</span>
                <span>{{ ucfirst($product->status) }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span>Stock</span>
                <span>{{ $product->stock }}</span>
            </div>

        </div>

    </div>

    <!-- RELATED PRODUCTS -->
    <div class="mt-12">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">
                Related Products
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($relatedProducts as $product)

                <x-cart :product="$product" />

            @endforeach 

        </div>

    </div>

</div>
@endsection