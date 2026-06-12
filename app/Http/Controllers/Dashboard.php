<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function index(){
        if(!auth()->user()->hasRole('admin|super-admin')) {
            
            return redirect()->route('dashboard');
        };
        $category=Category::all();
        $blog=Blog::all();
        $brand=Brand::all();
        $user=User::all();
        $products=Products::all();
        return view('dashboard',[
            'user'=>$user,
            'products'=>$products,
            'category'=>$category,
            'blog'=>$blog,
            'brand'=>$brand
        ]);
    }
}
