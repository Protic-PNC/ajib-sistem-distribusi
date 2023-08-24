<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BranchSwitch extends Component
{
    public $branch;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $currentBranch = 'Ajib Darkah',
        public array $branchList = [
            [
                "url" => "/",
                "image_url" => "resources/images/ajib-logo.png",
                "name" => "Ajib Darkah",
                "description" => "Pusat",
            ],
            [
                "url" => "/",
                "image_url" => "resources/images/ajib-logo.png",
                "name" => "Ajib Darkah 002",
                "description" => "Cabang Sidanegara"
            ]
        ]
    ) {
        $this->branch = $this->branchList[array_search($this->currentBranch, array_column($this->branchList, 'name'), true)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.branch-switch');
    }
}
