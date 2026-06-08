<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $blogs=Blog::with('blogcategory','blogtags')->get();
        return view('blogs.index',compact('blogs'));
    }
public function show(){
    $blogs=Blog::with('blogcategory','blogtags')->get();
    return view('blogs.show',compact('blogs'));

}
public function edit($id){
    $blog=Blog::find($id);
    return view('blogs.edit',compact('blog'));

}

public function update(BlogRequest $request,$id){
    $blog=Blog::find($id);
    $blogs=$request->validated();
    $path=null;
    if ($request->hasFile('image')) {
        if($blog->image){
        Storage::disk('public')->delete($blog->image);
        }
     $path = $request->file('image')->store(
        'blog-images',
        'public'
    );
    }
    $blogs['image']=$path??$blog->image;
    Blog::find($id)->update($blogs);
    return redirect()->route('blogs.show');
}


public function delete($id){
    $blog=Blog::find($id);
    if($blog->image){
        Storage::disk('public')->delete($blog->image);
    }
    $blog->delete();
    return redirect()->route('blogs.show');
}

public function blog(){
$blogs=Blog::with('blogcategory','blogtags')->get();
    return view('frontend.blogs.blog',compact('blogs'));
}
public function blogdetails($id){ 
$blogs=Blog::with('blogcategory','blogtags')->get();   
$blog=Blog::with('blogcategory','blogtags')->find($id);
    return view('frontend.blogs.blogdetails',compact('blog'));
}}