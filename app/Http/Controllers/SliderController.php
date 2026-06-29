<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //

   public function index()
{
    $sliders = Slider::latest()->paginate(10);

    return view('sliders.index', compact('sliders'));
}

    public function create(){
        return view('sliders.create');
    }

    public function store(SliderRequest $request){
        //
$validate=$request->validated();

$path = null;
if($request->hasFile('desktop_image')) {
    $path = $request->file('desktop_image')->store(
        'slider-images',
        'public'
    );
    $validate['desktop_image']=$path;
}

if($request->hasFile('mobile_image')) {
    $path = $request->file('mobile_image')->store(
        'slider-images',
        'public'
    );
    $validate['mobile_image']=$path;
}
Slider::create($validate);
return redirect()->route('sliders.index');
    }

    public function edit(Slider $slider){
        return view('sliders.edit',compact('slider'));
    }

    public function delete(Slider $slider){
        $slider->delete();
        return redirect()->route('sliders.index');
    }

    public function update(SliderRequest $request,$id){
        $slider=Slider::find($id);
$validate=$request->validated();

$path = null;
if($request->hasFile('desktop_image')) {
    $path = $request->file('desktop_image')->store(
        'slider-images',
        'public'
    );
    $validate['desktop_image']=$path;
}

if($request->hasFile('mobile_image')) {
    $path = $request->file('mobile_image')->store(
        'slider-images',
        'public'
    );
    $validate['mobile_image']=$path??$slider->mobile_image;
}
$slider->update($validate);
return redirect()->route('sliders.index');
    }
}
