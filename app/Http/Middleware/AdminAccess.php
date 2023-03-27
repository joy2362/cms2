<?php

namespace App\Http\Middleware;

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
        $route = $this->getMethodName(Route::current()->action['controller']);
        dd(Auth::user());
        return $next($request);
    }

    private function getMethodName($name): string
    {
        $separateMethodAndControlName = explode('@', $name);
        $methodName = $separateMethodAndControlName[1];
        $separateControllerName = explode('\\', $separateMethodAndControlName[0]);
        $controllerName = $separateControllerName[array_key_last($separateControllerName)];
        $controllerName = str_replace('Controller', '', $controllerName);
        return "{$controllerName}.{$methodName}";
    }
}
