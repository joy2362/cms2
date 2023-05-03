<?php

namespace App\Http\Controllers\Backend\AdminRole;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRoleRequest;
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
    public function store(AdminRoleRequest $request): JsonResponse
    {
        $response = $this->adminRoleService->store($request);
        return response()->json($response->except(['status']), $response['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $response = $this->adminRoleService->show($id);
        return response()->json($response->except(['status']), $response['status']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleRequest $request, string $id): JsonResponse
    {
        $response = $this->adminRoleService->update($request, $id);
        return response()->json($response->except(['status']), $response['status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->ApiResponse($this->adminRoleService->destroy($id));
    }

    public function getPermissions(): JsonResponse
    {
        return $this->ApiResponse($this->adminRoleService->getPermissions());
    }
}
