<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class brandpage extends Component
{
    /**
     * Create a new component instance.
     */public $products;
public $brand;

public function __construct($products, $brand)
{
    $this->products = $products;
    $this->brand = $brand;
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brandpage');
    }
}
