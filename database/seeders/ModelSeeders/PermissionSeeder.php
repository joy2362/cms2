<?php

namespace Database\Seeders\ModelSeeders;

use App\Facades\GlobalHelperFacade;
use App\Models\Users\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::getRoutes();
        $permissions = [];
        foreach ($routes as $route) {
            if (in_array('permission:admin', $route->action['middleware'])) {
                $permission = GlobalHelperFacade::getPermissionNameFromRoute($route->action['controller']);
                $permissions[] = [
                    'name' => $permission,
                    'guard_name' => 'admin',
                    'group_name' => explode('.', $permission)[0]
                ];
            }
        }
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'guard_name' => $permission['name'],
                    'group_name' => $permission['group_name']
                ]
            );
        }

        $role = Role::where('name', 'Super Admin')->first();
        if (!empty($role)) {
            $role->givePermissionTo(Permission::where('guard_name', 'admin')->get());
        }
        $admin = Admin::where('email', 'abdullahzahidjoy@gmail.com')->first();
        if (!empty($admin)) {
            $admin->assignRole('Super Admin');
        }
    }
}
