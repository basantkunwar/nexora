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
    public function edit($id){
        $product=Products::find($id);
        return view('products.edit',compact('product'));
    }
    public function update(productsRequest $request,$id){
        $products=$request->validated();
         $product=Products::find($id);
        $path=$request->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store(
                'products-images',
                'public'
            );
        }
        $products['image']=$path??$product->image;
        $product->update($products);
        return redirect()->route('products.index');
    }
    public function destroy($id){
        $product=Products::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
