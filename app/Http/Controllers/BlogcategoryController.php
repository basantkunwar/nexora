<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    //
    public function create(){
        return view('blogs.categories.create');
    }
}
