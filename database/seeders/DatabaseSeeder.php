<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PaysSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CanalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeIdentiteSeeder::class);
        $this->call(EtatCivilSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(DistrictSanitaireSeeder::class);
        $this->call(DistrictSeeder::class);
    }
}
