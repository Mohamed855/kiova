<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassword
{
    use GeneralTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $api_password = env('API_PASSWORD');
        if ($request->header('api_password') === $api_password || $request['api_password'] === $api_password) {
            return $next($request);
        }
        return $this->returnError(401, 'You are not authorized');
    }
}
