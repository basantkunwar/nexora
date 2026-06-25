<?php

namespace App\View\Components;

use App\Models\Brandfeature;
use App\Models\Products;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class brandfeaturesection extends Component
{
    /**
     * Create a new component instance.
     */public $products;
     public $featured;
    public function __construct()
    {
        //
        $this->featured=Brandfeature::where('status',1)->first(); 
        $this->products =Products::with('category','brand')->where('brand_id',$this->featured->brand_id)->limit($this->featured->product_limit)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brandfeaturesection');
    }
}
