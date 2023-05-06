<?php

namespace App\Http\Controllers\Backend\AdminRole;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Services\Backend\AdminRoleService;
use Illuminate\Http\{JsonResponse, Request};

class AdminRoleController extends Controller
{
    public function __construct(private readonly AdminRoleService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return ApiResponse($this->service->index($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): JsonResponse
    {
        return ApiResponse($this->service->store($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return ApiResponse($this->service->show($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id): JsonResponse
    {
        return ApiResponse($this->service->update($request, $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return ApiResponse($this->service->destroy($id));
    }

    public function getPermissions(): JsonResponse
    {
        return ApiResponse($this->service->getPermissions());
    }
}
