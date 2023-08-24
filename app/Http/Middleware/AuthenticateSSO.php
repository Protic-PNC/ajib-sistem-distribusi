<?php

namespace App\Http\Middleware;

use App\Service\BrokerService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateSSO
{
    function __construct(private BrokerService $brokerService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cred = $request->session()->get(BrokerService::SESSION_KEY);
        if (is_null($cred) || !$cred) {
            return $this->brokerService->authorize();
        }

        return $next($request);
    }
}
