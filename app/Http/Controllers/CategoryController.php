<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
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
private function filters($categories, $request){
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
    public function index(){
        $categories=Category::query();
        $categories=$this->filters($categories,request());
        $categories=$categories->paginate(5);
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

    public function details($id){
        $categories=Category::all();
        $brands=Brand::all();
        $category=Category::find($id);
         $products = Products::where('category_id', $id)->get();

    return view('frontend.category.index', [
'products'=>$products,
'categories'=>$categories,
'brands'=>$brands
    ]);

    }
}
