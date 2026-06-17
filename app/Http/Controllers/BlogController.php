<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogtags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\BlogService;

class BlogController extends Controller
{
    //
    public $blogService;
    public function __construct(BlogService $blogService){
        $this->blogService=$blogService;
    }

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

    
    // private function filters($blogs,$request){
        
    // if ($request->filled('category')) {
    //     $blogs->whereHas('blogcategory', function ($q) use ($request) {
    //         $q->where('name', 'like', '%' . $request->category . '%');
    //     });
    // }

    //   if ($request->filled('tag')) {
    //     $blogs->whereHas('tags', function ($q) use ($request) {
    //         $q->where('name', 'like', '%' . $request->tag . '%');
    //     });
    //   }  

    //   if($request->filled('search')){
    //     $blogs->where('title','like','%'.$request->search.'%');
    //   }
    //   if($request->filled('status')){
    //     $blogs->where('status',$request->status);
    //   }
    //   if($request->filled('description')){
    //     $blogs->where('description','like','%'.$request->description.'%');
    //   }
    
    //     return $blogs;
    // }
public function index(){
    $categories=Blogcategory::all();
    $tags=Blogtags::all();
        $blogs=Blog::with('blogcategory','blogtags');
    $blogs=$this->blogService->filters($blogs,request());
    $blogs=$blogs->paginate(5);
        return view('blogs.index',compact('blogs','categories','tags'));
    }

// public function show(){
//     $blogs=Blog::with('blogcategory','blogtags');
//     $blogs=$this->filters($blogs,request());
//     $blogs=$blogs->paginate(5);
//     return view('blogs.show',compact('blogs'));

// }
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