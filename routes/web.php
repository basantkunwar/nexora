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

Route::get('/', function () {
    return view('welcome');
});

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
Route::delete('/products/delete/{id}', [productsController::class, 'destroy'])->name('products.destroy');  



// brand routes
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/index', [BrandController::class, 'index'])->name('brands.index');



// category routes
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');


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
Route::get('blogs/categories/create', [BlogcategoryController::class, 'create'])->name('blogs.categories.create');
Route::post('blogs/categories/store', [BlogcategoryController::class, 'store'])->name('blogs.categories.store');
Route::get('blogs/categories/index', [BlogcategoryController::class, 'index'])->name('blogs.categories.index');
Route::get('blogs/tags/create', [BlogtagsController::class, 'create'])->name('blogs.tags.create');
Route::post('blogs/tags/store', [BlogtagsController::class, 'store'])->name('blogs.tags.store');
Route::get('blogs/tags/index', [BlogtagsController::class, 'index'])->name('blogs.tags.index');
require __DIR__.'/auth.php';
