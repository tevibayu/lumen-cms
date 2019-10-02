<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Companies;

class XApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = $request->input('key');
        $company = Companies::select('key_token')
                            ->leftJoin('company_has_packages', 'company_has_packages.id_company', '=', 'companies.id_company')
                            ->where('key_token', $key)
                            ->first();

        if (!$company) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
