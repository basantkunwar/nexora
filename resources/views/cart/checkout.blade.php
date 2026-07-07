<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nexora</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold mb-8 text-slate-800">
            Checkout
        </h1>


        <form id="orderForm" action="{{route('orders.store')}}" method="POST">
    @csrf

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- LEFT SECTION -->
        <div class="lg:col-span-2 space-y-6">

            <!-- CUSTOMER INFO -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h2 class="text-xl font-semibold mb-4">
                    Customer Information
                </h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">
                            Full Name
                        </label>

                        <input type="text"
                            value="{{ Auth::user()->name }}"
                            readonly
                            class="w-full border rounded-xl px-4 py-3 bg-slate-50">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">
                            Email
                        </label>

                        <input type="text"
                            value="{{ Auth::user()->email }}"
                            readonly
                            class="w-full border rounded-xl px-4 py-3 bg-slate-50">
                    </div>

                </div>
            </div>

            <!-- ADDRESS -->
            <div class="bg-white rounded-2xl shadow-sm p-6">

                <h2 class="text-xl font-semibold mb-6">
                    Shipping Address
                </h2>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Phone Number
                        </label>

                        <input type="text" value="{{old('phone')}}"
                            name="phone"
                            class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Province
                        </label>

                        <select name="province"
                            class="w-full border rounded-xl px-4 py-3" required>

                            <option value="">Select Province</option>
                            <option value="Koshi">Koshi</option>
                            <option value="Madhesh">Madhesh</option>
                            <option value="Bagmati">Bagmati</option>
                            <option value="Gandaki">Gandaki</option>
                            <option value="Lumbini">Lumbini</option>
                            <option value="Karnali">Karnali</option>
                            <option value="Sudurpashchim">Sudurpashchim</option>

                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            District
                        </label>

                        <input type="text" value="{{old('district')}}"
                            name="district"
                            class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Municipality
                        </label>

                        <input type="text"
                            name="city" value="{{old('city')}}"
                            class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Ward No
                        </label>

                        <input type="text"
                            name="ward" value="{{old('ward')}}"
                            class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">
                            Street Address
                        </label>

                        <textarea
                            name="address"
                            rows="3"
                            class="w-full border rounded-xl px-4 py-3" required>{{old('address')}}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">
                            Landmark
                        </label>

                        <input type="text"
                            name="landmark" value="{{old('landmark')}}"
                            class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">
                            Order Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="3"
                            class="w-full border rounded-xl px-4 py-3" required>{{old('notes')}}</textarea>
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div>

            <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-5">

                <h2 class="text-xl font-semibold mb-4">
                    Order Summary
                </h2>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3">Product</th>
                                <th class="text-center py-3">Qty</th>
                                <th class="text-right py-3">Price</th>
                                <th class="text-right py-3">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($cartitems as $item)
                            <tr class="border-b">

                                <td class="py-3">
                                    {{ $item->product->name }}
                                </td>

                                <td class="text-center">
                                    {{ $item->quantity }}
                                </td>

                                <td class="text-right">
                                    Rs {{ number_format($item->product->price) }}
                                </td>

                                <td class="text-right font-medium">
                                    Rs {{ number_format($item->subtotal) }}
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="mt-5 space-y-2">

                    <div class="flex justify-between">
                        <span>Total Items</span>
                        <span>{{ $carts->total_items }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Total Amount</span>
                        <span>Rs {{ number_format($carts->grand_total) }}</span>
                    </div>

                </div>

                <hr class="my-5">

                <div class="mt-5">
                    <h3 class="font-semibold mb-3">
                        Payment Method
                    </h3>

                    <label class="flex items-center gap-3 border rounded-xl p-3">
                        <input type="radio"
                            name="payment_method"
                            value="cod"
                            checked>

                        <span>Cash On Delivery</span>
                    </label>
                </div>

               <button
    id="placeOrderBtn"
    type="submit"
    class="w-full mt-6 bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white py-4 rounded-xl font-semibold">
    Place Order
</button>

            </div>

        </div>

    </div>

</form>

    </div>
<script>
const form = document.querySelector("form");
const btn = document.getElementById("placeOrderBtn");

form.addEventListener("submit", function () {

    btn.disabled = true;
    btn.innerHTML = `
        <svg class="animate-spin h-5 w-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4l3-3-3-3v4A10 10 002 12h2z">
            </path>
        </svg>
        Placing Order...
    `;
});
</script>
</body>
</html>