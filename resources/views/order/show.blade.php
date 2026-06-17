<x-app-layout>

<div class="container mx-auto p-6">

    <div class="bg-white shadow-lg rounded-lg">

        <!-- Header -->
        <div class="border-b p-6 flex justify-between">
            <div>
                <h2 class="text-3xl font-bold">Invoice</h2>
                <p class="text-gray-500">
                 <h2 class="text-3xl font-bold">{{settings('project')}}</h2>

                    Order #{{ $order->order_number }}
                </p>
            </div>

            <div class="text-right">
                <h3 class="font-semibold">{{ $order->customer_name }}</h3>
                <p>{{ $order->phone }}</p>

                <p>
                    {{ $order->province }},
                    {{ $order->district }},
                    {{ $order->city }},
                    {{ $order->street }}
                </p>
            </div>
        </div>

        <!-- Order Information -->

        <div class="grid grid-cols-2 gap-6 p-6 border-b">

            <div>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
              
            </div>

            <div class="text-right">
                <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </div>

        </div>

        <!-- Products -->

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-3 text-left">#</th>

                        <th class="p-3 text-left">Product</th>

                        <th class="p-3 text-center">Price</th>

                        <th class="p-3 text-center">Discount</th>

                        <th class="p-3 text-center">Qty</th>

                        <th class="p-3 text-center">Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($orderitems as $item)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3">
                            {{ $item->product->name }}
                        </td>

                        <td class="text-center">
                            Rs. {{ number_format($item->price,2) }}
                        </td>

                        <td class="text-center">
                            Rs. {{ number_format($item->discount,2) }}
                        </td>

                        <td class="text-center">
                            {{ $item->quantity }}
                        </td>

                        <td class="text-center font-semibold">
                            Rs. {{ number_format($item->subtotal,2) }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- Totals -->
<div class="flex justify-end p-6">

    <div class="w-96">

        <table class="w-full">

            <tr>
                <td class="py-2">Subtotal</td>
                <td class="text-right">
                    Rs. {{ number_format($order->subtotal,2) }}
                </td>
            </tr>

            <tr>
                <td class="py-2">Discount</td>
                <td class="text-right text-red-600">
                    - Rs. {{ number_format($order->discount_amount,2) }}
                </td>
            </tr>

            <tr>
                <td class="py-2">Shipping Fee</td>
                <td class="text-right">
                    Rs. {{ number_format($order->shipping_fee,2) }}
                </td>
            </tr>

            @if($order->tax)
            <tr>
                <td class="py-2">Tax</td>
                <td class="text-right">
                    Rs. {{ number_format($order->tax,2) }}
                </td>
            </tr>
            @endif

            <tr class="border-t font-bold text-lg">
                <td class="pt-3">Grand Total</td>
                <td class="text-right pt-3 text-green-600">
                    Rs. {{ number_format($order->grand_total,2) }}
                </td>
            </tr>

        </table>

        <!-- Order Status -->
        <div class="mt-6 border-t pt-4">

            <div class="flex justify-between items-center">

                <p class="font-semibold">
                    Order Status:
                    @if($order->status == 'pending')
                        <span class="ml-2 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Pending
                        </span>
                    @elseif($order->status == 'confirmed')
                        <span class="ml-2 bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Confirmed
                        </span>
                    @endif
                </p>

            </div>

            @if($order->status == 'pending')
                <form action="{{ route('orders.confirm', $order->id) }}"
                      method="POST"
                      class="mt-4"
                      onsubmit="return confirm('Are you sure you want to confirm this order?')">

                    @csrf
                    @method('PATCH')

                    <button
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition">
                        <i class="fa-solid fa-check mr-2"></i>
                        Confirm Order
                    </button>

                </form>
            @endif

        </div>

    </div>

</div>
    </div>

</div>


</x-app-layout>