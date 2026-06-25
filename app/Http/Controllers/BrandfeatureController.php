<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Brandfeature;
use Illuminate\Http\Request;

class BrandfeatureController extends Controller
{
    public function create(){
        $brands = Brand::all();
        $featured=Brandfeature::where('id',1)->first();
        return view('brandfeatured.create',compact('brands','featured'));
    }

    public function store(Request $request){
       
    $request->validate([
        'title' => 'required',
        'brand_id' => 'required',
    ]);

    Brandfeature::updateOrCreate(
        ['id' => 1], // always use the first row
        [
            'title' => $request->title,
            'brand_id' => $request->brand_id,
            'product_limit' => $request->product_limit ?? 8,
            'status' => $request->status ?? 1,
        ]
    );

        return redirect()->route('brandfeature.create');
    }
}
