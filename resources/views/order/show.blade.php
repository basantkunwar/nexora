<x-app-layout>
<style>
@media print {

    /* Hide everything */
    body * {
        visibility: hidden !important;
    }

    /* Show only printable area */
    #printable, #printable * {
        visibility: visible !important;
    }

    #printable {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    /* Hide layout parts (Jetstream / app layout) */
    header,
    nav,
    aside,
    .sidebar,
    .topbar {
        display: none !important;
    }

    /* Hide buttons / controls */
    #no-print,
    #no-print * {
        display: none !important;
    }
}
</style>
<div class="container mx-auto p-6">

    <div class="bg-white shadow-lg rounded-lg" id="printable">

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
        <div class="mt-6 border-t pt-4" id="no-print">

            <div class="flex justify-between items-center">

                <p class="font-semibold">
                    Order Status: <span class="capitalize text-green-600 bg-green-100 py-1 px-3 rounded-lg">{{ $order->status }}</span>
                   
            </div>
@can('super-admin')
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
            @endcan

            <div class="flex justify-end mt-4 ">
                <button onclick="window.print()" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">print</button>
            </div>
        </div>

    </div>

</div>
    </div>

</div>


</x-app-layout>