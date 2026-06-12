<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Http\Requests\productsRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //
    public function create(){
        return view('products.create');
    }
    public function store(productsRequest $request){
        //
        $product=$request->validated();
        $path=null;
       if ($request->hasFile('image')) {

     $path = $request->file('image')->store(
            'products-images',
            'public'
        );
        }
        $product['image']=$path;
        Products::create($product);
        return redirect()->route('products.create');
    }
  private function filters($products, $request)
{
    if ($request->filled('search')) {
        $products->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $products->whereHas('category', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->category . '%');
        });
    }

    if ($request->filled('brand')) {
        $products->whereHas('brand', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->brand . '%');
        });
    }

    if ($request->filled('stock')) {
        $products->where('stock', $request->stock);
    }

    if ($request->filled('price')) {
        $products->where('price', $request->price);
    }

    if ($request->filled('status')) {
        $products->where('status', $request->status);
    }

    return $products;
}    public function index(Request $request){
    $products = Products::with(['brand', 'category']);
    $products=$this->filters($products,$request);
    $products = $products->paginate(16);   
    return view('products.index',compact('products'));
       
    }
    public function edit($id){
        $product=Products::find($id);
        return view('products.edit',compact('product'));
    }
    public function update(productsRequest $request,$id){
        $products=$request->validated();
         $product=Products::find($id);
        $path=$request->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store(
                'products-images',
                'public'
            );
        }
        $products['image']=$path??$product->image;
        $product->update($products);
        return redirect()->route('products.index');
    }
    public function delete($id){
        $product=Products::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function productdetails($id){
        $product=Products::find($id);
        $relatedProducts=Products::where('category_id', $product->category_id)->get();
        return view('frontend.products.productdetails',compact('product','relatedProducts'));
    }
public function search(Request $request)
{
    $search = $request->search;

    $products = Products::with(['brand', 'category'])

        // ===============================
        // 🔍 ORIGINAL SEARCH LOGIC (KEEPED AS IT IS)
        // ===============================
        ->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('discount', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('stock', 'LIKE', "%{$search}%")
                ->orWhereHas('brand', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        })

        // ===============================
        // 📦 FILTER: CATEGORY (NEW)
        // ===============================
        ->when($request->filled('categories'), function ($query) use ($request) {
            $query->whereIn('category_id', $request->categories);
        })

        // ===============================
        // 🏷 FILTER: BRAND (NEW)
        // ===============================
        ->when($request->filled('brands'), function ($query) use ($request) {
            $query->whereIn('brand_id', $request->brands);
        })

        // ===============================
        // 💰 FILTER: MIN PRICE (NEW)
        // ===============================
        ->when($request->filled('min_price'), function ($query) use ($request) {
            $query->where('price', '>=', $request->min_price);
        })

        // ===============================
        // 💰 FILTER: MAX PRICE (NEW)
        // ===============================
        ->when($request->filled('max_price'), function ($query) use ($request) {
            $query->where('price', '<=', $request->max_price);
        })

        // ===============================
        // 📄 PAGINATION
        // ===============================
        ->paginate(16);
    

    // ===============================
    // 📦 DATA FOR FILTER UI
    // ===============================
    $brands = Brand::all();
    $categories = Category::all();

    return view('frontend.products.search', compact(
        'products',
        'brands',
        'categories'
    ));
}
}
