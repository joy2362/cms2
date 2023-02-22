<?php

namespace App\Services\Backend;

use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthService
{
    public function login(AdminLoginRequest $request)
    {
        $response = new Collection();
        if (!Auth::guard(Admin::GUARD)->attempt($request->validated())) {
            $response->put('success', false);
            $response->put('error', trans('auth.failed'));
            $response->put('status', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $response->put('success', true);
            $response->put('message', trans('auth.success'));
            $response->put('token', $this->getToken($request->validated()['email']));
            $response->put('status', Response::HTTP_OK);
        }

        return $response;
    }

    public function logout(Request $request)
    {
        $response = new Collection();

        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            $response->put('success', true);
            $response->put('message', trans('auth.logout'));
            $response->put('status', Response::HTTP_OK);
        } else {
            $response->put('success', false);
            $response->put('error', trans('auth.Unauthenticated'));
            $response->put('status', Response::HTTP_UNAUTHORIZED);
        }

        return $response;
    }

    private function getToken($email)
    {
        $admin = Admin::where('email', $email)->first();
        return $admin->createToken('token', ['role:admin'])->plainTextToken;
    }

}