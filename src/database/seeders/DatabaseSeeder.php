<?php

namespace Database\Seeders;

use App\Facades\GlobalHelperFacade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private string $seederLocation = 'database/seeders/ModelSeeders';
    private string $seederNamespace = '\\Database\\Seeders\\ModelSeeders\\';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = GlobalHelperFacade::getPhpFileFromDir(base_path($this->seederLocation));
        foreach ($seeders as $seeder) {
            $seeder = $this->seederNamespace . str_replace('.php', '', $seeder);
            $seederClass = new $seeder();
            $seederClass->run();
        }

        $this->call([
            PermissionSeeder::class
        ]);
    }
}
