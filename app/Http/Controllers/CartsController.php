<?php

namespace App\Http\Controllers;

use App\Models\cartItems;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;

class CartsController extends Controller
{
   public function store(Request $request)
{
    $product = Products::findOrFail($request->product_id);

    $price = $product->price;
    $discount = $product->discount ?? 0;

    // Price after discount
    $finalPrice = $price - ($price * $discount / 100);

    // Find or create cart
    $cart = Carts::firstOrCreate(
        ['user_id' => auth()->id()],
        [
            'total_items' => 0,
            'subtotal' => 0,
            'shipping_fee' => 0, // Example fixed shipping charge
            'grand_total' => 0,
        ]
    );

    // Check if product already exists
    $cartItem = cartItems::where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->first();

    if ($cartItem) {

        $cartItem->quantity += $request->quantity;


        $cartItem->subtotal = $cartItem->quantity * $finalPrice;

        $cartItem->save();

    } else {

        cartItems::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'subtotal' => $request->quantity * $finalPrice,
        ]);
    }

    // Recalculate totals
    $cart->total_items = cartItems::where('cart_id', $cart->id)
        ->sum('quantity');

    $cart->subtotal = cartItems::where('cart_id', $cart->id)
        ->sum('subtotal');

    // Fixed shipping charge
    $cart->shipping_fee = 100;

    // Fixed shipping charge
    $cart->grand_total = $cart->subtotal + $cart->shipping_fee;

    $cart->save();

    return back()->with('success', 'Product added to cart.');
}
   public function index()
{
    $carts = Carts::where('user_id', auth()->id())->first();

    if (!$carts) {
        return redirect()
            ->route('products.search')
            ->with('error', 'Your cart is empty. Please add products first.');
    }

    $cartitems = cartItems::where('cart_id', $carts->id)->get();

    if ($cartitems->isEmpty()) {
        return redirect()
            ->route('carts.index')
            ->with('Your cart is empty. Please add products first.');
    }

    return view('cart.index', compact('carts', 'cartitems'));
}


    public function delete($id)
{
    $cartItem = cartItems::findOrFail($id);

    $cart = Carts::findOrFail($cartItem->cart_id);

    $cartItem->delete();

    // Recalculate totals
    $cart->total_items = cartItems::where('cart_id', $cart->id)
        ->sum('quantity');

    $cart->grand_total = cartItems::where('cart_id', $cart->id)
        ->sum('subtotal');

    $cart->save();

    return back()->with('success', 'Product removed from cart');
}

    public function checkout(){
        $user = auth()->user();
        $carts = Carts::where('user_id', auth()->id())->first();
        $cartitems = collect();
        if($carts){
            $cartitems = cartItems::where('cart_id', $carts->id)->get();
        }
        return view('cart.checkout', compact('carts', 'cartitems', 'user'));
    }


  
    
}