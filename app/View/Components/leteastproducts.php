<?php

namespace App\View\Components;
use App\Models\Products;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class leteastproducts extends Component
{
    /**
     * Create a new component instance.
     */public $products;
    public function __construct()
    {
        //
        $this->products=Products::with('category','brand')->latest()->limit(13)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.leteastproducts');
    }
}
