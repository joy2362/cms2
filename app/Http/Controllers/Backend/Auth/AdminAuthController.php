<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminForgetPasswordRequest;
use App\Http\Requests\Backend\AdminResetPasswordRequest;
use App\Services\Backend\AdminAuthService;
use Illuminate\Http\{JsonResponse, Request};

class AdminAuthController extends Controller
{
    public function __construct(private readonly AdminAuthService $adminAuthService)
    {
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'success' => true,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $response = $this->adminAuthService->logout($request);
            return response()->json($response->except(['status']), $response['status']);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'errors' => $ex->getMessage(),
            ], 422);
        }
    }

    public function forgetPassword(AdminForgetPasswordRequest $request): JsonResponse
    {
        try {
            $response = $this->adminAuthService->forgetPassword($request);
            return response()->json($response->except(['status']), $response['status']);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'errors' => $ex->getMessage(),
            ], 422);
        }
    }

    public function passwordReset(AdminResetPasswordRequest $request): JsonResponse
    {
        try {
            $response = $this->adminAuthService->passwordReset($request);
            return response()->json($response->except(['status']), $response['status']);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'errors' => $ex->getMessage(),
            ], 422);
        }
    }
}
