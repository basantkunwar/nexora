<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function index(){
       
        $data = [];

    // User data (everyone)

    $data['myOrderCount'] = auth()->user()->orders()->count();
    $data['myTotalAmount'] = auth()->user()->orders()->where('grand_total', '>', 0)->sum('grand_total');
    

    // Admin data
    if (auth()->user()->hasRole('super-admin')) {
        $data['totalOrders'] = Order::count();
        $data['grandTotal'] = Order::where('grand_total', '>', 0)->sum('grand_total');
    }
    $orderStatus = Order::selectRaw('status, COUNT(*) as total')
    ->groupBy('status')
    ->get();
        $category=Category::all();
        $blog=Blog::all();
        $brand=Brand::all();
          $brands = Brand::withCount('products')->get();
          $categoryies = Category::withCount('products')->get();
        $user=User::all();
        $products=Products::all();
        return view('dashboard',[
            'user'=>$user,
            'products'=>$products,
            'category'=>$category,
            'blog'=>$blog,
            'brand'=>$brand,
            'brands'=>$brands,
            'categories'=>$categoryies,
             'orderStatus' => $orderStatus

        ],$data);
    }
    
}
