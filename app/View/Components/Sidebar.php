<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $links = []
    ) {
        $this->links = [
            [
                "text" => "Dashboard",
                "icon" => "chart-bar-fill",
                "link" => route('home', [], false)
            ],
            [
                "text" => "Pages",
                "icon" => "bag-fill",
                "children" => [
                    [
                        "text" => "Orders",
                        "link" => "/orders"
                    ],
                    [
                        "text" => "Products",
                        "link" => "/products"
                    ]
                ]
            ],
            [
                "text" => "Messages",
                "icon" => "envelope-fill",
                "link" => "/messages"
            ],
            [
                "divider" => true
            ],
            [
                "text" => "Authentication",
                "icon" => "lock-fill",
                "children" => [
                    [
                        "text" => "Sign In",
                        "link" => "/signin"
                    ],
                    [
                        "text" => "Sign Up",
                        "link" => "/signup"
                    ]
                ]
            ],
            [
                "text" => "Help",
                "icon" => "lifebuoy-fill",
                "link" => "/help"
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
