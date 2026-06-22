<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //
    public function create()
    {
        return view('advertisement.create');
    }

   public function getItems($type)
{
    if ($type == 'product') {
        return response()->json(Products::select('id', 'name')->get());
    }

    if ($type == 'category') {
        return response()->json(Category::select('id', 'name')->get());
    }

    if ($type == 'brand') {
        return response()->json(Brand::select('id', 'name')->get());
    }

    return response()->json([]);
}

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image',
            'link_type'=>'required',
            'position'=>'required',
            'sort_order'=>'required|integer'
        ]);
$path=null;
       if($request->hasFile('image')){
               $path=$request->file('image')->store('sliders','public');
           }

        Advertisement::create([
         'image'=>$path,
            'link_type'=>$request->link_type,
            'link_id'=>$request->link_id,
            'position'=>$request->position,
            'sort_order'=>$request->sort_order,
            'status'=>$request->status ?? 1
        ]);

        return redirect()->back()->with('success','Slider Created');
    }

    public function index()
    {
        $advertisements=Advertisement::all();
        return view('advertisement.index',compact('advertisements'));
    }

    public function edit($id){
        $ad=Advertisement::find($id);
        return view('advertisement.edit',compact('ad'));
    }

    public function update($id,Request $request){
$ad=Advertisement::find($id);
$validate=$request->validate([
    'link_type'=>'required',
    'link_id'=>'required',
    'position'=>'required',
    'sort_order'=>'required|integer'
]);
$path=$ad->image;
if($request->hasFile('image')){
    $path=$request->file('image')->store('sliders','public');
}
$ad->update([
    'image'=>$path,
    'link_type'=>$request->link_type,
    'link_id'=>$request->link_id,
    'position'=>$request->position,
    'sort_order'=>$request->sort_order,
    'status'=>$request->status ?? 1
]);
return redirect()->route('advertisement.index')->with('success','Slider Updated');
    }
}

