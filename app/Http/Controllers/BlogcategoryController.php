<?php

namespace App\Http\Controllers;
use App\Models\Blogcategory;
use App\Http\Requests\BlogCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogcategoryController extends Controller
{
    //
    public function create(){
        return view('blogs.categories.create');
    }
public function store(BlogCategoryRequest $request){
    $blogs=$request->validated();
    $path=null;
    if ($request->hasFile('image')) {
     $path = $request->file('image')->store(
        'blogcategory-images',
        'public'
    );
    }
    $blogs['image']=$path;  
    Blogcategory::create($blogs);
    return view('blogs.categories.create');
  
}
public function index(){
    $categories=Blogcategory::get();
    return view('blogs.categories.index' ,compact('categories'));
} 
public function edit($id){
    $category=Blogcategory::find($id);
    return view('blogs.categories.edit',compact('category'));
}
public function update(BlogCategoryRequest $request,$id){
    $category=Blogcategory::find($id);
    $blogs=$request->validated();
    $path=null;
    if ($request->hasFile('image')) {
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
     $path = $request->file('image')->store(
        'blogcategory-images',
        'public'
    );
    }
    $blogs['image']=$path??$category->image;
    Blogcategory::find($id)->update($blogs);
    return redirect()->route('blogs.categories.index');
}
public function delete($id){
    $category=Blogcategory::find($id);
    if($category->image){
        Storage::disk('public')->delete($category->image);
    }
    $category->delete();
    return redirect()->route('blogs.categories.index');
}
}
