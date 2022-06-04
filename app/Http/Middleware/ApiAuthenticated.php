<?php

namespace App\Http\Middleware;

use App\Support\Models\BaseResponse;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $exception) {
            return BaseResponse::builder()->setStatusCode(401)->setMessage('Token is Invalid')->response();
        }
        return $next($request);
    }
}
