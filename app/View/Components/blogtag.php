<?php

namespace App\View\Components;
use App\Models\Blogtags;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogtag extends Component
{
    /**
     * Create a new component instance.
     */public $tags;
     public $blog;
    public function __construct($blog=null)
    {
        //
        $this->tags=Blogtags::all();
        $this->blog=$blog;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blogtag');
    }
}
