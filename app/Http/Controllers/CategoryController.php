<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


public function edit($id){
    $category=Category::find($id);
    return view('category.edit',compact('category'));
}


    public function update(CategoryRequest $request,$id){
        $category=Category::find($id);
        $validate=$request->validated();
        $path=null;
        if ($request->hasFile('image')) {
            if($category->image){
                Storage::disk('public')->delete($category->image);
            }
         $path = $request->file('image')->store(
                'category-images',
                'public'
            );
        }
        $validate['image']=$path??$category->image;
        $category->update($validate);
        return redirect()->route('category.index');
    }

    public function delete($id){
        $category=Category::find($id);
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('category.index');
    }
}
