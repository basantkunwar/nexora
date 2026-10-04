@role('admin|super-admin|manager')
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

                    <td class="text-center p-4">

                        <form action="{{ route('orders.status',$order->id) }}"
                              method="POST" class="flex justify-center gap-2">

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

                                change status

                            </button>
                            <span class="text-white bg-green-600 py-2 rounded-lg px-4">{{$order->status}}</span>
                        </form>
                        
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

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-5">
        {{ $orders->links() }}
    </div>

</div>

</x-app-layout>
@endrole