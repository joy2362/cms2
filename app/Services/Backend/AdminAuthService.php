<?php

namespace App\Services\Backend;

use App\Events\ForgetPassword;
use App\Models\Admin;
use App\Traits\Backend\ServiceReturnCollection;
use Illuminate\Database\Eloquent\{Model, Builder};
use Illuminate\Http\Request;
use Illuminate\Support\{Collection, Facades\Auth, Facades\DB, Facades\Hash, Str};

/**
 * Handle admin auth
 */
class AdminAuthService
{
    use ServiceReturnCollection;

    private Collection $collection;

    /**
     * @param $request
     * @return Collection
     */
    public function login($request): Collection
    {
        return Auth::guard(Admin::GUARD)->attempt($request->validated()) ? $this->success(
            [
                'message' => trans('auth.success'),
                'token' => $this->generateAuthToken($request->input('email')),
            ]
        ) : $this->failed(['error' => trans('auth.failed')]);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function logout(Request $request): Collection
    {
        return $request->user()->currentAccessToken()->delete() ?
            $this->success(['message' => trans('auth.logout')])
            : $this->failed(['error' => trans('auth.Unauthenticated')]);
    }

    /**
     * @param $request
     * @return Collection
     */
    public function forgetPassword($request): Collection
    {
        if ($user = $this->matchUser($request->validated()['email'])) {
            $this->addPasswordResetRecode($user);
            return $this->success(['message' => trans('passwords.sent')]);
        } else {
            return $this->failed(['error' => trans('passwords.user')]);
        }
    }

    public function passwordReset($request): Collection
    {
        if ($this->matchPasswordResetTokenAndEmail($request->validated()['email'], $request->validated()['token'])) {
            $this->changePassword(
                $request->validated()['email'],
                $request->validated()['password'],
            );
            $this->collection = $this->success(['message' => trans('passwords.reset')]);
        } else {
            $this->collection = $this->failed(['error' => trans('passwords.token')]);
        }
        return $this->collection;
    }

    /*
   |--------------------------------------------------------------------------
   | class internal methods
   |--------------------------------------------------------------------------
   |
   */
    /**
     * @param $email
     * @return Admin
     */
    private function matchUser($email): Admin
    {
        return Admin::where('email', $email)->first();
    }

    /**
     * @param $user
     * @return void
     */
    private function addPasswordResetRecode($user): void
    {
        $token = $this->generateForgetPasswordToken();
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);
        $this->sendForgetPasswordEmail($user, $token);
    }

    /**
     * @param $user
     * @param $token
     * @return void
     */
    private function sendForgetPasswordEmail($user, $token): void
    {
        ForgetPassword::dispatch($user, $token);
    }

    /**
     * @param $email
     * @return mixed
     */
    private function generateAuthToken($email): mixed
    {
        $admin = Admin::where('email', $email)->first();
        return $admin->createToken('token', ['role:admin'])->plainTextToken;
    }

    /**
     * @return string
     */
    private function generateForgetPasswordToken(): string
    {
        return Str::random(40);
    }

    /**
     * @param $email
     * @param $token
     * @return mixed
     */
    private function matchPasswordResetTokenAndEmail($email, $token): mixed
    {
        return DB::table('password_resets')->where(['email' => $email, 'token' => $token])->first();
    }

    /**
     * @param $email
     * @param $password
     * @return void
     */
    private function changePassword($email, $password): void
    {
        Admin::where('email', $email)->update([
            'password' => Hash::make($password)
        ]);
    }
}
