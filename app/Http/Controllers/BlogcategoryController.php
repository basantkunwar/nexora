<?php

namespace App\Http\Controllers;
use App\Models\Blogcategory;
use App\Http\Requests\BlogCategoryRequest;
use Illuminate\Http\Request;

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
}
