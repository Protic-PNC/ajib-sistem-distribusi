<?php

namespace App\Livewire;

use App\Service\BrokerService;
use Livewire\Component;

class BranchSwitch extends Component
{
    private BrokerService $brokerService;
    public $branchList;

    public function mount(
        BrokerService $brokerService
    ) {
        $this->brokerService = $brokerService;
        $this->branchList = $brokerService->getLocalBranches()->map(function ($b) {
            $b["image_url"] = "resources/images/ajib-logo.png";
            $b["url"] = "?b=" . $b["code"];
            return $b;
        });
    }

    public function render()
    {
        return view('livewire.branch-switch', [
            "branch" => $this->brokerService->getCurrentBranch()
        ]);
    }
}
