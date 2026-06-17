<x-app-layout>

    <div class="bg-white rounded-xl shadow-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Order Items
                </h2>

                <p class="text-gray-500">
                    Manage all purchased products
                </p>
            </div>

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold">
                Total Items : {{ $orderItems->total() }}
            </span>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-5 py-4">#</th>

                        <th class="px-5 py-4">Order No</th>

                        <th class="px-5 py-4">Product</th>

                        <th class="px-5 py-4">Customer</th>

                        <th class="px-5 py-4 text-center">Qty</th>

                        <th class="px-5 py-4">Unit Price</th>

                        <th class="px-5 py-4">Discount</th>

                        <th class="px-5 py-4">Subtotal</th>

                        <th class="px-5 py-4">Ordered On</th>

                        <th class="px-5 py-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($orderItems as $item)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-5 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-blue-600">
                                {{ $item->order->order_number }}
                            </td>

                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <img src="{{ asset($item->product->image) }}"
                                         class="w-14 h-14 rounded-lg object-cover border">

                                    <div>

                                        <div class="font-semibold">
                                            {{ $item->product->name }}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            Product ID :
                                            {{ $item->product->id }}
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td class="px-5 py-4">

                                <div class="font-semibold">
                                    {{ $item->order->customer_name }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    {{ $item->order->phone }}
                                </div>

                            </td>

                            <td class="px-5 py-4 text-center">

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">
                                    {{ $item->quantity }}
                                </span>

                            </td>

                            <td class="px-5 py-4">
                                Rs. {{ number_format($item->price,2) }}
                            </td>

                            <td class="px-5 py-4 text-red-600">
                                Rs. {{ number_format($item->discount,2) }}
                            </td>

                            <td class="px-5 py-4 font-bold text-green-600">
                                Rs. {{ number_format($item->subtotal,2) }}
                            </td>

                            <td class="px-5 py-4">

                                {{ $item->created_at->format('d M Y') }}

                                <div class="text-sm text-gray-500">
                                    {{ $item->created_at->format('h:i A') }}
                                </div>

                            </td>

                            <td class="px-5 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href=""
                                        class="bg-blue-500 hover:bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <a href=""
                                        class="bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center py-10 text-gray-500">

                                <i class="fa-solid fa-box-open text-4xl mb-3"></i>

                                <p>No Order Items Found</p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $orderItems->links() }}

        </div>

    </div>

</x-app-layout>