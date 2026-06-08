<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //
    public function create(){
        return view('brands.create');
    }
    public function store(BrandRequest $request){
        $validate=$request->validated();
            $path=null;
       if ($request->hasFile('image')) {

     $path = $request->file('image')->store(
            'brand-images',
            'public'
        );
        }
        $validate['image']=$path;
        Brand::create($validate);
        return redirect()->route('brands.create');
    }

    public function index(){
        $brands=Brand::all();
        return view('brands.index',compact('brands'));
    }

    public function edit($id){
        $brand=Brand::find($id);
        return view('brands.edit',compact('brand'));
    }

    public function update(BrandRequest $request,$id){
        $brand=Brand::find($id);
        $validate=$request->validated();
        $path=null;
        if ($request->hasFile('image')) {
            if($brand->image){
                Storage::disk('public')->delete($brand->image);
            }
         $path = $request->file('image')->store(
                'brand-images',
                'public'
            );
        }
        $validate['image']=$path??$brand->image;
        $brand->update($validate);
        return redirect()->route('brands.index');
    }

   public function details($id)
{
    $brand = Brand::findOrFail($id);

    $products = Products::where('brand_id', $id)->get();

    return view('frontend.brand.index', [
        'brand' => $brand,
        'products' => $products
    ]);
}
}
