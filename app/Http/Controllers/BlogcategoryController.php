<?php

namespace App\Http\Controllers;
use App\Models\Blogcategory;
use App\Http\Requests\BlogCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\BlogcategoryService;

class BlogcategoryController extends Controller
{
    //
    private $BlogcategoryService;
    public function __construct(BlogcategoryService $BlogcategoryService){
        $this->BlogcategoryService=$BlogcategoryService;
    }
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
// private function filters($categories, $request){
//     if ($request->filled('search')) {
//         $categories->where('name', 'like', '%' . $request->search . '%');
//     }
//     if($request->filled('status')){
//         $categories->where('status', $request->status);
//     }
//     if($request->filled('description')){
//         $categories->where('description', 'like', '%' . $request->description . '%');
//     }
//     return $categories;
// }
public function index(){
    $categories=Blogcategory::query();
    $categories=$this->BlogcategoryService->filters($categories,request());
    $categories=$categories->paginate(5);
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
