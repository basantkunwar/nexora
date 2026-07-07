<x-app-layout>

    <div class="bg-white rounded-xl shadow-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Orders
                </h2>

                <p class="text-gray-500">
                    Manage all customer orders
                </p>
            </div>

            <span
                class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-semibold">
                Total Orders :
                {{ $orders->total() }}
            </span>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr class="text-left">

                        <th class="px-5 py-4">sn</th>

                        <th class="px-5 py-4">
                            Order No
                        </th>

                        <th class="px-5 py-4">
                            Customer
                        </th>

                        <th class="px-5 py-4">
                            Location
                        </th>

                        <th class="px-5 py-4 text-center">
                            Items
                        </th>


                        <th class="px-5 py-4">
                            Grand Total
                        </th>

                        <th class="px-5 py-4">
                            Status
                        </th>

                        <th class="px-5 py-4">
                            Ordered On
                        </th>

                        <th class="px-5 py-4 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-5 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="font-bold text-blue-600">
                                {{ $order->order_number }}
                            </div>

                        </td>

                        <td class="px-5 py-4">

                            <div class="font-semibold">
                                {{ $order->customer_name }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $order->phone }}
                            </div>

                        </td>

                        <td class="px-5 py-4">

                            <div>
                                {{ $order->city }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $order->district }}
                            </div>

                        </td>

                        <td class="px-5 py-4 text-center font-semibold">

                            {{ $order->total_items }}

                        </td>
                        <td class="px-5 py-4">

                            <span
                                class="font-bold text-lg text-green-600">

                                Rs.
                                {{ number_format($order->grand_total,2) }}

                            </span>

                        </td>

                        <td class="px-5 py-4">

                            @switch($order->status)

                                @case('pending')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-2 rounded-full text-sm font-semibold">
                                 Pending
                                </span>

                                @break

                                @case('confirmed')

                                <span class="bg-blue-100 text-blue-700 px-3 py-2 rounded-full text-sm font-semibold">
                                    Confirmed
                                </span>

                                @break

                                @case('processing')

                                <span class="bg-indigo-100 text-indigo-700 px-3 py-2 rounded-full text-sm font-semibold">
                                     Processing
                                </span>

                                @break

                                @case('shipped')

                                <span class="bg-purple-100 text-purple-700 px-3 py-2 rounded-full text-sm font-semibold">
                                    Shipped
                                </span>

                                @break

                                @case('delivered')

                                <span class="bg-green-100 text-green-700 px-3 py-2 rounded-full text-sm font-semibold">
                                    ✅ Delivered
                                </span>

                                @break

                                @default

                                <span class="bg-red-100 text-red-700 px-3 py-2 rounded-full text-sm font-semibold">
                                    ❌ Cancelled
                                </span>

                            @endswitch

                        </td>

                        <td class="px-5 py-4">

                            {{ $order->created_at->format('d M Y') }}

                            <div class="text-sm text-gray-500">

                                {{ $order->created_at->format('h:i A') }}

                            </div>

                        </td>


                     <td class="px-5 py-4">
    <div class="flex items-center justify-center gap-3">

        <!-- View Button -->
        <a href="{{ route('orders.show', $order->id) }}"
           class="w-10 h-10 flex items-center justify-center rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
            <i class="fa fa-eye"></i>
        </a>

        <!-- Cancel Button -->
        @if(auth()->user()->hasRole('super-admin|admin|manager') && !in_array($order->status, ['cancelled', 'delivered']))
            <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    onclick="return confirm('Are you sure you want to cancel this order?')"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                    Cancel
                </button>
            </form>
        @endif

    </div>
</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="12" class="text-center py-10 text-gray-500">

                            No Orders Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $orders->links() }}

        </div>

    </div>

</x-app-layout>