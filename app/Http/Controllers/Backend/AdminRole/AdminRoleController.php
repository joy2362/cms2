<?php

namespace App\Http\Controllers\Backend\AdminRole;

use App\Http\Controllers\Controller;
use App\Services\Backend\AdminRoleService;
use Illuminate\Http\{JsonResponse, Request};

class AdminRoleController extends Controller
{
    public function __construct(private readonly AdminRoleService $adminRoleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $response = $this->adminRoleService->index($request);
        return response()->json($response->except(['status']), $response['status']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
