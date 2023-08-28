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
        public array $children = [],
        public bool $external = false,
    ) {
        $this->id = Str::of($this->text)->slug() . "-" . Str::random(5);
    }

    public function matchCurrentRoute(?string $link)
    {
        return is_null($link) ? false : request()->is(substr($link, 1));
    }

    public function isChildrenActive()
    {
        foreach ($this->children as $child) {
            if ($this->matchCurrentRoute($child["link"])) {
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
