<?php
namespace App\Services;
use App\Models\Blogcategory;

class BlogcategoryService{
    public function filters($categories, $request){
    if ($request->filled('search')) {
        $categories->where('name', 'like', '%' . $request->search . '%');
    }
    if($request->filled('status')){
        $categories->where('status', $request->status);
    }
    if($request->filled('description')){
        $categories->where('description', 'like', '%' . $request->description . '%');
    }
    return $categories;
}
}