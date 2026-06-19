<x-app-layout>

<div class="bg-white rounded-xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-3xl font-bold">Orders</h2>
            <p class="text-gray-500">Manage Customer Orders</p>
        </div>

        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg">
            Total Orders : {{ $orders->total() }}
        </span>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4">SN</th>

                    <th class="p-4">Order Number</th>

                    <th class="p-4">Customer</th>

                    <th class="p-4">Ordered On</th>

                    <th class="p-4 text-center">Status</th>

                    <th class="p-4 text-center">Action</th>

                </tr>

            </thead>

            <tbody>

            @foreach($orders as $order)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">{{ $loop->iteration }}</td>

                    <td class="p-4 font-semibold text-blue-600">
                        {{ $order->order_number }}
                    </td>

                    <td class="p-4">
                        {{ $order->customer_name }}
                    </td>

                    <td class="p-4">
                        {{ $order->created_at->format('d M Y') }}
                    </td>

                    <td class="p-4 text-center">

                        <form action="{{ route('orders.status',$order->id) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            @php

                                $colors = [
                                    'pending'=>'bg-yellow-500',
                                    'confirmed'=>'bg-blue-500',
                                    'processing'=>'bg-indigo-500',
                                    'shipped'=>'bg-purple-500',
                                    'delivered'=>'bg-green-600',
                                ];

                            @endphp

                            <button
                                onclick="return confirm('Change order status?')"
                                class="{{ $colors[$order->status] ?? 'bg-gray-500' }} text-white px-4 py-2 rounded-lg capitalize">

                                {{ $order->status }}

                            </button>

                        </form>

                    </td>

                    <td class="flex justify-center gap-2 pt-4">


                        <a href="{{ route('orders.show',$order->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg">

                            <i class="fa fa-eye"></i>

                        </a>
                        <form action="{{ route('orders.destroy', $order) }}" method="post"   onsubmit="return confirm('Are you sure you want to delete this order?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
        <i class="fa fa-trash"></i>
    </button>
</form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-5">
        {{ $orders->links() }}
    </div>

</div>

</x-app-layout>