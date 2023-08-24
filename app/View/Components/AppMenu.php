<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $appList = [
            ["url" => "/", "name" => "Distribusi", "icon" => "truck-fill"],
            ["url" => "/", "name" => "Pemesanan", "icon" => "basket-fill"],
            ["url" => "/", "name" => "POS", "icon" => "storefront-fill"],
        ]
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-menu');
    }
}
