<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class productspage extends Component
{
    /**
     * Create a new component instance.
     */
public $products;
public $brands;
public $categories;

public function __construct($products, $brands, $categories)
{
    $this->products = $products;
    $this->brands = $brands;
    $this->categories = $categories;
}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.productspage');
    }
}
