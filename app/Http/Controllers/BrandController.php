<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use App\Models\Category;
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
    private function filters($brands,$request){
        if($request->filled('search')){
            $brands->where('name','like','%'.$request->search.'%');
        }
        if($request->filled('status')){
            $brands->where('status',$request->status);
        }
        if($request->filled('description')){
            $brands->where('description','like','%'.$request->description.'%');
        }
        return $brands;
    }

    public function index(request $request){
        $brands=Brand::query();
        $brands=$this->filters($brands,request());
        $brands=$brands->paginate(5);   
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
    $brands = Brand::all();
    $categories =Category::all();
    $brand = Brand::findOrFail($id);

    $products = Products::where('brand_id', $id)->get();

    return view('frontend.brand.index', [
        'brands' => $brands,
        'categories' => $categories,
        'products' => $products
    ]);
}
}
