<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
           'success' => true,
        ]);
    }
}
