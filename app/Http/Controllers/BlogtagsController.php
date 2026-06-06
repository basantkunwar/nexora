<?php

namespace App\Http\Controllers;
use App\Http\Requests\TagRequest;
use App\Models\Blogtags;
use Illuminate\Http\Request;

class BlogtagsController extends Controller
{
    //
    public function create(){
        return view('blogs.tags.create');
    }
    public function store(TagRequest $request){
        $tags=$request->validated();
        Blogtags::create($tags);
        return view('blogs.tags.create');
        
    }
    public function index(){
        $tags=Blogtags::all();
        return view('blogs.tags.index',compact('tags'));
    }
}
