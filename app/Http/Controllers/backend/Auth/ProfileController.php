<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
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
}
