<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\AccessLogs;
use Exception;
use Auth;


class AfterMiddleware {

    public function handle($request, Closure $next)
    {

        $response = $next($request);

        if($request->wantsJson()){

            $request_ = $request->all();
            if(isset($request_['password'])){
                unset($request_['password']);
            }
            
            $logs = AccessLogs::insert(
                [
                    'ip' => $request->ip(),
                    'method' => $request->method(),
                    'request' => json_encode($request_),
                    'response' => $response->getContent(),
                    'code' => $response->getStatusCode(),
                    'url' => $request->path(),
                    'created_by' => (Auth::check()) ? Auth::user()->id : NULL,
                ]
            );
        }
        
        return $response;

    }

}