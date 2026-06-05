<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Blog;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function index(){
        $user=User::all();
        $products=Products::all();
        return view('dashboard',[
            'user'=>$user,
            'products'=>$products
        ]);
    }
}
