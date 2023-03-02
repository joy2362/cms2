<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminPasswordUpdateRequest;
use App\Services\Backend\AdminProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'profile' => $request->user(),
        ]);
    }

    public function changePassword(AdminPasswordUpdateRequest $request): JsonResponse
    {
        try {
            $response = (new AdminProfileService())->updatePassword($request);
            return response()->json($response->except(['status']),$response['status']);

        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'errors' => $ex->getMessage(),
            ],422);
        }
    }
}
