<?php

namespace Database\Seeders\ModelSeeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate(
            [
                'email' => "abdullahzahidjoy@gmail.com"
            ],
            [
                'name' => "Abdullah zahid joy",
                'avatar' => "upload/admin/avatar/221218063121-2483.jpg",
                'password' => Hash::make('123456')
            ]
        );
    }
}
