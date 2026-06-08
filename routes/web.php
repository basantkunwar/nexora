<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogtagsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [dashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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


// pages route
Route::get('pages/contact',[ContactController::class,'contact'])->name('pages.contact');
Route::post('pages/create',[ContactController::class,'create'])->name('pages.create');


// user routes
Route::get('users/index',[usercontroller::class, 'index'])->name('users.index');


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
Route::delete('blogs/categories/delete/{id}', [BlogcategoryController::class, 'destroy'])->name('blogs.categories.destroy');


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
// frontend routes
// repair the routes
Route::get('frontend/repairs/repair', [RepairController::class, 'repair'])->name('frontend.repairs.repair');

// blog routes
Route::get('frontend/blogs/blog', [BlogController::class, 'blog'])->name('frontend.blogs.blogs');
Route::get('frontend/blogs/blogdetails/{id}', [BlogController::class, 'blogdetails'])->name('frontend.blogs.blogdetails');

// productdetails route or category and brand wise products pages route
Route::get('frontend/brand/{id}/index/',[BrandController::class,'details'])->name('frontend.brand.index');
Route::get('frontend/category/{id}/index',[CategoryController::class,'details'])->name('frontend.category.index');
require __DIR__.'/auth.php';
