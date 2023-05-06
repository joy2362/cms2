<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\{ForgetPasswordRequest, LoginRequest, ResetPasswordRequest};
use App\Services\Backend\AdminAuthService;
use Illuminate\Http\{JsonResponse, Request};

class AdminAuthController extends Controller
{
    public function __construct(private readonly AdminAuthService $service)
    {
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'success' => true,
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return ApiResponse($this->service->login($request));
    }

    public function logout(Request $request): JsonResponse
    {
        return ApiResponse($this->service->logout($request));
    }

    public function forgetPassword(ForgetPasswordRequest $request): JsonResponse
    {
        return ApiResponse($this->service->forgetPassword($request));
    }

    public function passwordReset(ResetPasswordRequest $request): JsonResponse
    {
        return ApiResponse($this->service->passwordReset($request));
    }
}
