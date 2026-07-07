<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogtagsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandfeatureController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\FeaturedSectionController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\usercontroller;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

Route::get('/',[Homecontroller::class,'index'])->name('home');

Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// products routes
Route::get('/products/create', [productsController::class, 'create'])->name('products.create');
Route::post('/products/store', [productsController::class, 'store'])->name('products.store');   
route::get('/products/index', [productsController::class, 'index'])->name('products.index');
Route::get('/products/edit/{id}', [productsController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [productsController::class, 'update'])->name('products.update');
Route::delete('/products/delete/{id}', [productsController::class, 'delete'])->name('products.destroy');  
route::get('frontend/products/search', [productsController::class, 'search'])->name('products.search');


// brand routes
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/index', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/update/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/delete/{id}', [BrandController::class, 'delete'])->name('brands.destroy');



// category routes
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.destroy');


// contact routes//pages routes
Route::get('pages/contact',[ContactController::class,'contact'])->name('pages.contact');
Route::post('pages/create',[ContactController::class,'create'])->name('pages.create');
route::get('contact/index',[ContactController::class,'index'])->name('contact.index');

// user routes
Route::get('users/index',[usercontroller::class, 'index'])->name('users.index');
route::delete('users/delete/{id}',[usercontroller::class, 'delete'])->name('users.destroy');


