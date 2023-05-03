<?php

namespace App\Services\Backend;

use App\Traits\Backend\ServiceReturnCollection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoleService
{
    use ServiceReturnCollection;

    private Collection $collection;

    /**
     * @param $request
     * @return Collection
     */
    public function index($request): Collection
    {
        try {
            $roles = Role::when($request['field'] && $request['search'], function ($q) use ($request) {
                return $q->where($request['field'], 'like', '%' . $request['search'] . '%');
            })->when($request['sortField'] && $request['sortBy'], function ($q) use ($request) {
                return $q->orderBy($request['sortField'], $request['sortBy']);
            })->paginate($request->perPage ?? 10);
            $this->collection = $this->success(['roles' => $roles]);
        } catch (Exception $ex) {
            $this->collection = $this->failed(['errors' => $ex->getMessage()]);
        }
        return $this->collection;
    }

    public function store(Request $request): Collection
    {
        try {
            $data['name'] = $request->validated()['name'];
            $data['guard_name'] = "admin";
            $role = Role::create($data);
            $role->syncPermissions($request->validated()['permissions']);
            $this->collection = $this->success(['message' => 'Admin Role created']);
        } catch (Exception $ex) {
            $this->collection = $this->failed(['errors' => $ex->getMessage()]);
        }

        return $this->collection;
    }

    public function show($id): Collection
    {
        $role = Role::find($id);
        $permissions = $role->permissions->pluck('id');
        return $this->success(['permissions' => $permissions, 'role' => $role]);
    }

    public function update(Request $request, $id): Collection
    {
        try {
            $data['name'] = $request->validated()['name'];
            Role::find($id)->update($data);
            Role::find($id)->syncPermissions($request->validated()['permissions']);
            $this->collection = $this->success(['message' => 'Admin Role updated']);
        } catch (Exception $ex) {
            $this->collection = $this->failed(['errors' => $ex->getMessage()]);
        }

        return $this->collection;
    }

    public function getPermissions(): Collection
    {
        $permissions = Permission::where('guard_name', 'admin')->get()->groupBy('group_name');
        return $this->success(['permissions' => $permissions]);
    }
}
