<?php

namespace App\Services\Backend;

use App\Events\ForgetPassword;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\{Collection, Facades\Auth, Facades\DB, Str};
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


    public function forgetPassword($request): Collection
    {
        if ($user = $this->matchPassword($request->validated()['email'])) {
            $this->addPasswordResetRecode($user);
            return $this->forgetPasswordSuccess();
        } else {
            return $this->forgetPasswordEmailMismatch();
        }
    }

    private function matchPassword($email): Admin
    {
        return Admin::where('email', $email)->first();
    }

    private function addPasswordResetRecode($user): void
    {
        $token = $this->generateToken();
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);
        $this->sendEmail($user, $token);
    }

    private function sendEmail($user, $token)
    {
        ForgetPassword::dispatch($user, $token);
    }

    private function generateToken(): string
    {
        return Str::random(40);
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

    /**
     * @param $email
     * @return Collection
     */
    private function forgetPasswordSuccess(): Collection
    {
        return new Collection([
            'success' => true,
            'message' => trans('passwords.sent'),
            'status' => Response::HTTP_OK,
        ]);
    }

    /**
     * @return Collection
     */
    private function forgetPasswordEmailMismatch(): Collection
    {
        return new Collection([
            'success' => false,
            'error' => trans('passwords.user'),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ]);
    }

}