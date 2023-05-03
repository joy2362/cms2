<?php

namespace Database\Seeders\ModelSeeders;

use App\Facades\GlobalHelperFacade;
use App\Models\Users\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public const ADMINISTRATOR = 'administrator';
    public const SUPER_ADMIN = 'super admin';
    public const GUARD = 'admin';
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

        Role::updateOrCreate(
            ['name' => 'Super Admin'],
            ['guard_name' => 'admin', 'type' => 'administrator']
        );

        Role::updateOrCreate(
            ['name' => 'Regular'],
            ['guard_name' => 'web']
        );

        $roles = Role::where('type', self::ADMINISTRATOR)->get();
        if (!empty($roles)) {
            foreach ($roles as $role) {
                $role->givePermissionTo(Permission::where('guard_name', self::GUARD)->get());
            }
        }
        $admin = Admin::where('email', self::ADMIN_EMAIL)->first();
        if (!empty($admin)) {
            $admin->assignRole(self::SUPER_ADMIN);
        }
    }
}
