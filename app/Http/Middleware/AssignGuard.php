<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignGuard
{
    use GeneralTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if($guard != null) {
            auth()->shouldUse($guard);
            if (! $this->checkToken($request)) {
                return redirect()->route('sign_in', [ 'message' => 'Something went wrong' ]);
            }
        }
        return $next($request);
    }
}
