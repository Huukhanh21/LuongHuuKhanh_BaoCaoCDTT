<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;

class MainBanner extends Component
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
    public function render()
    {
        $banner = Banner::where([['status', 1],['position', '1', '1']])->orderBy('id', 'DESC')->get();
        return view('components.main-banner',compact('banner'));
    }
}
