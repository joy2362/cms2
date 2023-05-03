<?php

namespace Database\Seeders;

use App\Facades\GlobalHelperFacade;
use App\Models\Users\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public const SUPER_ADMIN = 'Super Admin';
    public const ADMIN_EMAIL = 'abdullahzahidjoy@gmail.com';

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
                    'guard_name' => Admin::GUARD,
                    'group_name' => explode('.', $permission)[0],
                    'title' => explode('.', $permission)[1]
                ];
            }
        }
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'guard_name' => Admin::GUARD,
                    'group_name' => $permission['group_name'],
                    'title' => $permission['title'],
                ]
            );
        }

        $role = Role::where('name', self::SUPER_ADMIN)->first();
        if (!empty($role)) {
            $role->givePermissionTo(Permission::where('guard_name', Admin::GUARD)->get());
        }
        $admin = Admin::where('email', self::ADMIN_EMAIL)->first();
        if (!empty($admin)) {
            $admin->assignRole(self::SUPER_ADMIN);
        }
    }
}
