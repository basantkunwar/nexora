<?php

namespace App\View\Components;
use App\Models\Blogcategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogcategories extends Component
{
    /**
     * Create a new component instance.
     */public $categories;
    public function __construct()
    {
        //
        $this->categories=Blogcategory::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blogcategories');
    }
}
