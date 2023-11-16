<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class Mainmenu extends Component
{

    public function __construct()
    {
       
    }

   
    public function render(): View|Closure|string
    {
        $list_menu = Menu::all();
        return view('components.mainmenu', compact('list_menu'));
    }
}
