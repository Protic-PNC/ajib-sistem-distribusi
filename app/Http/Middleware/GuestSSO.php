<?php

namespace App\Http\Middleware;

use App\Service\BrokerService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestSSO
{
    function __construct()
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
            return $next($request);
        }

        return redirect(route('dashboard'));
    }
}
