<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Http\Requests\productsRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //
    public function create(){
        return view('products.create');
    }
    public function store(productsRequest $request){
        //
        $product=$request->validated();
        $path=null;
       if ($request->hasFile('image')) {

     $path = $request->file('image')->store(
            'products-images',
            'public'
        );
        }
        $product['image']=$path;
        Products::create($product);
        return redirect()->route('products.create');
    }

    public function index(){
        $products=Products::with('category','brand')->get();;
        return view('products.index',compact('products'));
    }
}
