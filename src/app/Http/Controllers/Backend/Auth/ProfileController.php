<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\{ProfileImageRequest, GeneralUpdateRequest, PasswordUpdateRequest};
use App\Services\Backend\AdminProfileService;
use Illuminate\Http\{JsonResponse, Request};

class ProfileController extends Controller
{
    public function __construct(public AdminProfileService $service)
    {
    }

    public function profile(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'profile' => $request->user(),
        ]);
    }

    public function changePassword(PasswordUpdateRequest $request): JsonResponse
    {
        return apiResponse($this->service->updatePassword($request));
    }

    public function changeGeneral(GeneralUpdateRequest $request): JsonResponse
    {
        return apiResponse($this->service->updateGeneral($request));
    }

    public function changeProfileImage(ProfileImageRequest $request): JsonResponse
    {
        return apiResponse($this->service->changeProfileImage($request));
    }
}
