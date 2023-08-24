<?php

namespace App\Http\Controllers;

use App\Service\BrokerService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private BrokerService $brokerService
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return $this->brokerService->authorize();
    }
}
