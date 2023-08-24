<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class SidebarLink extends Component
{
    public string $id;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $text,
        public ?string $link,
        public ?string $icon,
        public bool $divider = false,
        public array $children = []
    ) {
        $this->id = Str::of($this->text)->slug() . "-" . Str::random(5);
    }


    public function isActive(?string $link)
    {
        return $link ? request()->is($link) : false;
    }

    public function isChildrenActive()
    {
        foreach ($this->children as $child) {
            if ($this->isActive($child["link"])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-link');
    }
}
