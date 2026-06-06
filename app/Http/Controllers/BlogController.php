<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function create(){
        return view('blogs.create');
    }
    public function store(BlogRequest $request){
        $blogs=$request->validated();
        $path=null;
        if ($request->hasFile('image')) {
         $path = $request->file('image')->store(
            'blog-images',
            'public'
        );
        }
        $blogs['image']=$path;  
        Blog::create($blogs);
        return view('blogs.create');
    }

    public function index(){
        return view('blogs.index');
    }
public function show(){
    $blogs=Blog::with('blogcategory','blogtags')->get();
    return view('blogs.show',compact('blogs'));

}

}
