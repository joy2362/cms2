<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Services\Backend\AdminAuthService;
use Illuminate\Http\JsonResponse;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param AdminLoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(AdminLoginRequest $request)
    {
        try {
            $response = (new AdminAuthService())->login($request);
            return response()->json($response->except(['status']),$response['status']);

        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'errors' => $ex->getMessage(),
            ],422);
        }
    }
}
