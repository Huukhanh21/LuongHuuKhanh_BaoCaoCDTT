<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_category = Category::whereIn('parent_id', [2, 3])
                         ->where('status', 1)
                         ->get();
        return view('components.category-list',compact('list_category'));
    }
}
