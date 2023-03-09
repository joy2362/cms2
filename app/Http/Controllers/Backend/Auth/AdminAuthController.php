<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminForgetPassword;
use App\Services\Backend\AdminAuthService;
use Illuminate\Http\{JsonResponse, Request};

class AdminAuthController extends Controller
{
    private AdminAuthService $adminAuthService;

    public function __construct()
    {
        $this->adminAuthService = new AdminAuthService();
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'success' => true,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $response = $this->adminAuthService->logout($request);
        return response()->json($response->except(['status']), $response['status']);
    }

    public function forgetPassword(AdminForgetPassword $request): JsonResponse
    {
        $response = $this->adminAuthService->forgetPassword($request);
        return response()->json($response->except(['status']), $response['status']);
    }
}
