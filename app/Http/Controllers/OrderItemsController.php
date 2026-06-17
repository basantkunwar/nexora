<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    //
    public function index()
{
    $orders=Order::latest()->paginate(15);

    return view('order.status', compact('orders'));
}
}
