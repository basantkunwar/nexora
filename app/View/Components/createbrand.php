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
    public function __construct()
    {
        //
        $this->brands=Brand::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.createbrand');
    }
}
