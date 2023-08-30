<?php

namespace App\Livewire\Products;

use App\Service\BrokerService;
use Livewire\Component;
use NumberFormatter;

class Index extends Component
{
    private $IDRFormatter;
    public array $products;

    public function mount(BrokerService $brokerService)
    {
        $this->IDRFormatter = NumberFormatter::create("id_ID", NumberFormatter::CURRENCY);
        $this->products = $brokerService->request("/api/product", "GET", [
            "branch" => $brokerService->getCurrentBranch()["id"]
        ])["data"];
    }

    public function formatIDR($number)
    {
        return $this->IDRFormatter->format($number);
    }

    public function render()
    {
        return view('livewire.products.index');
    }
}
