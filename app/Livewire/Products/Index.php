<?php

namespace App\Livewire\Products;

use App\Service\BrokerService;
use Livewire\Component;
use NumberFormatter;

class Index extends Component
{
    public array $products;

    public function mount(BrokerService $brokerService)
    {
        $this->products = $brokerService->request("/api/product", "GET", [
            "branch" => $brokerService->getCurrentBranch()["id"]
        ])["data"];
    }

    public function render()
    {
        return view('livewire.products.index');
    }
}
