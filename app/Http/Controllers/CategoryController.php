<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $request){
    $validate=$request->validated();
        $path=null;
       if ($request->hasFile('image')) {

     $path = $request->file('image')->store(
            'category-images',
            'public'
        );
        }
        $validate['image']=$path;
     Category::create($validate);
     return redirect()->route('category.create');
    }

    public function index(){
        $categories=Category::all();
        return view('category.index',compact('categories'));
    }
}
