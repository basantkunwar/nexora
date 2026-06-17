<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Brand;

class createbrand extends Component
{
    /**
     * Create a new component instance.
     */public $brands;
     public $product;
    public function __construct($product=null)
    {
        //
        $this->brands=Brand::all();
        $this->product=$product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.createbrand');
    }
}
