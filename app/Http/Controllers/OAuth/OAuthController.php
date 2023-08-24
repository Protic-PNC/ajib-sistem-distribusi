<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Service\BrokerService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    function __construct(
        private BrokerService $brokerService
    ) {
    }

    public function callback(Request $req): Response
    {
        return $this->brokerService->handleCallback($req->code, $req->state);
    }

    public function user(Request $req)
    {
        return $this->brokerService->getUser();
    }

    public function logout(Request $req)
    {
        return $this->brokerService->logout();
    }
}
