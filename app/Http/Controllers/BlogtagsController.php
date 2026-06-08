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

    public function edit($id){
        $tag=Blogtags::find($id);
        return view('blogs.tags.edit',compact('tag'));
    }


    public function update(TagRequest $request,$id){
        $tags=$request->validated();
        Blogtags::find($id)->update($tags);
        return redirect()->route('blogs.tags.index');
    }
}
