<?php

namespace App\Services\Backend;

use App\Traits\Backend\ServiceReturnCollection;
use Exception;
use Illuminate\Support\Collection;
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
}
