<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\FeaturedSection;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    //
  public function  index() {

    $topBanner = Advertisement::where('position', 'top_banner')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $belowTopBanner = Advertisement::where('position', 'bellowtop_banner')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $middleBanner = Advertisement::where('position', 'middle_banner')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $belowMiddleBanner = Advertisement::where('position', 'bellowmiddle_banner')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $bottomBanner = Advertisement::where('position', 'bottom_banner')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();


    $sliders = Slider::where('status', 1)
    ->orderBy('position')
    ->get();

    
return view('welcome', compact('sliders','topBanner','belowTopBanner','middleBanner','belowMiddleBanner','bottomBanner'));
}
}
