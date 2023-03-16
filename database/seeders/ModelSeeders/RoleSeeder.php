<?php

namespace Database\Seeders\ModelSeeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['name' => 'Super Admin'],
            ['guard_name' => 'admin']
        );

        Role::updateOrCreate(
            ['name' => 'Regular'],
            ['guard_name' => 'web']
        );
    }
}
