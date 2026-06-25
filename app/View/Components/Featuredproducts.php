<?php

namespace App\View\Components;

use App\Models\FeaturedSection;
use App\Models\Products;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Featuredproducts extends Component
{
    /**
     * Create a new component instance.
     */public $products;
     public $featured;
    public function __construct()
    {
    $this->featured=FeaturedSection::where('status',1)->first(); 
    $this->products =Products::with('category','brand')->where('category_id',$this->featured->category_id)->limit($this->featured->product_limit)->get();
    
    //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featuredproducts');
    }
}
