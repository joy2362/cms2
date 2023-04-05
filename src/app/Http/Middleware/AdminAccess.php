<?php

namespace App\Http\Middleware;

use App\Facades\GlobalHelperFacade;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @param $guard
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|mixed|never|Response
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        $permission = GlobalHelperFacade::getPermissionNameFromRoute(Route::current()->action['controller']);
        if (!empty($guard) && !empty($permission) && !Auth::user()->can($permission)) {
            return $request->wantsJson() ? response("You Dont Have Enough permission", 403) : abort(
                '403',
                "permission"
            );
        }
        return $next($request);
    }
}
