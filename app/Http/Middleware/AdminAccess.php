<?php

namespace App\Http\Middleware;

use App\Facades\GlobalHelperFacade;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        $permission = GlobalHelperFacade::getPermissionNameFromRoute(Route::current()->action['controller']);
        if (!empty($guard) && !empty($permission)) {
            if (!Auth::user()->can($permission)) {
                return $request->wantsJson() ? response("You Dont Have Enough permission", 403) : abort(
                    '403',
                    "permission"
                );
            }
        } else {
            return $request->wantsJson() ? response("You Dont Have Enough permission", 403) : abort(
                '403',
                "permission"
            );
        }
        return $next($request);
    }
}
