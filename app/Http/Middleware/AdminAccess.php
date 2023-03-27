<?php

namespace App\Http\Middleware;

use App\Facades\GlobalHelperFacade;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        $route = GlobalHelperFacade::getPermissionNameFromRoute(Route::current()->action['controller']);
        dd($route);
        return $next($request);
    }
}
