<?php

namespace App\Http\Middleware;

use App\Service\BrokerService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Branch
{
    function __construct(
        private BrokerService $brokerService
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $res = $this->brokerService->request('/api/branch');
        $this->brokerService->setLocalBranches($res["data"]);
        $branches = collect($res["data"]);

        $branchCode = $request->query('b');
        if (empty($branchCode) || !$branches->containsStrict("code", $branchCode)) {
            $branch = $branches->first();
            $request->query->set("b", $branch["code"]);
            $this->brokerService->setCurrentBranch($branch);

            return redirect($request->fullUrlWithQuery($request->query()));
        }

        $this->brokerService->setCurrentBranch($branches->firstWhere("code", $branchCode));

        return $next($request);
    }
}
