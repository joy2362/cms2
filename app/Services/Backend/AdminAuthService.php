<?php

namespace App\Services\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\{Collection, Facades\Auth};
use Symfony\Component\HttpFoundation\Response;

/**
 * Handle admin auth
 */
class AdminAuthService
{
    /**
     * @param $request
     * @return Collection
     */
    public function login($request): Collection
    {
        return Auth::guard(Admin::GUARD)->attempt($request->validated()) ? $this->loginSuccess(
            $request->input('email')
        ) : $this->loginFailed();
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function logout(Request $request): Collection
    {
        return $request->user()->currentAccessToken()->delete() ?
            $this->logoutSuccess() : $this->logoutFailed();
    }

    /**
     * @param $email
     * @return mixed
     */
    private function getToken($email): mixed
    {
        $admin = Admin::where('email', $email)->first();
        return $admin->createToken('token', ['role:admin'])->plainTextToken;
    }

    /**
     * @return Collection
     */
    private function logoutFailed(): Collection
    {
        return new Collection([
            'success' => false,
            'error' => trans('auth.Unauthenticated'),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ]);
    }

    /**
     * @return Collection
     */
    private function logoutSuccess(): Collection
    {
        return new Collection([
            'success' => true,
            'message' => trans('auth.logout'),
            'status' => Response::HTTP_OK,
        ]);
    }


    /**
     * @return Collection
     */
    private function loginFailed(): Collection
    {
        return new Collection([
            'success' => false,
            'error' => trans('auth.failed'),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ]);
    }

    /**
     * @param $email
     * @return Collection
     */
    private function loginSuccess($email): Collection
    {
        return new Collection([
            'success' => true,
            'message' => trans('auth.success'),
            'token' => $this->getToken($email),
            'status' => Response::HTTP_OK,
        ]);
    }

}