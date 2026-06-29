<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderdetailsRequest;
use App\Models\cartItems;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\orderplacemail;

class OrderController extends Controller
{
    //
   public function store(OrderdetailsRequest $request)
{
    $validate=$request->validated();
    $cart = Carts::where('user_id', auth()->id())->firstOrFail();

    $cartItems = CartItems::where('cart_id', $cart->id)->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Your cart is empty.');
    }

    $totalDiscount = 0;

    // Create Order
    $order = Order::create([
        'user_id' => auth()->id(),
        'order_number' => 'ORD-' . strtoupper(uniqid()),

        'total_items' => $cart->total_items,
        'subtotal' => $cart->subtotal,
        'shipping_fee' => $cart->shipping_fee,
        'discount_amount' => 0,
        'grand_total' => $cart->grand_total,

        'customer_name' => auth()->user()->name,
        'phone' => $request->phone,

        'province' => $request->province,
        'district' => $request->district,
        'city' => $request->city,
        'ward' => $request->ward,

        'address' => $request->address,
        'landmark' => $request->landmark,
        'notes' => $request->notes,
    ]);

    foreach ($cartItems as $item) {

        $price = $item->product->price;

        $discount = $item->product->discount ?? 0;

        $discountAmount = ($price * $discount / 100) * $item->quantity;

        $totalDiscount += $discountAmount;

        OrderItems::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $price,
            'discount' => $discountAmount,
            'subtotal' => $item->subtotal,
        ]);
    }

    // Update discount
    $order->update([
        'discount_amount' => $totalDiscount,
    ]);
    // return auth()->user()->email;
    Mail::to(auth()->user()->email)->send(new orderplacemail($order));
    // Mail::raw('Hello! Your Laravel mail is working.', function ($message) {
    //     $message->to('bashantkunwar888@gmail.com')
    //             ->subject('Laravel Test Mail');
    // });


    // Clear cart
   Carts::where('user_id', auth()->id())->delete();

    return redirect()
        ->route('home')
        ->with('success', 'Order placed successfully.');
}

public function index()
{
    $orders = Order::latest()->paginate(10);

    return view('order.index', compact('orders'));
}

public function show($id)
{
    if (auth()->user()->hasRole('super-admin|admin|manager')) {

        $order = Order::findOrFail($id);

    } else {

        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
    }

    $orderitems = OrderItems::where('order_id', $order->id)->get();

    return view('order.show', compact('order', 'orderitems'));
}

public function myorders()
{
    $orders = Order::where('user_id', auth()->id())
        ->latest()
        ->paginate(10);

    return view('order.index', compact('orders'));
}
public function pending(Order $order)
{
    $orders=Order::where('status','pending')->latest()->paginate(5);

    return view('order.pending', compact('orders'));
}
public function confirmed(Order $order)
{
    $orders=Order::where('status','confirmed')->latest()->paginate(5);

    return view('order.confirm', compact('orders'));
}
public function process(Order $order)
{
    $orders=Order::where('status','processing')->latest()->paginate(5);

    return view('order.process', compact('orders'));

}
    public function shipped()
{
    $orders=Order::where('status','shipped')->latest()->paginate(5);

    return view('order.shipped', compact('orders'));
}

    public function delivered()
{
    $orders=Order::where('status','delivered')->latest()->paginate(5);

    return view('order.delivered', compact('orders'));
}

public function changeStatus(Order $order)
{
    switch ($order->status) {

        case 'pending':
            $order->status = 'confirmed';
            break;

        case 'confirmed':
            $order->status = 'processing';
            break;

        case 'processing':
            $order->status = 'shipped';
            break;

        case 'shipped':
            $order->status = 'delivered';
            break;

        default:
            $order->status = 'delivered';
    }

    $order->save();

    return back()->with('success','Order status updated successfully.');
}

public function delete(Order $order){
    $order->delete();
    return back()->with('success','Order deleted successfully.');
}

}