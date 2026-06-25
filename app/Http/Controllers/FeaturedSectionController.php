<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FeaturedSection;
use Illuminate\Http\Request;

class FeaturedSectionController extends Controller
{
    //
    public function create(){
        $categories = Category::all();
        $featured=FeaturedSection::where('id',1)->first();
        return view('featured.create',compact('categories','featured'));
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
    ]);

    FeaturedSection::updateOrCreate(
        ['id' => 1], // always use the first row
        [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'product_limit' => $request->product_limit ?? 8,
            'status' => $request->status ?? 1,
        ]
    );

    return redirect()
        ->route('featured.create')
        ->with('success', 'Featured category updated successfully.');
}

   
}
