<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Services\Backend\AdminAuthService;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
           'success' => true,
        ]);
    }

    public function logout(Request $request){
        $response = (new AdminAuthService())->logout($request);
        return response()->json($response->except(['status']),$response['status']);
    }
}