// blog routes
Route::get('blogs/create',[BlogController::class, 'create'])->name('blogs.create');
Route::post('blogs/store',[BlogController::class, 'store'])->name('blogs.store');
Route::get('blogs/show',[BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs/index',[BlogController::class, 'index'])->name('blogs.index');
route::get('blogs/edit/{id}',[BlogController::class, 'edit'])->name('blogs.edit');
route::put('blogs/update/{id}',[BlogController::class, 'update'])->name('blogs.update');
route::delete('blogs/delete/{id}',[BlogController::class, 'delete'])->name('blogs.destroy');

// blog category routes
Route::get('blogs/categories/create', [BlogcategoryController::class, 'create'])->name('blogs.categories.create');
Route::post('blogs/categories/store', [BlogcategoryController::class, 'store'])->name('blogs.categories.store');
Route::get('blogs/categories/index', [BlogcategoryController::class, 'index'])->name('blogs.categories.index');
Route::get('blogs/categories/edit/{id}', [BlogcategoryController::class, 'edit'])->name('blogs.categories.edit');
Route::put('blogs/categories/update/{id}', [BlogcategoryController::class, 'update'])->name('blogs.categories.update');
Route::delete('blogs/categories/delete/{id}', [BlogcategoryController::class, 'delete'])->name('blogs.categories.destroy');


// blog tags routes
Route::get('blogs/tags/create', [BlogtagsController::class, 'create'])->name('blogs.tags.create');
Route::post('blogs/tags/store', [BlogtagsController::class, 'store'])->name('blogs.tags.store');
Route::get('blogs/tags/index', [BlogtagsController::class, 'index'])->name('blogs.tags.index');
Route::get('blogs/tags/edit/{id}', [BlogtagsController::class, 'edit'])->name('blogs.tags.edit');
Route::put('blogs/tags/update/{id}', [BlogtagsController::class, 'update'])->name('blogs.tags.update');
Route::delete('blogs/tags/delete/{id}', [BlogtagsController::class, 'destroy'])->name('blogs.tags.destroy');

// settings routes
Route::get('settings/index', [SettingController::class, 'index'])->name('settings.index');
Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');


// roles routes
Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index');
route::post('roles/create', [RoleController::class, 'create'])->name('roles.create');
route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
route::get('roles/show', [RoleController::class, 'show'])->name('roles.show');
route::put('roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
route::delete('roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.destroy');
Route::get('roles/assign_permissions/{id}', [RoleController::class, 'assign_permission'])->name('roles.assign_permissions');
Route::get('roles/role_assign/{id}',[RoleController::class,'showroles'])->name('roles.role_assign');
Route::post('roles/assign/{id}',[RoleController::class,'assign'])->name('roles.assign');

// permissions routes
Route::get('permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
route::put('permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
route::delete('permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissions.destroy');
Route::post('permissions/assign/{id}',[PermissionController::class,'assign'])->name('permissions.assign');

// sliders routes
Route::get('sliders/index', [SliderController::class, 'index'])->name('sliders.index');
route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
route::post('sliders/store', [SliderController::class, 'store'])->name('sliders.store');
route::get('sliders/edit/{slider}', [SliderController::class, 'edit'])->name('sliders.edit');
route::put('sliders/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
route::delete('sliders/delete/{id}', [SliderController::class, 'delete'])->name('sliders.destroy');

// carts routes
Route::get('cart/index', [CartsController::class, 'index']) ->middleware(['auth', 'verified'])->name('carts.index');
Route::post('cart/store', [CartsController::class, 'store'])->middleware(['auth', 'verified'])->name('carts.store');
Route::delete('cart/delete/{id}', [CartsController::class, 'delete'])->name('carts.destroy');
// Route::post('cart/store', [CartsController::class,'store'])->name('carts.store');
Route::post('cart/update/{id}', [CartsController::class,'update'])->name('carts.update');
Route::get('cart/checkout', [CartsController::class, 'checkout'])->middleware(['auth', 'verified'])->name('carts.checkout');

// cartitems routes
Route::get('cartitems/index', [CartItemsController::class, 'index'])->name('cartitems.index');
Route::post('cartitems/store/', [CartItemsController::class, 'store'])->name('cartitems.store');
Route::delete('cartitems/delete/{id}', [CartItemsController::class, 'delete'])->name('cartitems.destroy');
Route::post('cartitems/update/{id}', [CartItemsController::class, 'update'])->name('cartitems.update');
Route::get('cartitems/checkout', [CartItemsController::class, 'checkout'])->name('cartitems.checkout');

//order routes
Route::get('order/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('order/show/{id}',[OrderController::class,'show'])->name('orders.show');
Route::post('orders/store/', [OrderController::class, 'store'])->name('orders.store');
Route::delete('orders/delete/{order}', [OrderController::class, 'delete'])->name('orders.destroy');
Route::post('orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::get('orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::patch('/order/{order}/confirm', [OrderController::class, 'confirm'])
    ->name('orders.confirm');
    Route::patch('/order/{order}/status', [OrderController::class,'changeStatus'])
    ->name('orders.status');
Route::get('/order/pending', [OrderController::class, 'pending'])->name('orders.pending');
 Route::get('/order/confirm', [OrderController::class, 'confirmed'])->name('orders.confirmed');
 Route::get('/order/process', [OrderController::class, 'process'])->name('orders.process');
 Route::get('/order/shipped', [OrderController::class, 'shipped'])->name('orders.shipped');
 Route::get('/order/delivered', [OrderController::class, 'delivered'])->name('orders.delivered'); 
 Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])
    ->name('orders.cancel');
//  my orders route
Route::get('myorders', [OrderController::class, 'myorders'])->name('myorders');

// order item route
Route::get('orderstatus/index',[OrderItemsController::class,'index'])->name('orderstatus.index');

// advertise routes
Route::get('advertisement/index', [AdvertisementController::class, 'index'])->name('advertisement.index');
Route::get('advertisement/create', [AdvertisementController::class, 'create'])->name('advertisement.create');
Route::post('advertisement/store', [AdvertisementController::class, 'store'])->name('advertisement.store');
Route::get('advertisement/edit/{id}', [AdvertisementController::class, 'edit'])->name('advertisement.edit');
Route::put('advertisement/update/{id}', [AdvertisementController::class, 'update'])->name('advertisement.update');
Route::delete('advertisement/delete/{id}', [AdvertisementController::class, 'delete'])->name('advertisement.destroy');
Route::get('/advertisement/items/{type}', [AdvertisementController::class,'getItems'])
        ->name('advertisement.items');
//get products category brand route
// Route::get('/get-Products', [AdvertisementController::class,'getProducts'])->name('getProducts');


//category feature routes
Route::get('featured/create', [FeaturedSectionController::class, 'create'])->name('featured.create');
Route::post('featured/store', [FeaturedSectionController::class, 'store'])->name('featured.store');

// brand feature routes
Route::get('brandfeatured/create', [BrandfeatureController::class, 'create'])->name('brandfeature.create');
Route::post('brandfeatured/store',[BrandfeatureController::class, 'store'])->name('brandfeature.store');

// frontend routes



// repair the routes
Route::get('frontend/repairs/repair', [RepairController::class, 'repair'])->name('frontend.repairs.repair');
route::post('frontend/repairs/store',[RepairController::class,'store'])->name('repair.store');
route::get('repair/index',[RepairController::class,'index'])->name('repair.index');// blog routes
Route::get('frontend/blogs/blog', [BlogController::class, 'blog'])->name('frontend.blogs.blogs');
Route::get('frontend/blogs/blogdetails/{id}', [BlogController::class, 'blogdetails'])->name('frontend.blogs.blogdetails');

// productdetails route or category and brand wise products pages route
Route::get('frontend/brand/index/{id}',[BrandController::class,'details'])->name('frontend.brand.index');
Route::get('frontend/category/index/{id}',[CategoryController::class,'details'])->name('frontend.category.index');

// productsdetails route
Route::get('frontend/products/productdetails/{id}',[productsController::class,'productdetails'])->name('frontend.product.productdetails');

// fallback route
Route::fallback(function () {
    return view('fallback.notfound49#$@#$#$#');
})->name('404');
require __DIR__.'/auth.php';
