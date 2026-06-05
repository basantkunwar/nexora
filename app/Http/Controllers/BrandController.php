<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

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
}
