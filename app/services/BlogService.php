<?php
namespace App\Services;
use App\Models\Blog;

class BlogService{

public function filters($blogs,$request){
        
    if ($request->filled('category')) {
        $blogs->whereHas('blogcategory', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->category . '%');
        });
    }

      if ($request->filled('tag')) {
        $blogs->whereHas('tags', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->tag . '%');
        });
      }  

      if($request->filled('search')){
        $blogs->where('title','like','%'.$request->search.'%');
      }
      if($request->filled('status')){
        $blogs->where('status',$request->status);
      }
      if($request->filled('description')){
        $blogs->where('description','like','%'.$request->description.'%');
      }
    
        return $blogs;
    }
}
