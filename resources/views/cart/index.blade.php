<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nexora</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-100">

    <div class="max-w-7xl mx-auto px-4 py-8">

        <!-- PAGE TITLE -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-slate-800">
                Shopping Cart
            </h1>

            <a href="{{redirect()->intended()->getTargetUrl()}}"
                class="bg-white px-5 py-2 rounded-lg shadow hover:bg-slate-50">
                <i class="fa fa-arrow-left mr-2"></i>
                Continue Shopping
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- CART ITEMS -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl shadow overflow-hidden">

                    <table class="w-full">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="text-left p-4">sn</th>
                                <th class="text-left p-4">Product</th>
                                <th class="text-center p-4">Price</th>
                                <th class="text-center p-4">discount </th>
                                <th class="text-center p-4">Quantity</th>
                                <th class="text-center p-4">Subtotal</th>
                                <th class="text-center p-4">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- PRODUCT ROW -->
                            @foreach($cartitems as $item)
                            <tr class="border-t">
<td class="p-4">{{$loop->iteration}}</td>
                                <td class="p-4">
                                   {{$item->product->name}}
                                </td>

                                <td class="text-center font-semibold">
                                    {{$item->product->price}}
                                </td>
                       <td class="text-center font-semibold">
                                    {{$item->product->discount}}%</td>
                                    <td class="text-center font-semibold">
                              <button type="button" onclick="decrease(this)">-</button>

<input type="text"
       value="{{ $item->quantity }}"
       class="quantity w-12 text-center">

<button type="button" onclick="increase(this)">+</button>
                                    </td>
                                <td class="text-center font-bold text-green-600">
                                    {{$item->subtotal}}
                                </td>

                               <td class="text-center">
    <form action="{{ route('carts.destroy', $item->id) }}" onsubmit="return confirm('Are you sure to delete this cart item?')" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit"
            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</td>
                            </tr>
@endforeach
                          
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- CART SUMMARY -->
            <div>

                <div class="bg-white rounded-2xl shadow p-6 sticky top-5">

                    <h2 class="text-xl font-bold mb-5">
                        Cart Summary
                    </h2>

                    <div class="space-y-4">

                        <div class="flex justify-between">
                            <span>Total Items</span>
                            <span>{{$carts->total_items}}</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>{{$cartitems->sum('subtotal')}}</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span>$0</span>
                        </div>

                        <hr>

                        <div class="flex justify-between text-xl font-bold">
                            <span>Total</span>
                            <span class="text-green-600"></span>
                        </div>

                    </div>

                    <a href="{{route('carts.checkout')}}"><button
                        class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">
                        <i class="fa fa-credit-card mr-2"></i>
                        Proceed To Checkout
                    </button></a>

                    <a href="{{redirect()->intended()->getTargetUrl()}}"
                        class="block text-center mt-4 border py-3 rounded-xl hover:bg-slate-50">
                        Continue Shopping
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
<script>
function increase(btn) {
    let input = btn.parentElement.querySelector('.quantity');
    input.value = parseInt(input.value) + 1;
}

function decrease(btn) {
    let input = btn.parentElement.querySelector('.quantity');

    let value = parseInt(input.value);

    if (value > 1) {
        input.value = value - 1;
    }
}
</script>
</html>